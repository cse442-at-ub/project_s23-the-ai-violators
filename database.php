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
?>