<?php
require __DIR__ . '/database.php';

// This script will run after building the docker devcontainer


$db_hostname = getenv('IN_DOCKER');

if ($db_hostname == 'yes') {
    $db_hostname = 'db';
} else {
    $db_hostname = 'oceanus.cse.buffalo.edu';
}

$mysqli = mysqli_connect($db_hostname, "sjrichel", "50338787", "cse442_2023_spring_team_g_db", 3306);

$users_query = "CREATE TABLE IF NOT EXISTS users (user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,user_name text NOT NULL,email text NOT NULL,password_hash text NOT NULL)";
$user_info_query = "CREATE TABLE IF NOT EXISTS user_info (user_id INT NOT NULL,height FLOAT NOT NULL,weight FLOAT NOT NULL,age INT NOT NULL,sex ENUM('MALE', 'FEMALE'),activityLevel INT NOT NULL,targetCAL FLOAT NOT NULL,targetPROTIEN FLOAT NOT NULL,targetCARBS FLOAT NOT NULL,targetFAT FLOAT NOT NULL,goal ENUM('CUT', 'BULK', 'MAINTAIN') NOT NULL,focus ENUM('PROTIEN', 'CARB', 'FAT') NOT NULL,PRIMARY KEY (user_id),CONSTRAINT fk_user_info_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE)";
$daily_intake_query = "CREATE TABLE IF NOT EXISTS daily_intake (user_id INT NOT NULL, meal_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, meal_name TEXT NOT NULL, date DATE NOT NULL,calories INT NOT NULL,protein INT NOT NULL,carbs INT NOT NULL,fat INT NOT NULL,CONSTRAINT fk_daily_intake_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE)";
$restrictions_query = "CREATE TABLE IF NOT EXISTS restrictions (restriction_id INT AUTO_INCREMENT NOT NULL, restriction_name VARCHAR(255) NOT NULL, UNIQUE(restriction_name), PRIMARY KEY (restriction_id));";
$user_restrictions_query = "CREATE TABLE IF NOT EXISTS user_restrictions (user_id INT NOT NULL, restriction_id INT NOT NULL, PRIMARY KEY (user_id, restriction_id), CONSTRAINT fk_user_restrictions_user_id FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE, CONSTRAINT fk_user_restrictions_restriction_id FOREIGN KEY (restriction_id) REFERENCES restrictions(restriction_id) ON DELETE CASCADE);";

$restriction_types = [
    'Lactose Intolerance',
    'Gluten Intolerance',
    'Vegetarian',
    'Vegan',
    'Kosher',
    'Dairy Free',
    'Peanut Allergy',
    'Fish/Shellfish Allergy',
    'Wheat Allergy'
];

$restriction_values = implode("'), ('", array_map('addslashes', $restriction_types));
$restriction_values_query = "INSERT INTO restrictions (restriction_name) VALUES ('$restriction_values')";
echo $restriction_values_query;


if (mysqli_query($mysqli, $users_query)) {
    echo "Table users created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($mysqli) . "\n";
}

if (mysqli_query($mysqli, $user_info_query)) {
    echo "Table user_info created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($mysqli) . "\n";
}

if (mysqli_query($mysqli, $daily_intake_query)) {
    echo "Table daily_intake created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($mysqli) . "\n";
}

if (mysqli_query($mysqli, $restrictions_query)) {
    echo "Table restrictions created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($mysqli) . "\n";
}

if (mysqli_query($mysqli, $user_restrictions_query)) {
    echo "Table user_restrictions created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($mysqli) . "\n";
}

if (mysqli_query($mysqli, $restriction_values_query)) {
    echo "Restriction values inserted successfully\n";
} else {
    echo "Error inserting restriction values: " . mysqli_error($mysqli) . "\n";
}


// Create test user Chad with id 69 if it doesn't exist
$hash = password_hash('password', PASSWORD_DEFAULT);
$chad_query = "INSERT INTO users (user_id, user_name, email, password_hash) SELECT 69, 'Chad', 'chad@email.com', '$hash' FROM dual WHERE NOT EXISTS (SELECT * FROM users WHERE user_id = 69);";
if (mysqli_query($mysqli, $chad_query)) {
    echo "Chad created successfully\n";
} else {
    echo "Error creating Chad: " . mysqli_error($mysqli) . "\n";
}

storeSurveyInformation("chad", 74, 180, "MALE", 25, 1.8, "BULK", "PROTIEN");

$date = date("Y-m-d");
trackCaloriesAndMacros("chad", "eggs", $date, 2000, 100, 200, 50);

createUser("timmy", "tim@email.com", "password");
