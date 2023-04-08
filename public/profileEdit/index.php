<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/');
    exit();
}

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
    <form method="POST" action="editIntake.php">


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
                                <option value="" disabled selected>Select your sex...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
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
                            <input type="number" name="height" placeholder="Enter Your Height(In)" min="1" max="999" oninput="check()">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Weight:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            <input type="number" name="weight" placeholder="Enter Your Weight(lbs)" min="1" max="999" oninput="check()">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Current Goal:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            <select name="goal" id="goal">
                                <option value="" disabled selected>Select your goal...</option>
                                <option value="cut">Lose Weight/Cut</option>
                                <option value="bulk">Gain Weight/Bulk</option>
                                <option value="maintain">Maintain</option>
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
                                <option value="" disabled selected>Select your macro...</option>
                                <option value="protien">Proteins</option>
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
                            <input type="checkbox" id="lactose" name="lactose" checked>
                            <label for="lactose">Lactose Intolerance</label>
                            <input type="checkbox" id="" name="gluten" checked>
                            <label for="gluten">Gluten Intolerance</label>
                            <input type="checkbox" id="vegetarian" name="vegetarian" checked>
                            <label for="vegetarian">Vegetarian</label>
                            <input type="checkbox" id="vegan" name="vegan" checked>
                            <label for="vegan">Vegan</label>
                            <input type="checkbox" id="kosher" name="kosher" checked>
                            <label for="kosher">Kosher</label>
                            <input type="checkbox" id="dairy" name="dairy" checked>
                            <label for="dairy">Dairy Free</label>
                            <input type="checkbox" id="peanuts" name="peanuts" checked>
                            <label for="peanuts">Peanut Allergy</label>
                            <input type="checkbox" id="fish" name="fish" checked>
                            <label for="fish">Fish/Shellfish Allergy</label>
                            <input type="checkbox" id="wheat" name="wheat" checked>
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