<?php

    require __DIR__ . '/../../config/database.php';

    $user_id = $_GET['user_id'];

    $macros = getMacroGoals($user_id);
    
