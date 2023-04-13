<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/');
    exit();
}

require __DIR__ . "../../../config/database.php";

$userInfo = getUserInfo($_SESSION['user_name']);
$userRestrictions = getRestrictions($_SESSION['user_name']);

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



    <?php include "../../templates/navbar.php" ?>

    <p class="fs-1">Your Profile
    <p>
    <p class="fs-4">Here's a look at you...
    <p>


    <div class=".col6">
        <div>
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <p class="fs-3"><?php echo $_SESSION['user_name'] ?></p>
                    <img src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/user.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                        <p class="text-secondary mb-1">timmy2time@gmail.com</p>
                        <button class="btn btn-primary" onClick="window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login'; sessionStorage.removeItem('username')">Logout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=".col6">
        <div class="card mb-3">
            <div class="card-body align-items-center text-center">
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-0">Sex:</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <?php echo $userInfo[4] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-0">Height:</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <?php echo $userInfo[1] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-0">Weight:</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <?php echo $userInfo[2] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-0">Current Goal:</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <?php echo $userInfo[10] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-0">Focus Macro:</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <?php echo $userInfo[11] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-0">Current Calorie Goal:</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <?php echo $userInfo[6] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="mb-0">Restrictions:</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <?php
                        $out = "";
                        for ($i = 0; $i < count($userRestrictions); $i++) {
                            $out .= $userRestrictions[$i] . ", ";
                        }
                        echo $out;
                        ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" onClick="window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profileEdit'">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>




</html>