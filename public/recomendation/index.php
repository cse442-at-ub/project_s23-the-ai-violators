<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/');
    exit();
}

require __DIR__ . "../../../config/find_meals.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/recomendation/meals.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">

</head>

<body>
    <?php include "../../templates/navbar.php" ?>


    <div id="mainShit">
        <div class="mealHolder">
            <div id="header">
                <h1>Meal Recomendations</h1>
                <div>
                    <?php
                    $output = "";
                    $remainingMacros = getRemainingMacros($_SESSION['user_name']);
                    $info = getUserInfo($_SESSION['user_name']);
                    if ($remainingMacros[0] <= 100) {
                        echo 'You do not have sufficient calories to be recommended anything at the moment';
                        exit();
                    }
                    $output .=
                        'remaining calories: ' . round($remainingMacros[0]) .
                        ' protien:' . round($remainingMacros[2]) . 'g ' .
                        ' carbs:' . round($remainingMacros[1]) . 'g ' .
                        ' fats:' . round($remainingMacros[3]) . 'g ';
                    echo $output;
                    ?>
                </div>
            </div>

            <?php
            $meals = getMeal($_SESSION['user_name'], 3, $info[12]);
            $foodName = array();
            $foodCalories = array();
            $protein = array();
            $fats = array();
            $carbs = array();

            for ($i = 0; $i < count($meals); $i++) {
                array_push($foodName, $meals[$i]['title']);
                array_push($foodCalories, round($meals[$i]['nutrition']['nutrients'][0]['amount']));
                array_push($protein, round($meals[$i]['nutrition']['nutrients'][1]['amount'], 1));
                array_push($fats, round($meals[$i]['nutrition']['nutrients'][2]['amount'], 1));
                array_push($carbs, round($meals[$i]['nutrition']['nutrients'][3]['amount'], 1));
            }
            ?>

            <div id="content">
                <div class="mealRecs">
                    <h2><?= $foodName[0]; ?> - <?= $foodCalories[0]; ?> calories</h2>
                    <p>Macro nutritional breakdown:
                        protein: <?= $protein[0]; ?>
                        carbs: <?= $carbs[0]; ?>
                        fats: <?= $fats[0]; ?>
                    </p>

                    <form class="mealdata" method="POST" action="">
                        <input type="hidden" name="meal1" id="meal1" value="<?= $foodName[0]; ?>">
                        <input type="hidden" name="calories1" id="calories1" value=<?= $foodCalories[0]; ?>>
                        <input type="hidden" name="protein1" id="protein1" value=<?= $protein[0]; ?>>
                        <input type="hidden" name="carbs1" id="carbs1" value=<?= $carbs[0]; ?>>
                        <input type="hidden" name="fats1" id="fats1" value=<?= $fats[0]; ?>>
                        <button class="add">Add</button>
                    </form>
                </div>
                <div class="mealRecs">
                    <h2><?= $foodName[1]; ?> - <?= $foodCalories[1]; ?> calories</h2>
                    <p>Macro nutritional breakdown:
                        protein: <?= $protein[1]; ?>
                        carbs: <?= $carbs[1]; ?>
                        fats: <?= $fats[1]; ?>
                    </p>

                    <form class="mealdata" method="POST" action="">
                        <input type="hidden" name="meal2" id="meal2" value="<?= $foodName[1]; ?>">
                        <input type="hidden" name="calories2" id="calories2" value=<?= $foodCalories[1]; ?>>
                        <input type="hidden" name="protein2" id="protein2" value=<?= $protein[1]; ?>>
                        <input type="hidden" name="carbs2" id="carbs2" value=<?= $carbs[1]; ?>>
                        <input type="hidden" name="fats2" id="fats2" value=<?= $fats[1]; ?>>
                        <button class="add">Add</button>
                    </form>
                </div>
                <div class="mealRecs">
                    <h2><?= $foodName[2]; ?> - <?= $foodCalories[2]; ?> calories</h2>
                    <p>Macro nutritional breakdown:
                        protein: <?= $protein[2]; ?>
                        carbs: <?= $carbs[2]; ?>
                        fats: <?= $fats[2]; ?>
                    </p>

                    <form class="mealdata" method="POST" action="">
                        <input type="hidden" name="meal3" id="meal3" value="<?= $foodName[2]; ?>">
                        <input type="hidden" name="calories3" id="calories3" value=<?= $foodCalories[2]; ?>>
                        <input type="hidden" name="protein3" id="protein3" value=<?= $protein[2]; ?>>
                        <input type="hidden" name="carbs3" id="carbs3" value=<?= $carbs[2]; ?>>
                        <input type="hidden" name="fats3" id="fats3" value=<?= $fats[2]; ?>>
                        <button class="add">Add</button>
                    </form>
                </div>
            </div>

            <!-- <button id="refreshButton">Refresh</button> -->
        </div>
    </div>

    <script src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/recomendation/meals.js"></script>

</body>

</html>