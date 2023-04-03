<?php
session_start();

    require __DIR__ . '/../../config/database.php';


    
    // if (isset($_POST['age'])){
    //     $age = $POST['age'];
    // } else {
    //     $age = null;
    // }

    $height = $_POST['height'];
    if ($height == ''){
        $height = null;
    }
    $weight = $_POST['weight'];
    if ($weight == ''){
        $weight = null;
    }
    $macros = $_POST['macros'];
    if ($macros == ''){
        $macros = null;
    }
    // $actlevel = $_POST['actlevel'];
    // if ($actlevel == ''){
    //     $actlevel= null;
    // }
    $sex = $_POST['sex'];
    if ($sex == ''){
        $sex = null;
    }
    $goal = $_POST['goal'];
    if ($goal == ''){
        $goal = null;
    }
    $targetCAL = $_POST['targetCAL'];
    if ($targetCAL == ''){
        $targetCAL = null;
    }


    updateUserInfo($_SESSION['user_name'], $height, $weight, strtoupper($sex), null, null, strtoupper($goal),$macros);

    header("Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile");

