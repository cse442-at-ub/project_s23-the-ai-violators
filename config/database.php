<?php

function getConnection() {
  $db_hostname = getenv('IN_DOCKER');

  if ($db_hostname == 'yes') {
    $db_hostname = 'db';
  } else {
    $db_hostname = 'oceanus.cse.buffalo.edu';
  }

  return mysqli_connect($db_hostname, "sjrichel", "50338787", "cse442_2023_spring_team_g_db", 3306);

}

function getIDFromUsername($user_name) {
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT user_id FROM users WHERE user_name='$user_name'");
  $row = mysqli_fetch_row($result);
  return $row[0];
}

function checkInitalLogin($user_name) {
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

function trackCaloriesAndMacros() {
  $mysqli = getConnection();

}

function getCalorieGoals() {
  $mysqli = getConnection();

}

function getDailyCalories() {
  $mysqli = getConnection();

}


function storeSurveyInformation() {
  $mysqli = getConnection();

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
