<?php
session_start();

require __DIR__ . '/../../config/database.php';


$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$macros = $_POST['macros'];
$actlevel = $_POST['activity-level'];
$sex = $_POST['sex'];
$goal = $_POST['goal'];



// $gluten = $_POST['gluten'];
// $vegetarian = $_POST['vegetarian'];
// $vegan = $_POST['vegan'];
// $kosher = $_POST['kosher'];
// $dairy = $_POST['dairy'];
// $peanuts = $_POST['peanuts'];
// $fish = $_POST['fish'];
// $wheat = $_POST['wheat'];


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




storeSurveyInformation($_SESSION['user_name'], $height, $weight, strtoupper($sex), $age, $actlevel, strtoupper($goal), $macros);


addRestrictions($_SESSION['user_name'], $restrictions);

header("Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content");
