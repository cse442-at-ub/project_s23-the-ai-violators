<?php
// connect to the mySQL database, create a table called users with rows for id, name, and email

function testDB()
{
  $mysqli = mysqli_connect("db", "admin", "password", "test_db");
  
  // create a table
  echo "Testing creating user table<br>";
  createUserTable();

  // insert a row into the table
  echo "Testing creating user with email user@email.com<br>";
  createUser("user@email.com", "password123");
  echo "User created successfully<br>";

  echo "<br>Testing correct login for user@email.com<br>";
  $loggedIn = checkLogin("user@email.com", "password123");

  echo "<br>Testing incorrect login for user@email.com<br>";
  $loggedIn = checkLogin("user@email.com", "password1234");

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

function createUserTable() {
  $mysqli = mysqli_connect("db", "admin", "password", "test_db");
  $result = mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS users (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, email TEXT, password TEXT)");
  echo "Table created successfully<br><br>";
}


function createUser($email, $password)
{
  $mysqli = mysqli_connect("db", "admin", "password", "test_db");

  // check that the email is not already in the database
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$email'");
  $row = mysqli_fetch_row($result);

  // commented out email check for testing purposes
  // if ($row) {
  //   echo "Email already in use!<br>";
  //   return;
  // }

  $hashed = password_hash($password, PASSWORD_DEFAULT);
  $result = mysqli_query($mysqli, "INSERT INTO users (email, password) VALUES ('$email', '$hashed')");
  // echo "Row inserted successfully<br>";
}

function checkLogin($email, $password)
{
  $mysqli = mysqli_connect("db", "admin", "password", "test_db");
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$email'");
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

CREATE TABLE users (
  user_id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  password_hash CHAR(60) NOT NULL,
  PRIMARY KEY (user_id),
  UNIQUE KEY (email)
);

CREATE TABLE user_info (
  user_id INT NOT NULL,
  height DECIMAL(5,2) NOT NULL,
  weight DECIMAL(5,2) NOT NULL,
  goal ENUM('CUT', 'BULK', 'MAINTAIN') NOT NULL,
  PRIMARY KEY (user_id),
  CONSTRAINT fk_user_info_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE daily_intake (
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