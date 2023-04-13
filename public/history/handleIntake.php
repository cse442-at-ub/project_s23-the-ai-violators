<?php

    require __DIR__ . '/../../config/database.php';

    $user_name = $_POST['username'];
    $date = $_POST['date'];
    $meal_name = $_POST['meal'];
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];
    $carbs = $_POST['carbs'];
    $fat = $_POST['fats'];
    $mId = $_POST['mId'];

 
    if (edit($user_name, $meal_name, $date, $calories, $protein, $carbs, $fat, $mId)){
        echo 1;
    } else {
        echo 2;
    }



