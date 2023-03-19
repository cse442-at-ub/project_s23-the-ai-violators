<?php

    require __DIR__ . '/../../config/database.php';

    $date = $_GET['date'];
    $calories = $_GET['calories'];
    $protein = $_GET['protein'];
    $carbs = $_GET['carbs'];
    $fat = $_GET['fats'];
    $user_name = $_GET['username'];

 
    if (trackCaloriesAndMacros($user_name, $date, $calories, $protein, $carbs, $fat)){
        echo 1;
    } else {
        echo 2;
    }



