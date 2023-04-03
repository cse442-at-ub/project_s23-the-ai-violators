<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/');
    exit();
}

?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/profile-edit.css">
  <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/profile-edit.css">

  

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
</head>


    <body>
    <form>
        
        <div class = "userIcon">
            <img src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/user.png" alt="">
        </div>
        


        <h1>Editing</h1>
        <h2>Here's a look at you...</h2>
       
        <div id ="profileForm">
        </div>

        <div id ="userName">
            <p>chad69</p>
        </div>

        
        <div id = "logout">
            <button id="logoutButton" type="button" onClick="window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login'; sessionStorage.removeItem('username')">Logout</button>
        </div>

        <div id = "editProfile">
            <button id="submitButton" type="submit">Finish</button>
        </div>


        <div id ="email">
            <p>chad69@gmail.com</p>
        </div>
        
    
        
        <div class="navbar">
            <div>
                <img id="carrot" src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/image/carrot.png" alt="">
                <p id="logoName">nutr.io</p>
            </div>
            <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/">Track Page</a>
    
            <div id="user">chad69</div>
        </div>


        
        <div id = "sex">
            <p>Sex:</p>
        </div>
        
        <div id = "height">
            <p>Height:</p>
        </div>

        <div id = "weight">
            <p>Weight:</p>
        </div>

        <div id = "curgoal">
            <p>Current Goal:</p>
        </div>

        <div id = "macro">
            <p>Focus Macro:</p>
        </div>
       
        <div id = "calgoal">
            <p>Current Calorie Goal:</p>
        </div>

        <div id = "restrict">
            <p>Restrictions:</p>
        </div>






    </form>
    </body>

</html>