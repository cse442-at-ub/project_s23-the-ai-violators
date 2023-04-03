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
  <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profileEdit/profileEdit.css">
  <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profileEdit/profileEdit.css">

  

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
</head>


    <body>
    <form method="POST" action = "editIntake.php">
        
        <div class = "userIcon">
            <img src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/user.png" alt="">
        </div>
        


        <h1>Your Profile</h1>
        <h2>Here's a look at you...</h2>
       
        <div id ="profileForm">
        </div>

        <div id ="userName">
            <p> <?php echo $_SESSION['user_name'] ?> </p>
        </div>

        
        <div id = "logout">
            <button id="logoutButton" type="button" onClick="window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login'; sessionStorage.removeItem('username')">Logout</button>
        </div>

        <div id = "editProfile">
            <button id="submitButton" type="submit">
            Save
            </button>
        </div>


        <div id ="email">
            <p>chad69@gmail.com</p>
        </div>
        
    
        
        <div class="navbar">
        <a id="NUTRIO" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content">
            <div>
                <img id="carrot" src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/image/carrot.png" alt="">
                <p id="logoName">nutr.io</p>
            </div>
        </a>
        <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/">Profile
            Page</a>
        <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/">Track Page</a>
        <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/">Logout</a>
        <div>


        
        <div id = "sex">
            <p>Sex:</p>
        </div>

        <div id = "sexEdit">
            <select name = "sex">
              <option value="" disabled selected>Select your sex...</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other/Prefer Not To Say</option>
            </select>
        </div>
        
        <div id = "height">
            <p>Height:</p>
        </div>

        <div id = "heightEdit">
            <input type="number" name="height" placeholder="Enter Your Height(In)" min = "1" max="999" oninput="check()" >
        </div>

        <div id = "weight">
            <p>Weight:</p>
        </div>

        <div id = "weightEdit">
            <input type="number" name="weight" placeholder="Enter Your Weight(lbs)" min = "1" max="999" oninput="check()" >
        </div>

        <div id = "curgoal">
            <p>Current Goal:</p>
        </div>

        <div id = "curgoalEdit">
            <select name="goal" id="goal">
              <option value="" disabled selected>Select your goal...</option>
              <option value="cut">Lose Weight/Cut</option>
              <option value="bulk">Gain Weight/Bulk</option>
              <option value="maintain">Maintain</option>
            </select>  
        </div>

        <div id = "macro">
            <p>Focus Macro:</p>
        </div>

        <div id = "macroEdit">
            <select name="macros" id="goal">
              <option value="" disabled selected>Select your macro...</option>
              <option value="protien">Proteins</option>
              <option value="carb">Carbohydrates</option>
              <option value="fat">Fats</option>
            </select>  
        </div>

        <div id = "calgoal">
            <p>Current Calorie Goal:</p>
        </div>

        <div id = "calgoalEdit">
            <input type="number" name="targetCAL" id="calorie" placeholder="Enter Your Goal" min = "1" max="9999999" oninput="check()">
        </div>

        
        <div id = "restrict">
            <p>Restrictions:</p>
        </div>

        <div id = "restrictEdit">
        <input type="checkbox" id="lactose" name="lactose" checked>
          <label for="lactose">Lactose Intolerance</label>
          <input type="checkbox" id="" name="gluten" checked>
          <label for="gluten">Gluten Intolerance</label>
          <input type="checkbox" id="vegetarian" name="vegetarian" checked>
          <label for="vegetarian">Vegetarian</label>
          <input type="checkbox" id="vegan" name="vegan" checked>
          <label for="vegan">Vegan</label>
          <input type="checkbox" id="kosher" name="kosher" checked>
          <label for="kosher">Kosher</label>
          <input type="checkbox" id="dairy" name="dairy" checked>
          <label for="dairy">Dairy Free</label>
          <input type="checkbox" id="peanuts" name="peanuts" checked>
          <label for="peanuts">Peanut Allergy</label>
          <input type="checkbox" id="fish" name="fish" checked>
          <label for="fish">Fish/Shellfish Allergy</label>
          <input type="checkbox" id="wheat" name="wheat" checked>
          <label for="wheat">Wheat Allergy</label>
        </div>






    </form>
    </body>

</html>