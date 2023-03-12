<?php

if (isset($_GET['functionName'])) {
  $functionName = $_GET['functionName'];

  if (function_exists($functionName)) {
      $functionName();
  }
}

function getConnection() {
  $db_hostname = getenv('IN_DOCKER');

  if ($db_hostname == 'yes') {
    $db_hostname = 'db';
  } else {
    $db_hostname = 'oceanus.cse.buffalo.edu';
  }

  return mysqli_connect($db_hostname, "sjrichel", "50338787", "cse442_2023_spring_team_g_db", 3306);

}

function getIDFromUsername(string $user_name): int {
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT user_id FROM users WHERE user_name='$user_name'");
  $row = mysqli_fetch_row($result);
  return $row[0];
}

function checkInitalLogin(string $user_name) {
  $mysqli = getConnection();
  $userID = getIDFromUsername($user_name);
  $result = mysqli_query($mysqli, "SELECT * FROM user_info WHERE user_id='$userID'");
  $row = mysqli_fetch_row($result);
  if ($row) {
    return true;
  } else {
    return false;
  }
}

function trackCaloriesAndMacros(int $user_id, string $date, float $calroies, float $protein, float $carbs, float $fat) {
  echo "HELLO! This probaly worked, but useres arent set up yet, so expect error";
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "INSERT INTO daily_intake (user_id, date, calories, protein, carbs, fat) VALUES ('$user_id', '$date', '$calroies', '$protein', '$carbs', '$fat')");
  echo $result;
  if ($result) {
    return true;
  } else {
    return false;
  }
}

function getCalorieGoals($user_id) {
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT targetCAL FROM user_info WHERE user_id='$user_id'");
  $row = mysqli_fetch_row($result);
  return $row[0];
}

function getMacroGoals($user_id) {
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT targetPROTIEN, targetCARBS, targetFAT FROM user_info WHERE user_id='$user_id'");
  $row = mysqli_fetch_row($result);
  return $row;
}

// date should be a string in the format of "YYYY-MM-DD"
function getDailyCalories(int $user_id, string $date) {
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT calories FROM daily_intake WHERE user_id='$user_id' AND date='$date'");
  $row = mysqli_fetch_row($result);
  return $row[0];
}



function storeSurveyInformation(string $user_name, int $height, int $weight, string $sex, int $age, float $activityLvl, string $goal, string $focus) {
  $mysqli = getConnection();
  $userID = getIDFromUsername($user_name);
  $bmr = 0;

  if ($sex == "MALE") {
    $bmr = 88.362 + (6.23 * $weight) + (12.7 * $height) - (6.76 * $age);
  } else {
    $bmr = 447.593 + (4.3 * $weight) + (4.7 * $height) - (4.68 * $age);
  }

  $targetCAL = $bmr * $activityLvl;


  if ($goal == "CUT") {
    $targetCAL = $targetCAL - 500;
  } else if ($goal == "BULK") {
    $targetCAL = $targetCAL + 200;
  }

  $targetPROTIEN = $weight;
  $targetFAT = $weight * 0.4;
  $targetCARBS = ($targetCAL - ($targetPROTIEN * 4.) - ($targetFAT * 9.)) / 4.;

  if ($focus == "PROTIEN") {
    $targetPROTIEN = $weight * 1.2;
  } else if ($focus == "CARB") {
    $targetCARBS *= 1.2 ;
  } else if ($focus == "FAT") {
    $targetFAT *= 1.1;
  }

  // SQL INJECTION?
  $result = mysqli_query($mysqli, "INSERT INTO user_info (user_id, height, weight, age, sex, activityLevel, targetCAL, targetPROTIEN, targetCARBS, targetFAT, goal, focus) VALUES ('$userID', '$height', '$weight', '$age', '$sex', '$activityLvl', '$targetCAL', '$targetPROTIEN', '$targetCARBS', '$targetFAT', '$goal', '$focus')");
  
}

function checkIfEmailUsed($email)
{
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$email'");
  $row = mysqli_fetch_row($result);
  if ($row) {
    return true;
  } else {
    return false;
  }
}

function checkIfUserNameUsed($user_name)
{
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE user_name='$user_name'");
  $row = mysqli_fetch_row($result);
  if ($row) {
    return true;
  } else {
    return false;
  }
}


function createUser($user_name, $email, $password)
{
  $mysqli = getConnection();

  if (checkIfEmailUsed($email) || checkIfUserNameUsed($user_name)) {
    return false;
  }
  $hashed = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($mysqli, "INSERT INTO users (user_name, email, password_hash) VALUES ('$user_name', '$email', '$hashed')");
  return true;
}


function checkLogin($user_name, $password)
{
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE user_name='$user_name'");
  $row = mysqli_fetch_row($result);
  if ($row) {
    $hashed = $row[2];
    if (password_verify($password, $hashed)) {
      echo "Login successful!<br>";
      return true;
    } else {
      echo "Login failed! Password doesn't match!<br>";
      return false;
    }
  } else {
    echo "Login failed! No user found with that email!<br>";
    return false;
  }
}
