<?php
session_start();

require __DIR__ . '/../../config/database.php';

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/');
    exit();
}

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
    <link rel="stylesheet" href="profileEdit_test.css">
</head>


<body>
    <form method="POST" action="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profileEdit/editIntake.php">


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
                    <ul class="navbar-nav m-auto ">
                        <li class="nav-item">
                            <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/">Content Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/">Track Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/" onclick="sessionStorage.removeItem('username')">Logout</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>





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
                            <select name="sex">
                                <option value="" disabled>Select your sex...</option>
                                <option value="male" <?php if ($userInfo[3]=="MALE") echo "selected"?>>Male</option>
                                <option value="female" <?php if ($userInfo[3]=="FEMALE") echo "selected"?>>Female</option>
                                <option value="other">Other/Prefer Not To Say</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Height:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            <input type="number" value=<?php echo $userInfo[1] ?>  name="height" placeholder="Enter Your Height(In)" min="1" max="999" oninput="check()">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Weight:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            <input type="number" value=<?php echo $userInfo[2] ?> name="weight" placeholder="Enter Your Weight(lbs)" min="1" max="999" oninput="check()">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Current Goal:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            <select name="goal" id="goal">
                                <option value="" disabled>Select your goal...</option>
                                <option value="cut" <?php if ($userInfo[10]=="cut") echo "selected"?>>Lose Weight/Cut</option>
                                <option value="bulk"  <?php if ($userInfo[10]=="bulk") echo "selected"?>>Gain Weight/Bulk</option>
                                <option value="maintain"  <?php if ($userInfo[10]=="maintain") echo "selected"?>>Maintain</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Focus Macro:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            <select name="macros" id="goal">
                                <option value="" disabled>Select your macro...</option>
                                <option value="protien" <?php ?>>Proteins</option>
                                <option value="carb">Carbohydrates</option>
                                <option value="fat">Fats</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Current Calorie Goal:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            <input type="number" name="targetCAL" id="calorie" placeholder="Enter Your Goal" min="1" max="9999999" oninput="check()">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Restrictions:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            <input type="checkbox" id="lactose" name="lactose" <?php if (in_array("Lactose Intolerance", $userRestrictions)) echo "checked" ?>>
                            <label for="lactose">Lactose Intolerance</label>
                            <input type="checkbox" id="" name="gluten"  <?php if (in_array("Gluten Intolerance", $userRestrictions)) echo "checked" ?> >
                            <label for="gluten">Gluten Intolerance</label>
                            <input type="checkbox" id="vegetarian" name="vegetarian" <?php if (in_array("Vegetarian", $userRestrictions)) echo "checked" ?> >
                            <label for="vegetarian">Vegetarian</label>
                            <input type="checkbox" id="vegan" name="vegan" <?php if (in_array("Vegan", $userRestrictions)) echo "checked" ?>>
                            <label for="vegan">Vegan</label>
                            <input type="checkbox" id="kosher" name="kosher" <?php if (in_array("Kosher", $userRestrictions)) echo "checked" ?>>
                            <label for="kosher">Kosher</label>
                            <input type="checkbox" id="dairy" name="dairy" <?php if (in_array("Dairy Free", $userRestrictions)) echo "checked" ?>>
                            <label for="dairy">Dairy Free</label>
                            <input type="checkbox" id="peanuts" name="peanuts" <?php if (in_array("Peanut Allergy", $userRestrictions)) echo "checked" ?>>
                            <label for="peanuts">Peanut Allergy</label>
                            <input type="checkbox" id="fish" name="fish" <?php if (in_array("Fish/Shellfish Allergy", $userRestrictions)) echo "checked" ?>>
                            <label for="fish">Fish/Shellfish Allergy</label>
                            <input type="checkbox" id="wheat" name="wheat" <?php if (in_array("Wheat Allergy", $userRestrictions)) echo "checked" ?>>
                            <label for="wheat">Wheat Allergy</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" onClick="window.location.href='/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile'">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>


    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>