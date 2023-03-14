<?php


require __DIR__ . '/../../config/database.php';


   $username = $_POST['username'];
   $password = $_POST['password'];


   if (checkLogin($username, $password)){
       if (checkInitalLogin($username)){
           header("Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/survey/");
           exit();
       }
       else{
           header("Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/");
           exit();
       }
   }
   else{
       echo "<script>mess();</script>";
       header("Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/");
       exit();
   }
