<?php

    require __DIR__ . '/../../config/database.php';

    $email = $_GET['email'];
    $user = $_GET['username'];
    $password = $_GET['password'];

    if(checkIfEmailUsed($email)){
        echo 1;
    }
    elseif(checkIfUserNameUsed($user)){
        echo 2;
    }else{
        echo 3;
        createUser($user, $email, $password);
    }
    ?>

    

    