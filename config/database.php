<?php
   // connect to the mySQL database, create a table called users with rows for id, name, and email
   $mysqli = mysqli_connect("db", "admin", "password", "test_db");

   $result = mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS users (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name TEXT, email TEXT)");
   echo "Table created successfully\n";

   // insert a row into the table
   $result = mysqli_query($mysqli, "INSERT INTO users (name, email) VALUES ('John', 'john@email.com')");
   echo "Row inserted successfully\n";

   // select all rows from the table
   $result = mysqli_query($mysqli, "SELECT * FROM users");
   $row = mysqli_fetch_row($result);
   
   echo "If you see names and emails below, retrieval from the database was successful!\n";
   // print the results
   while ($row = mysqli_fetch_row($result)) {
      echo $row[0] . " " . $row[1] . "\n";
   }

   mysqli_free_result($result);
   mysqli_close($mysqli);


   function createUser($name, $email) {
      // insert a row into the table
      echo "Creating user $name with email $email\n";
   }

   function checkLogin($email, $password) {
      
   }

?>

<!-- 

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