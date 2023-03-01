<?php
   // connect to the mySQL database and print all table names
   $mysqli = mysqli_connect("db", "admin", "password", "test_db");
   $result = mysqli_query($mysqli, "SHOW TABLES");
   while ($row = mysqli_fetch_row($result)) {
      echo "Table: {$row[0]}\n";
   }



   mysqli_free_result($result);
   mysqli_close($mysqli);     
?>