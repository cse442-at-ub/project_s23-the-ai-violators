<?php
    require_once __DIR__ . '/vendor/autoload.php';
    $client = new MongoDB\Client('mongodb://mongo:27017');

    echo("Connected to MongoDB successfully!\n");

    $tables = $client->listDatabases();
    foreach ($tables as $table) {
        echo $table['name'];
        echo "\n";
    }
        
?>