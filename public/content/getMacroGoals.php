<?php

    require __DIR__ . '/../../config/database.php';

    $user_name = $_GET['user_name'];

    $macros = getMacroGoals($user_name);

    echo json_encode($macros);