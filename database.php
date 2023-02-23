<?php
// PHP mongo install guide: https://www.php.net/manual/en/mongodb.installation.php

// phpinfo();
    require_once __DIR__ . '/vendor/autoload.php';
    $client = new MongoDB\Client('mongodb://0.0.0.0:27017');
    echo("Connected to MongoDB successfully!");
    while (true) {
        // $collection = $client->test->users;
        // $result = $collection->insertOne(['x' => 1]);
        // echo "Inserted with Object ID '{$result->getInsertedId()}'";
        sleep(1);
    }

    // some extra stuff more stuff

?>