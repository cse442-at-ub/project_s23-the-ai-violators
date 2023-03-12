<?php

    require __DIR__ . '/../../config/database.php';

    $email = $_POST['email'];
    $user = $_POST['username'];
    $password = $_POST['password'];

    createUser($user, $email, $password);

    header("Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/index.html");