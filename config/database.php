<?php
// connect to the mySQL database, create a table called users with rows for id, name, and email


function getConnection() {
  $db_hostname = getenv('IN_DOCKER');

  if ($db_hostname == 'yes') {
    $db_hostname = 'db';
  } else {
    $db_hostname = 'oceanus.cse.buffalo.edu';
  }

  return mysqli_connect($db_hostname, "sjrichel", "50338787", "cse442_2023_spring_team_g_db", 3306);

}


function testDB()
{

  $mysqli = getConnection();

  checkTablesAndCols($mysqli);

  // insert a row into the table
  echo "Testing creating user with email user@email.com<br>";
  createUser($mysqli, "user", "user@email.com", "password123");
  echo "User created successfully<br>";

  echo "<br>Testing correct login for user@email.com<br>";
  $loggedIn = checkLogin($mysqli, "user@email.com", "password123");

  echo "<br>Testing incorrect login for user@email.com<br>";
  $loggedIn = checkLogin($mysqli, "user@email.com", "password1234");

  // select all rows from the table
  $result = mysqli_query($mysqli, "SELECT * FROM users");
  $row = mysqli_fetch_row($result);

  echo "<br>If you see emails and password hashes below, retrieval from the database was successful!<br>";
  // print the results
  while ($row = mysqli_fetch_row($result)) {
    echo "ID: " . $row[0] . "  &nbsp &nbsp &nbsp EMAIL: " . $row[1] . " &nbsp &nbsp &nbsp PASSWORD HASH: " . $row[2] . "<br>";
  }

  mysqli_free_result($result);
  mysqli_close($mysqli);
}



function checkTablesAndCols()
{

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

function checkIfEmailUsed($mysqli, $email)
{
  $mysqli = getConnection();
}

function checkIfUserNameUsed($mysqli, $user_name)
{
  $mysqli = getConnection();
}


function createUser($user_name, $email, $password)
{
  $mysqli = getConnection();
  // check that the email is not already in the database
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$email'");
  $row = mysqli_fetch_row($result);



  $hashed = password_hash($password, PASSWORD_DEFAULT);
  $result = mysqli_query($mysqli, "INSERT INTO users (user_name, email, password_hash) VALUES ('$user_name', '$email', '$hashed')");
  // echo "Row inserted successfully<br>";
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
