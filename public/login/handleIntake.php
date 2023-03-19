
<?php
      
   require __DIR__ . '/../../config/database.php';


   $user_name = $_GET['username'];
   $password_hash = $_GET['password']; 

   if (checkLogin($user_name, $password_hash)){
       if (checkInitalLogin($user_name)){
        echo 0;
       }
       else{
        echo 1;
       }
   } else {
    echo 2;
   }
