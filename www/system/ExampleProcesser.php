<?php

use CodexEditor\CodexEditor;
use MongoDB\BSON\ObjectID;
use MongoDB\Client as Client;


class ExampleProcesser {

    public $database;

    public function __construct() {

    }

    function processData() {
        $JSONData = file_get_contents("php://input");
        if (!empty($JSONData)) {
            $editor = new CodexEditor( $JSONData );
            $cleanData = $editor->getData();
            $this->database->insertOne(['blocks' => $cleanData]);
            echo json_encode(['result' => true]);
        }
        else {
            echo json_encode(['result' => false, 'error' => 'Data is empty']);
        }
    }

    public function getNote($id) {
        $item = $this->database->findOne(['_id' => new ObjectId($id)]);
        return $item;
    }

    public function getAllNotes() {
        return $this->database->find();
    }

    function connectDatabase() {
        $connection = new Client(
            "mongodb://db:27017", [],
            [
                'typeMap' => [
                    'array' => 'array',
                    'document' => 'array',
                    'root' => 'array',
                ],
            ]
        );
        $this->database = $connection->selectDatabase('editor')->selectCollection('editor');
    }

    /**
     * Renders template with data
     *
     * @param string $file
     * @param array  $vars - variables for the template
     *
     * @return string
     */
    function renderTemplate($file, array $vars = null)
    {
        if (is_array($vars) && !empty($vars)) {
            extract($vars);
        }
        /**
         * Enable output bufferisation
         */
        ob_start();
        include PROJECTROOT . $file;
        return ob_get_clean();
    }

}