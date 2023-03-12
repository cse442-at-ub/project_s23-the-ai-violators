<?php

    require __DIR__ . '/../../config/database.php';


    $date = $_POST['date'];
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];
    $carbs = $_POST['carbs'];
    $fats = $_POST['fats'];

    trackCaloriesAndMacros(69, $date, $calories, $protein, $carbs, $fats);


