<?php

$dbPath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$pdo->exec('CREATE TABLE IF NOT EXISTS videos (id INTEGER PRIMARY KEY, url TEXT, title TEXT);');


?>