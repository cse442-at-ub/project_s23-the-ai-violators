
<?php
      
   require __DIR__ . '/../../config/database.php';


   $user_name = $_POST['username'];
   $password_hash = $_POST['password'];


   if (checkLogin($user_name, $password_hash)){
       if (checkInitalLogin($user_name)){
        echo "<script>window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content'</script>";
       }
       else{
        echo "<script>window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/survey'</script>";
       }
   }
   else{
        echo "<script>window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login'</script>";
   }
?>