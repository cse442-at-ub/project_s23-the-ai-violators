<?php

    require __DIR__ . '/../../config/database.php';

    $user_name = $_POST['username'];
    $id = $_POST['id'];

 
    if (del($user_name, $id)){
        echo 1;
    } else {
        echo 2;
    }



