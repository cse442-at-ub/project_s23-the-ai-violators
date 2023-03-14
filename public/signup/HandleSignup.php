<?php

    require __DIR__ . '/../../config/database.php';

    $email = $_GET['email'];
    $user = $_GET['username'];
    $password = $_GET['password'];

    // header("Content-Type: application/json");

    if(checkIfEmailUsed($email)){
        echo json_encode(array(1));
    }
    elseif(checkIfUserNameUsed($user)){
        echo json_encode(2);
    }else{
        echo json_encode(3);
        createUser($user, $email, $password);
    }
    

    

    