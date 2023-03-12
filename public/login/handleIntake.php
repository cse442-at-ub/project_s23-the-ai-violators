<?php

    require __DIR__ . '/../../config/database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkLogin($username, $password)){
        if (checkInitalLogin($username)){
            require __DIR__ . '/public/survey/index.html';
        }
        else{
            require __DIR__ . '/public/content/index.php';
        }
    }
    else{
        require __DIR__ . '/public/login/index.html';
    }
