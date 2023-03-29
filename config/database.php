<?php

/**
 * Returns a connection to the database.
 * @return mysqli A connection to the database.
 */

function getConnection()
{
  $db_hostname = getenv('IN_DOCKER');

  if ($db_hostname == 'yes') {
    $db_hostname = 'db';
  } else {
    $db_hostname = 'oceanus.cse.buffalo.edu';
  }

  return mysqli_connect($db_hostname, "sjrichel", "50338787", "cse442_2023_spring_team_g_db", 3306);
}


/**
 * Retruns the user ID of a user from their username.
 * @param string $user_name The username of the user.
 * @return int The user ID of the user.
 */
function getIDFromUsername(string $user_name): int
{
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT user_id FROM users WHERE user_name='$user_name'");
  $row = mysqli_fetch_row($result);
  return $row[0];
}

/**
 * Checks if a user has taken the survey.
 * @param string $user_name The username of the user.
 * @return bool True if the user has taken the survey, false otherwise.
 */
function checkInitalLogin(string $user_name)
{
  $mysqli = getConnection();
  $userID = getIDFromUsername($user_name);
  $result = mysqli_query($mysqli, "SELECT * FROM user_info WHERE user_id='$userID'");
  $row = mysqli_fetch_row($result);
  if ($row) {
    return true;
  } else {
    return false;
  }
}


/**
 * Add new meal entry into the database.
 * @param string $user_name The username of the user.
 * @param string $date In the format YYYY-MM-DD.
 * @param float $calroies The number of calories in the meal.
 * @param float $protein The number of grams of protein in the meal.
 * @param float $carbs The number of grams of carbs in the meal.
 * @param float $fat The number of grams of fat in the meal.
 * @return bool True if the meal was added successfully, false otherwise.
 */
function trackCaloriesAndMacros(string $user_name, string $date, float $calroies, float $protein, float $carbs, float $fat)
{
  // echo "HELLO! This probaly worked, but useres arent set up yet, so expect error";
  $user_id = getIDFromUsername($user_name);
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "INSERT INTO daily_intake (user_id, date, calories, protein, carbs, fat) VALUES ('$user_id', '$date', '$calroies', '$protein', '$carbs', '$fat')");
  // echo $result;
  if ($result) {
    return true;
  } else {
    return false;
  }
}


/**
 *  Retrieves the daily calorie goal for the given user.
 *  @param string $user_name The username of the user whose calorie goal should be retrieved.
 *  @return float The user's daily calorie goal.
 */
function getCalorieGoals(string $user_name)
{
  $user_id = getIDFromUsername($user_name);
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT targetCAL FROM user_info WHERE user_id='$user_id'");
  $row = mysqli_fetch_row($result);
  return $row[0];
}


/**
 *  Retrieves the daily macro nutrient goals for the given user.
 *  @param string $user_name The username of the user whose macro nutrient goals should be retrieved.
 *  @return array An array representing the user's daily macro nutrient goals, including targetPROTIEN, targetCARBS, and targetFAT.
 */
function getMacroGoals(string $user_name)
{
  $user_id = getIDFromUsername($user_name);
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT targetPROTIEN, targetCARBS, targetFAT FROM user_info WHERE user_id='$user_id'");
  $row = mysqli_fetch_row($result);
  return $row;
}

/**
 *  Retrieves the daily calorie intake for the given user on the given date.
 *  @param string $user_name The username of the user whose calorie intake should be retrieved.
 *  @param string $date The date for which the calorie intake should be retrieved.
 *  @return float The user's daily calorie intake on the given date.
 */
function getDailyCalories(string $user_name, string $date)
{
  $user_id = getIDFromUsername($user_name);
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT calories FROM daily_intake WHERE user_id='$user_id' AND date='$date'");
  $row = mysqli_fetch_row($result);
  return $row[0];
}


/**
 *  Retrieves user information from the database based on the given username.
 *  @param string $user_name The username of the user whose information should be retrieved.
 *  @return array An array representing the user's information, including user_id, height, weight, age, sex,
 *                activityLevel, targetCAL, targetPROTIEN, targetCARBS, targetFAT, goal, and focus in that order.
 */
function getUserInfo(string $user_name)
{
  $user_id = getIDFromUsername($user_name);
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT * FROM user_info WHERE user_id='$user_id'");
  $row = mysqli_fetch_row($result);

  return $row;
}



/**
 * Updates the user's information in the database. Only the parameters you pass in will be updated ---  EXAMPLE: updateUserInfo("chad", age: 20, weight: 180) - This will only update the user's age and weight.
 * @param string $user_name The username of the user whose information should be updated.
 * @param int $height The user's height in inches.
 * @param int $weight The user's weight in pounds.
 * @param string $sex "MALE" or "FEMALE", The user's biological sex.
 * @param int $age The user's age.
 * @param float $activityLvl Range from 1.2 to 1.9, The user's activity level.
 * @param string $goal "BULK" OR "CUT" OR "MAINTAIN", The user's primary fitness goal.
 * @param string $focus "PROTIEN" OR "CARB" OR "FAT", The user's primary area of focus.
 * @return void
 */
function updateUserInfo(string $user_name, int $height = NULL, int $weight = NULL, string $sex = NULL, int $age = NULL, float $activityLvl = NULL, string $goal = NULL, string $focus = NULL)
{

}


/**
 *  Stores the survey information for the given user in the database.
 *  @param string $user_name The username of the user whose survey information should be stored.
 *  @param int $height The user's height in inches.
 *  @param int $weight The user's weight in pounds.
 *  @param string $sex "MALE" or "FEMALE", The user's biological sex.
 *  @param int $age The user's age.
 *  @param float $activityLvl Range from 1.2 to 1.9, The user's activity level.
 *  @param string $goal "BULK" OR "CUT" OR "MAINT", The user's primary fitness goal.
 *  @param string $focus "PROTIEN" OR "CARBS" OR "FATS", The user's primary area of focus.
 *  @return void
 */
function storeSurveyInformation(string $user_name, int $height, int $weight, string $sex, int $age, float $activityLvl, string $goal, string $focus)
{
  $mysqli = getConnection();
  $userID = getIDFromUsername($user_name);
  $bmr = 0;

  if ($sex == "MALE") {
    $bmr = 88.362 + (6.23 * $weight) + (12.7 * $height) - (6.76 * $age);
  } else {
    $bmr = 447.593 + (4.3 * $weight) + (4.7 * $height) - (4.68 * $age);
  }

  $targetCAL = $bmr * $activityLvl;


  if ($goal == "CUT") {
    $targetCAL = $targetCAL - 500;
  } else if ($goal == "BULK") {
    $targetCAL = $targetCAL + 200;
  }

  $targetPROTIEN = $weight;
  $targetFAT = $weight * 0.4;
  $targetCARBS = ($targetCAL - ($targetPROTIEN * 4.) - ($targetFAT * 9.)) / 4.;

  if ($focus == "PROTIEN") {
    $targetPROTIEN = $weight * 1.2;
  } else if ($focus == "CARB") {
    $targetCARBS *= 1.2;
  } else if ($focus == "FAT") {
    $targetFAT *= 1.1;
  }

  // SQL INJECTION?
  $result = mysqli_query($mysqli, "INSERT INTO user_info (user_id, height, weight, age, sex, activityLevel, targetCAL, targetPROTIEN, targetCARBS, targetFAT, goal, focus) VALUES ('$userID', '$height', '$weight', '$age', '$sex', '$activityLvl', '$targetCAL', '$targetPROTIEN', '$targetCARBS', '$targetFAT', '$goal', '$focus')");
}

/**
 *  Checks if an email is already in use.
 *  @param string $email The email to check.
 *  @return bool True if the email is already in use, false otherwise.
 */
function checkIfEmailUsed($email)
{
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE email='$email'");
  $row = mysqli_fetch_row($result);
  if ($row) {
    return true;
  } else {
    return false;
  }
}


/**
 * Checks if a username is already in use.
 * @param string $user_name The username to check.
 * @return bool True if the username is already in use, false otherwise.
 */
function checkIfUserNameUsed($user_name)
{
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE user_name='$user_name'");
  $row = mysqli_fetch_row($result);
  if ($row) {
    return true;
  } else {
    return false;
  }
}

/**
 * Creates a new user in the database.
 * @param string $user_name The username of the new user.
 * @param string $email The email of the new user.
 * @param string $password The password of the new user.
 * @return bool True if the user was successfully created, false if user or email already in use.
 */
function createUser($user_name, $email, $password)
{
  $mysqli = getConnection();

  if (checkIfEmailUsed($email) || checkIfUserNameUsed($user_name)) {
    return false;
  }
  $hashed = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($mysqli, "INSERT INTO users (user_name, email, password_hash) VALUES ('$user_name', '$email', '$hashed')");
  return true;
}


/**
 * Checks if a user's login information is correct.
 * @param string $user_name The username of the user.
 * @param string $password The password of the user.
 * @return bool True if the login information is correct, false otherwise.
 */
function checkLogin($user_name, $password)
{
  $mysqli = getConnection();
  $result = mysqli_query($mysqli, "SELECT password_hash FROM users WHERE user_name='$user_name'");
  $row = mysqli_fetch_row($result);
  if ($row) {
    $hashed = $row[0];
    if (password_verify($password, $hashed)) {
      // echo "Login successful!<br>";
      return true;
    } else {
      // echo "Login failed! Password doesn't match!<br>";
      return false;
    }
  } else {
    // echo "Login failed! No user found with that email!<br>";
    return false;
  }
}
