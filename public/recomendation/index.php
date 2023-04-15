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

    </div>

    <?php
    $meals = getMeal($_SESSION['user_name'], 3);
    ?>


    <div id="mainShit">

        <div class="mealHolder">
            <div id="header">
                <h1>Meal Recomendations</h1>
                <div>
                    <?php
                    $output = "";

                    $remainingMacros = getRemainingMacros($_SESSION['user_name']);
                    $output .=
                        'remaining calories: ' . $remainingMacros[0] .
                        ' protien:' . $remainingMacros[2] . 'g ' .
                        ' carbs:' . $remainingMacros[1] . 'g ' .
                        ' fats:' . $remainingMacros[3] . 'g ';
                    echo $output;
                    ?>
                </div>
            </div>

            <div id="content">
                <div class="mealRecs">
                    <h2><?= $meals[0]['title']; ?> - <?= $meals[0]['nutrition']['nutrients'][0]['amount']; ?> calories</h2>
                    <p>Macro nutritional breakdown:
                        protein: <?= $meals[0]['nutrition']['nutrients'][1]['amount']; ?>
                        carbs: <?= $meals[0]['nutrition']['nutrients'][3]['amount']; ?>
                        fats: <?= $meals[0]['nutrition']['nutrients'][2]['amount']; ?>
                    </p>

                    <form method="POST" action="">
                        <input type="hidden" name="meal1" id="meal1" value="<?= $meals[0]['title']; ?>">
                        <input type="hidden" name="calories1" id="calories1" value=<?= $meals[0]['nutrition']['nutrients'][0]['amount']; ?>>
                        <input type="hidden" name="protein1" id="protein1" value=<?= $meals[0]['nutrition']['nutrients'][1]['amount']; ?>>
                        <input type="hidden" name="carbs1" id="carbs1" value=<?= $meals[0]['nutrition']['nutrients'][3]['amount']; ?>>
                        <input type="hidden" name="fats1" id="fats1" value=<?= $meals[0]['nutrition']['nutrients'][2]['amount']; ?>>
                        <button class="add">Add</button>
                    </form>
                </div>
                <div class="mealRecs">
                    <h2><?= $meals[1]['title']; ?> - <?= $meals[1]['nutrition']['nutrients'][0]['amount']; ?> calories</h2>
                    <p>Macro nutritional breakdown:
                        protein: <?= $meals[1]['nutrition']['nutrients'][1]['amount']; ?>
                        carbs: <?= $meals[1]['nutrition']['nutrients'][3]['amount']; ?>
                        fats: <?= $meals[1]['nutrition']['nutrients'][2]['amount']; ?>
                    </p>

                    <form method="POST" action="">
                        <input type="hidden" name="meal2" id="meal2" value="<?= $meals[1]['title']; ?>">
                        <input type="hidden" name="calories2" id="calories2" value=<?= $meals[1]['nutrition']['nutrients'][0]['amount']; ?>>
                        <input type="hidden" name="protein2" id="protein2" value=<?= $meals[1]['nutrition']['nutrients'][1]['amount']; ?>>
                        <input type="hidden" name="carbs2" id="carbs2" value=<?= $meals[1]['nutrition']['nutrients'][3]['amount']; ?>>
                        <input type="hidden" name="fats2" id="fats2" value=<?= $meals[1]['nutrition']['nutrients'][2]['amount']; ?>>
                        <button class="add">Add</button>
                    </form>
                </div>
                <div class="mealRecs">
                    <h2><?= $meals[2]['title']; ?> - <?= $meals[2]['nutrition']['nutrients'][0]['amount']; ?> calories</h2>
                    <p>Macro nutritional breakdown:
                        protein: <?= $meals[2]['nutrition']['nutrients'][1]['amount']; ?>
                        carbs: <?= $meals[2]['nutrition']['nutrients'][3]['amount']; ?>
                        fats: <?= $meals[2]['nutrition']['nutrients'][2]['amount']; ?>
                    </p>

                    <form method="POST" action="">
                        <input type="hidden" name="meal3" id="meal3" value="<?= $meals[2]['title']; ?>">
                        <input type="hidden" name="calories3" id="calories3" value=<?= $meals[2]['nutrition']['nutrients'][0]['amount']; ?>>
                        <input type="hidden" name="protein3" id="protein3" value=<?= $meals[2]['nutrition']['nutrients'][1]['amount']; ?>>
                        <input type="hidden" name="carbs3" id="carbs3" value=<?= $meals[2]['nutrition']['nutrients'][3]['amount']; ?>>
                        <input type="hidden" name="fats3" id="fats3" value=<?= $meals[2]['nutrition']['nutrients'][2]['amount']; ?>>
                        <button class="add">Add</button>
                    </form>
                </div>
            </div>

            <button id="refreshButton">Refresh</button>
        </div>
    </div>

    <script src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/recomendation/meals.js"></script>

</body>

</html>