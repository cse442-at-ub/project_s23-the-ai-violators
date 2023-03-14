<?php

    require __DIR__ . '/../../config/database.php';

    $email = $_POST['email'];
    $user = $_POST['username'];
    $password = $_POST['password'];

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

    

    