<?php

    require __DIR__ . '/../../config/database.php';


    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $macros = $_POST['macros'];
    $actlevel = $_POST['actlevel'];
    $sex = $_POST['sex'];
    $goal = $_POST['goal'];


    storeSurveyInformation("Chad", $height, $weight, $sex, $age, $actlevel,$goal,$macros);

