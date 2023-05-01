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
            ?>

            <div id="content">
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[0]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[0]; ?></h5>
                    <p><?= $instructions[0]; ?>
                    </p>

                </div>
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[1]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[1]; ?></h5>
                    <p><?= $instructions[1]; ?>
                    </p>

                </div>
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[2]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[2]; ?></h5>
                    <p><?= $instructions[2]; ?>
                    </p>

                </div>
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[3]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[3]; ?></h5>
                    <p><?= $instructions[3]; ?>
                    </p>

                </div>
             
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[4]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[4]; ?></h5>
                    <p><?= $instructions[4]; ?>
                    </p>

                </div>
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[5]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[5]; ?></h5>
                    <p><?= $instructions[5]; ?>
                    </p>

                </div>
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[6]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[6]; ?></h5>
                    <p><?= $instructions[6]; ?>
                    </p>

                </div>
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[7]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[7]; ?></h5>
                    <p><?= $instructions[7]; ?>
                    </p>

                </div>
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[8]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[8]; ?></h5>
                    <p><?= $instructions[8]; ?>
                    </p>

                </div>
                <div class="exerciseRecs">
                    <h2><?= $exerciseName[9]; ?></h2>
                    <h5>Difficulty: <?= $difficulty[9]; ?></h5>
                    <p><?= $instructions[9]; ?>
                    </p>

                </div>
            </div>

            <button id="refreshButton">Show More</button>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>

</html>