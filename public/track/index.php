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
  <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/track.css">

  <title>track</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
</head>

<body>
  
  <div class="navbar">
    <a id="NUTRIO" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content">
      <div>
        <img id="carrot" src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/image/carrot.png" alt="">
        <p id="logoName">nutr.io</p>
      </div>
    </a>
    <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/">Profile Page</a>
    <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/">Track Page</a>
    <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/recomendation">Recomendations</a>
    <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/">Logout</a>
    <div>
      <div id="username">%Cusername%</div>
    </div>

  </div>

  <h1>Add a meal or snack</h1>
  <div id="trackForm">
    <form method="POST" action="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/handleIntake.php">
      <div class = "dateIn">
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>
        <label for="meal">Meal</label>
        <input type="text" id="meal" name="meal" placeholder="name" required>
      </div>
      <!--div class = "meals">
        <button id="breakfast" type="button">Breakfast</button>
        <button id="lunch" type="button">Lunch</button>
        <button id="dinner" type="button">Dinner</button>
        <button id="snack" type="button">Snack</button>
      </div-->
      <div class = "cal">
        <label for="calories">Calories</label>
        <input type="number" name="calories" id="calories" required>
      </div>
      <div class = "carb"> 
        <label for="carbs">Carbs</label>
        <input type="number" name="carbs" id="carbs" placeholder="             g" required>
      </div>
      <div class = "pro">
        <label for="protein">Protein</label>
        <input type="number" name="protein" id="protein" placeholder="             g" required>
      </div>
      <div class = "fat">
        <label for="fats">Fats</label>
        <input type="number" name="fats" id="fats" placeholder="             g" required>
      </div>
      <div class = "sub">
        <button id="add" type="submit">Add</button>
      </div>
    </form>

    <div class="error-msg">
      <i class="fa fa-times-circle"></i>
      %Error%
    </div>
  </div>

  <script src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/track.js"></script>

</body>
</html>
