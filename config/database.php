<?php
// connect to the mySQL database, create a table called users with rows for id, name, and email

function testDB()
{

  $db_hostname = getenv('IN_DOCKER');

  if ($db_hostname == 'yes') {
    $db_hostname = 'db';
  } else {
    $db_hostname = 'oceanus.cse.buffalo.edu';
  }

  $mysqli = mysqli_connect($db_hostname, "sjrichel", "50338787", "cse442_2023_spring_team_g_db", 3306);

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



function checkTablesAndCols($mysqli) {
  // get column names from the users table
  $result = mysqli_query($mysqli, "SHOW columns FROM users");

  $usersCols = array("user_id", "user_name", "email", "password_hash");
  
  for ($i = 0; $i < count($usersCols); $i++) {
    $row = mysqli_fetch_row($result);
    if ($row[0] != $usersCols[$i]) {
      echo "Table users is missing column " . $usersCols[$i] . "<br>";
      return;
    }
  }
  echo "Table users exists and has all the correct columns<br>";

  $userInfoCols = array("user_id", "sex", "height", "weight", "goal", "focus");
  $result = mysqli_query($mysqli, "SHOW columns FROM user_info");

  for ($i = 0; $i < count($userInfoCols); $i++) {
    $row = mysqli_fetch_row($result);
    if ($row[0] != $userInfoCols[$i]) {
      echo "Table user_info is missing column " . $userInfoCols[$i] . "<br>";
      return;
    }
  }
  echo "Table user_info exists and has all the correct columns<br>";


  $result = mysqli_query($mysqli, "SHOW columns FROM daily_intake");
  $dailyIntakeCols = array("user_id", "date", "calories", "protein", "carbs", "fat");
  for ($i = 0; $i < count($dailyIntakeCols); $i++) {
    $row = mysqli_fetch_row($result);
    if ($row[0] != $dailyIntakeCols[$i]) {
      echo "Table daily_intake is missing column " . $dailyIntakeCols[$i] . "<br>";
      return;
    }
  }
  echo "Table daily_intake exists and has all the correct columns<br>";

}


function createUser($mysqli, $user_name, $email, $password)
{
  // check that the email is not already in the database
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$email'");
  $row = mysqli_fetch_row($result);

  // commented out email check for testing purposes
  // if ($row) {
  //   echo "Email already in use!<br>";
  //   return;
  // }

  $hashed = password_hash($password, PASSWORD_DEFAULT);
  $result = mysqli_query($mysqli, "INSERT INTO users (user_name, email, password_hash) VALUES ('$user_name', '$email', '$hashed')");
  // echo "Row inserted successfully<br>";
}

function checkLogin($mysqli, $user_name, $password)
{
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

?>

<!-- 


q: can I have a + characher in my git branch name?
a: yes, but you have to escape it with a backslash

DATABASE DESIGN IDEAS

CREATE TABLE IF NOT EXISTS users (
  user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_name text NOT NULL,
  email text NOT NULL,
  password_hash text NOT NULL,
);

CREATE TABLE IF NOT EXISTS user_info (
  user_id INT NOT NULL PRIMARY KEY,
  sex ENUM('male', 'female') NOT NULL,
  height DECIMAL(5,2) NOT NULL,
  weight DECIMAL(5,2) NOT NULL,
  goal ENUM('CUT', 'BULK', 'MAINTAIN') NOT NULL,
  focus ENUM('PROTIEN', 'CARBS', 'FATS') NOT NULL,
  CONSTRAINT fk_user_info_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS daily_intake (
  user_id INT NOT NULL,
  date DATE NOT NULL,
  calories INT NOT NULL,
  protein INT NOT NULL,
  carbs INT NOT NULL,
  fat INT NOT NULL,
  PRIMARY KEY (user_id, date),
  CONSTRAINT fk_daily_intake_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

Thanks chatGPT :)

 -->