<?php

    require __DIR__ . '/../../config/database.php';

    $user_id = $_GET['user_id'];

    $goal = getCalorieGoals($user_id);

    echo json_encode($goal);
