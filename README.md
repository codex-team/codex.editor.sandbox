# Codex.Editor playground

This project contains dockerized CodeX Editor backend with example application.

# Usage

Start Docker compose

```
docker-compose up
```

Pull project dependencies via composer:
```
git submodule update --init --recursive
cd www
docker exec -it editorsandbox_php_1 composer update
```

# Basic usage

You can try CodeX Editor by the link: <a href="http://localhost/public/index.html">http://localhost/public/index.html</a>.

After saving your article, you can see database listing on <a href="http://localhost/">http://localhost/</a>

## Repository 
<a href="https://github.com/codex-team/codex.editor.sandbox/">https://github.com/codex-team/codex.editor.sandbox/</a>

## About CodeX
We are small team of Web-developing fans consisting of IFMO students and graduates located in St. Petersburg, Russia. 
Feel free to give us a feedback on <a href="mailto::team@ifmo.su">team@ifmo.su</a>
