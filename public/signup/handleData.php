<?php

    require __DIR__ . '/../../config/database.php';

    $email = $_POST['email'];
    $username = $_POST['username'];

    $response = 4;

    if(checkIfEmailUsed($email) && checkIfUserNameUsed($username)){
        $resposne = 0;
    } else if(checkIfEmailUsed($email)){
        $response = 1;
    }else if(checkIfUserNameUsed($username)){
        $response = 2;
    }else{
        $response = 3;
    }

    echo $resposne;