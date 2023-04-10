<?php
session_start();

    require __DIR__ . '/../../config/database.php';


    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $macros = $_POST['macros'];
    $actlevel = $_POST['actlevel'];
    $sex = $_POST['sex'];
    $goal = $_POST['goal'];


    storeSurveyInformation($_SESSION['user_name'], $height, $weight, strtoupper($sex), $age, $actlevel,strtoupper($goal),$macros);

    header("Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content");

