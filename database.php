<?php
// PHP mongo install guide: https://www.php.net/manual/en/mongodb.installation.php

// phpinfo();
    require_once __DIR__ . '/vendor/autoload.php';
    $client = new MongoDB\Client('mongodb://localhost:27017');
    echo("Connected to MongoDB successfully!");

?>