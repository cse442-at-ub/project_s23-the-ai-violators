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
  <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/survey/survey.css">
  <link rel="stylesheet" href="survey.css">



  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
</head>


<div id="surveyForm">

  <body>
    <h1>Nutr.io</h1>
    <div>
      <h2>Tell us a little bit about you and your nutritional goals!</h2>
      <form action="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/survey/surveyIntake.php" method="POST">

        <div>
          <h4>How old are you?</h4>
        </div>

        <div class="userInfoNum">
          <input type="number" name="age" id="age" placeholder="Enter Your Age" min="1" max="150" oninput="check()" required>
        </div>

        <div>
          <h4>What is your sex?</h4>
        </div>
        <div class="box">

          <select name="sex">
            <option value="" disabled selected>Select your sex...</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>

        <div>
          <h4>What is your height and weight?</h4>
        </div>

        <div class="userInfoNum2">


          <input type="number" name="height" id="height" placeholder="Enter Your Height(In)" min="1" max="999" oninput="check()" required>


          <input type="number" name="weight" id="weight" placeholder="Enter Your Weight(lbs)" min="1" max="999" oninput="check()" required>


        </div>

        <div>
          <h4>What fitness goal best highlights what you're trying to achieve?</h4>
        </div>

        <div class="box">
          <select name="goal" id="goal">
            <option value="" disabled selected>Select your goal...</option>
            <option value="cut">Lose Weight/Cut</option>
            <option value="bulk">Gain Weight/Bulk</option>
            <option value="maintain">Maintain</option>
          </select>
        </div>

      

        <div>
          <h4>What food macros are you looking to center recommendations around?</h4>
        </div>
        <div>
          <input type="radio" id="protein" name="macros" value="protein">
          <label for="protein">Proteins</label><br>
          <input type="radio" id="carbs" name="macros" value="carb">
          <label for="carb">Carbohydrates</label><br>
          <input type="radio" id="fats" name="macros" value="fat">
          <label for="fat">Fats</label>
        </div>
        <div>
          <h4>Do you have any dietary restrictions?</h4>
        </div>
        <div>
          <input type="checkbox" id="lactose" name="lactose">
          <label for="lactose">Lactose Intolerance</label>
          <input type="checkbox" id="" name="gluten">
          <label for="gluten">Gluten Intolerance</label>
          <input type="checkbox" id="vegetarian" name="vegetarian">
          <label for="vegetarian">Vegetarian</label>
          <input type="checkbox" id="vegan" name="vegan">
          <label for="vegan">Vegan</label>
          <input type="checkbox" id="kosher" name="kosher">
          <label for="kosher">Kosher</label>
          <input type="checkbox" id="dairy" name="dairy">
          <label for="dairy">Dairy Free</label>
          <input type="checkbox" id="peanuts" name="peanuts">
          <label for="peanuts">Peanut Allergy</label>
          <input type="checkbox" id="fish" name="fish">
          <label for="fish">Fish/Shellfish Allergy</label>
          <input type="checkbox" id="wheat" name="wheat">
          <label for="wheat">Wheat Allergy</label>



        </div>

        <div>
          <h4>On a scale from 1 (not acive at all) to 7 (extremely active), how would you describe your activity level?</h4>
        </div>

        <div class="userInfoNum">
          <select class="form-select" name="activity-level">
            <option value="" disabled selected>Select your activity level...</option>
            <option value="1.2">Not Active At All</option>
            <option value="1.3">Lightly Active</option>
            <option value="1.4">Moderately Active</option>
            <option value="1.5">Active</option>
            <option value="1.6">Very Active</option>
            <option value="1.7">Extremely Active</option>
            <option value="1.9">Professional Athlete</option>
          </select>
        </div>

        <div>

          <button id="submitButton" type="submit" onsubmit="window.location.href= 'www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/'">
            Get Started
          </button>

        </div>

      </form>




    </div>
</div>



</body>

</html>