<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/');
    exit();
}


require __DIR__ . "../../../config/find_exercise.php";

$userInfo = getUserInfo($_SESSION['user_name']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/exercise/exercise.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
</head>

<body>



    <?php include "../../templates/navbar.php" ?>

    <div id="main">

        <div class="exerciseHolder">
            <div id="header">
                <h1>Exercise Recommendations</h1>
                <div>Current Fitness Goal: <?php echo $userInfo[10] ?></div>
            </div>

            <?php
            $exercises = getExercise($_SESSION['user_name']);
            $exerciseName = array();
            $muscle = array();
            $equipment = array();
            $difficulty = array();
            $instructions = array();

            for ($i = 0; $i < count($exercises); $i++) {
                array_push($exerciseName, $exercises[$i]['name']);
                array_push($muscle, $exercises[$i]['muscle']);
                array_push($equipment, $exercises[$i]['equipment']);
                array_push($difficulty, $exercises[$i]['difficulty']);
                array_push($instructions, $exercises[$i]['instructions']);
            }

            // Define the number of exercises to display
            $num_exercises = 3;

            // Generate a set of unique random indexes
            $unique_indexes = array();
            while (count($unique_indexes) < $num_exercises) {
                $rand_index = rand(0, count($exerciseName) - 1);
                if (!in_array($rand_index, $unique_indexes)) {
                    $unique_indexes[] = $rand_index;
                }
            }

            // Display the exercises using the unique indexes
            foreach ($unique_indexes as $index) {
                $exercise_name = $exerciseName[$index];
                $exercise_difficulty = $difficulty[$index];
                $exercise_instructions = $instructions[$index];
            ?>

                <div class="exerciseRecs">
                    <h2><?= $exercise_name; ?></h2>
                    <h5>Difficulty: <?= $exercise_difficulty; ?></h5>
                    <p><?= $exercise_instructions; ?></p>
                </div>

            <?php } ?>


            <button id="refreshButton">Show More</button>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>

</html>