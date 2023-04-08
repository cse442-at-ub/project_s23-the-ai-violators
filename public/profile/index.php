<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/');
    exit();
}

require __DIR__ . "../../../config/database.php";

$userInfo = getUserInfo($_SESSION['user_name']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="profile_test.css">

</head>


<body>



    <nav class="navbar navbar-expand-lg bg-secondary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/image/carrot.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                nutr.io
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/">Content Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/">Track Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/">Logout</a>
                    </li>

                </ul>
                
            </div>
        </div>
    </nav>




    <div class="userIcon">
        <img src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/user.png" alt="">
    </div>



    <p class="fs-1">Your Profile
    <p>
    <p class="fs-4">Here's a look at you...
    <p>

    <div id="profileForm">
    </div>

    <div id="userName">
        <p> <?php echo $_SESSION['user_name'] ?> </p>
    </div>


    <div id="logout">
        <button id="logoutButton" type="button" onClick="window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login'; sessionStorage.removeItem('username')">Logout</button>
    </div>

    <div id="editProfile">
        <button id="submitButton" type="button" onClick="window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profileEdit/'">
            Edit Profile
        </button>
    </div>


    <div id="email">
        <p>chad69@gmail.com</p>
    </div>



    <div class="navbar">
        <a id="NUTRIO" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content">
            <div>
                <img id="carrot" src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/image/carrot.png" alt="">
                <p id="logoName">nutr.io</p>
            </div>
        </a>
        <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/">Profile
            Page</a>
        <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/">Track Page</a>
        <a href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/">Logout</a>
        <div>

            <div id="username">
                <p> <?php echo $_SESSION['user_name'] ?> </p>
            </div>

        </div>

    </div>



    <div id="sex">
        <p>Sex:</p>
    </div>

    <div id="sexDisplay">
        <p> <?php echo $userInfo[4] ?> </p>
    </div>


    <div id="height">
        <p>Height:</p>
    </div>

    <div id="heightDisplay">
        <p> <?php echo $userInfo[1] ?> </p>
    </div>

    <div id="weight">
        <p>Weight:</p>
    </div>

    <div id="weightDisplay">
        <p> <?php echo $userInfo[2] ?> </p>
    </div>


    <div id="curgoal">
        <p>Current Goal:</p>
    </div>

    <div id="goalDisplay">
        <p> <?php echo $userInfo[10] ?> </p>
    </div>

    <div id="macro">
        <p>Focus Macro:</p>
    </div>

    <div id="macroDisplay">
        <p> <?php echo $userInfo[11] ?> </p>
    </div>

    <div id="calgoal">
        <p>Current Calorie Goal:</p>
    </div>

    <div id="calDisplay">
        <p> <?php echo $userInfo[6] ?> </p>
    </div>

    <div id="restrict">
        <p>Restrictions:</p>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>




</html>