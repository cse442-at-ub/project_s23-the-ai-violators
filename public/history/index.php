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
  <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/history/history.css">

  <title>history</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
</head>

<body>

  <?php include "../../templates/navbar.php" ?>


  <h1>Lets see how you did last week...</h1>

  <div id="box">
    <div id="current">
      <h2 class="tday">Today Mon. 4/3</h2>
      <div id="lable">
        <h2 class="mac">Carbs</h2>
        <h2 class="mac">Protein</h2>
        <h2 class="mac">Fats</h2>
        <h2 class="cal">Calories</h2>
      </div>
      <div id="g">
        <h2 class="goals">110g / 216</h2>
        <h2 class="goals">420g / 600</h2>
        <h2 class="goals">51g / 72</h2>
        <h2 class="cgoals">2278 / 2800</h2>
      </div>
      <hr size="1" color="black" width="1050px">
      <div id="date">
        <h2 class="d">Sun. 4/2</h2>
        <h2 class="d">Sat. 4/1</h2>
        <h2 class="d">Fri. 3/31</h2>
        <h2 class="d">Thu. 3/30</h2>
        <h2 class="d">Wed. 3/29</h2>
        <h2 class="d">Tue. 3/28</h2>
        <h2 class="d">Mon. 3/27</h2>
      </div>
      <div id="week">
        <h2 class="w">110g / 216</h2>
        <h2 class="w">420g / 600</h2>
        <h2 class="w">51g / 72</h2>
        <h2 class="cw">2278 / 2800</h2>
      </div>
      <div id="week">
        <h2 class="w">110g / 216</h2>
        <h2 class="w">420g / 600</h2>
        <h2 class="w">51g / 72</h2>
        <h2 class="cw">2278 / 2800</h2>
      </div>
      <div id="week">
        <h2 class="w">110g / 216</h2>
        <h2 class="w">420g / 600</h2>
        <h2 class="w">51g / 72</h2>
        <h2 class="cw">2278 / 2800</h2>
      </div>
      <div id="week">
        <h2 class="w">110g / 216</h2>
        <h2 class="w">420g / 600</h2>
        <h2 class="w">51g / 72</h2>
        <h2 class="cw">2278 / 2800</h2>
      </div>
      <div id="week">
        <h2 class="w">110g / 216</h2>
        <h2 class="w">420g / 600</h2>
        <h2 class="w">51g / 72</h2>
        <h2 class="cw">2278 / 2800</h2>
      </div>
      <div id="week">
        <h2 class="w">110g / 216</h2>
        <h2 class="w">420g / 600</h2>
        <h2 class="w">51g / 72</h2>
        <h2 class="cw">2278 / 2800</h2>
      </div>
      <div id="week">
        <h2 class="w">110g / 216</h2>
        <h2 class="w">420g / 600</h2>
        <h2 class="w">51g / 72</h2>
        <h2 class="cw">2278 / 2800</h2>
      </div>
    </div>
  </div>

</body>

</html>