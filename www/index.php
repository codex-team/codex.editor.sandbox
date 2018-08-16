<?php

define('PROJECTROOT', __DIR__ . DIRECTORY_SEPARATOR);

/**
 * Autoload classes
 */
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/system/autoload.php';

/**
 * Example of codex.editor backend usage
 */

$example = new ExampleProcesser();
$example->connectDatabase();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $example->processData();
}
else {
    if (isset($_GET['show'])) {
        $note = $example->getNote($_GET['show']);
        var_dump($note);
    }
    else {
        $list = $example->getAllNotes();
        foreach ($list as $element) {
            $id = $element['_id'];
            echo "<a href='?show=$id'>$id</a><br/>";
        }
    }
}

?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
    <hr />
    <a href="/public/index.html">show Editor</a>
<?php endif; ?>