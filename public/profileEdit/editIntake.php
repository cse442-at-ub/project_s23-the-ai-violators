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

    $restrictions = array();

    if (isset($_POST['lactose'])) {
        array_push($restrictions, "Lactose Intolerance");
    }
    if (isset($_POST['gluten'])) {
        array_push($restrictions, "Gluten Intolerance");
    }
    if (isset($_POST['vegetarian'])) {
        array_push($restrictions, "Vegetarian");
    }
    if (isset($_POST['vegan'])) {
        array_push($restrictions, "Vegan");
    }
    if (isset($_POST['kosher'])) {
        array_push($restrictions, "Kosher");
    }
    if (isset($_POST['dairy'])) {
        array_push($restrictions, "Dairy Free");
    }
    if (isset($_POST['peanuts'])) {
        array_push($restrictions, "Peanut Allergy");
    }
    if (isset($_POST['fish'])) {
        array_push($restrictions, "Fish/Shellfish Allergy");
    }
    if (isset($_POST['wheat'])) {
        array_push($restrictions, "Wheat Allergy");
    }

    $userRestrictions = getRestrictions($_SESSION['user_name']);

    for ($i=0; $i<count($restrictions); $i++) {
            if (!in_array($restrictions[$i], $userRestrictions)) {
                addRestrictions($_SESSION['user_name'], [$restrictions[$i]]);
            }
    }

    for ($i=0; $i<count($userRestrictions); $i++) {
        if (!in_array($userRestrictions[$i], $restrictions)) {
            removeRestriction($_SESSION['user_name'],[$userRestrictions[$i]]);
        }
}





    header("Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile");

