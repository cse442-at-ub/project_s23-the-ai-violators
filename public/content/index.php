<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/');
    exit();
}

require __DIR__ . "../../../config/database.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/mainpage.css">
    <link rel="stylesheet" href="mainpage.css">
    <title>content</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
</head>

<body>

    <div class="navbar">
        <div><img id="carrot" src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/image/carrot.png" alt="">
            <p id="logoName">nutr.io</p>
        </div>
        <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/">Profile
            Page</a>
        <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/">Track Page</a>
        <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/">Logout</a>
        <div>

            <div id="username">%Cusername%</div>

        </div>

    </div>

    <div class="mainContent">

        <div class="stats">
            <div class="protienProgress">
                <div class="inner carbsProgress">
                    <div class="inner fatsProgress">
                        <div class="inner inner-2">
                            <div>
                                Calories: <br />
                                <span id="cals"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="macros">
                <ul>
                    <li class="macroListItem">
                        <div class="macroHolder">
                            <span class="macsName">Protein:</span> <span class="macs" id="protien"><?php </span>
                        </div>
                    </li>
                    <li class="macroListItem">
                        <div class="macroHolder">
                            <span class="macsName">Carbs:</span> <span class="macs" id="carbs">%carbs%</span>
                        </div>
                    </li>
                    <li class="macroListItem">
                        <div class="macroHolder">
                            <span class="macsName">Fats:</span> <span class="macs" id="fats">%fats%</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="historyContainer">
            <div class="history">
                Meal History
            </div>

            <div>

                <table class="GeneratedTable">
                    <thead>
                        <tr>
                            <th>Food</th>
                            <th>Protein</th>
                            <th>Carbs</th>
                            <th>Fats</th>
                            <th>Calories</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>Cum</td>
                            <td><?php echo getDailyCalories($_SESSION['user_name'], date("y-m-d"))[0] ?> </td>
                            <td><?php echo getDailyCalories($_SESSION['user_name'], date("y-m-d"))[1] ?> </td>
                            <td><?php echo getDailyCalories($_SESSION['user_name'], date("y-m-d"))[2] ?> </td>
                            <td><?php echo getDailyCalories($_SESSION['user_name'], date("y-m-d"))[3] ?> </td>
                        </tr> -->


                        <?php
                        $output = "";
                        $meals = getDailyCalories($_SESSION['user_name'], date("y-m-d"));
                        for ($i=0; $i<count($meals); $i++) {
                            $meal = $meals[$i];
                            $output .= "<tr><td> piss </td>";
                            $output .= "<td>" . $meal[0] .  "</td>";
                            $output .= "<td>" . $meal[1] .  "</td>";
                            $output .= "<td>" . $meal[2] .  "</td>";
                            $output .= "<td>" . $meal[3] .  "</td></tr>";
                        }

                        echo $output;
                        ?>

                    </tbody>

            </div>
            </table>


        </div>
    </div>
    </div>



    <script src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/mainpage.js"></script>
    <script src="mainpage.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>


</html>