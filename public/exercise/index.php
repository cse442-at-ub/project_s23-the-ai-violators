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

            <div id="content">
                <div class="exerciseRecs">
                    <h2>Bench Press ENDURANCE </h2>
                    <p>The simple yet effective bench press, can be used to build muscle mass but when done using higher reps and lower weights, it is a great way to build definition during a cut. Start with a weight you can get to 15 reps with and do a set of 5, the split being 15 12 10 8 6, increasing the weight slightly each time. This exercise is all about the burn, not lifting the heaviest weight, remember that and you'll be shredded in no time.
                    </p>

                </div>
                <div class="exerciseRecs">
                    <h2>Classic Burpees</h2>
                    <p>This dreaded exercise of everyone’s high school sports conditioning is actually a fantastic way to burn calories and burn body fat for a cut. Do 5 sets of this simple exercise till failure and you should be feeling the burn all over your body. Dont worry, that exactly what were looking for! Keep this up and you're sure to see some progress in both body fat loss and cardio improvement.</p>

                </div>
                <div class="exerciseRecs">
                    <h2>Incline Treadmill</h2>
                    <p> Sometimes the best way to burn fat and calories is to just get running! Hop on a treadmill with an incline feature and try to get a mile. Work at your own pace, if you cant do this then no worries just run until you cant anymore and if a mile is too easy try getting two or three. Eventually you’ll be able to run further than you ever thought you could, and your body will begin to reflect this as well. </p>

                </div>
                <div class="exerciseRecs">
                    <h2>Ab Circuit</h2>
                    <p> This one can get tough, so adjust the values accordingly to your activity level. Grab a kettle bell of an easy-moderate weight and use it in the following exercises. Do crunches, russian twists, in and outs, leg raises, flutter kicks, and standing side crunches for 45 seconds each and have a 15 second break in between. This one should have your abs on fire and is a great way to build definition in the area and burn some fat in the process. </p>

                </div>
             
                <div class="exerciseRecs">
                    <h2>Dumbbell Curls ENDURANCE </h2>
                    <p> Simple dumbbell curls modified to focus more on definition rather than muscle mass. Grab yourself a set of dumbbells you can curl for 15 reps and do five sets, the split being 15 12 10 8 8. Go as fast as you can while maintaining proper form, you want this exercise to burn to really focus on definition. Dont be afraid to drop the weight if you can’t hit the numbers, ego wont help with cutting exercises its all about the burn! </p>

                </div>
                <div class="exerciseRecs">
                    <h2>Squat Jumps Unweighted</h2>
                    <p> This exercise not only burns fat and calories due to all of the motion but also strengthens and defines almost every part of the legs. Do 5 sets of these to failure, and you should be feeling your glutes and thighs on fire by around the second set, although keep going! This one will pay off big time in the future.  </p>

                </div>
                <div class="exerciseRecs">
                    <h2>Cable Pull-downs ENDURANCE</h2>
                    <p> Building a big back comes with heavy usage of the pull-down machine, and toning one requires the same, just with some subtle changes. Choose a starting weight that you can do 15 reps pf and do 5 sets of pull-downs with the split being 15 13 11 8 8, raising the weight ever so slightly each time. Keep a wide grip and make sure to be activating your lats coming down and back up, and you should see some cuts on your back if you stick with this for a long time. </p>

                </div>
                <div class="exerciseRecs">
                    <h2>Stairmaster</h2>
                    <p> If you have access to a gym with a stair master, go get on it! Not only will your calves become rocks after a while, a lot of gym-goers view this as the king of cardio. Walk on the stairmaster until you cant anymore and call it a day, keep doing this each cardio session and the amount of calories and fat you burn will only increase with each session. </p>

                </div>
                <div class="exerciseRecs">
                    <h2>Seated Military Press ENDURANCE</h2>
                    <p> Working towards a good physique isn’t being done 100 percent right if you're leaving out your shoulders. Sure having boulder shoulders is nice for powerlifting, but if getting them shredded for a cut is your goal, then give the endurance version a shot. Start with a weight you can do for 12 reps and do 5 sets, the split being 12 10 10 8 8. Dont go too heavy on this, the goal is the burn as always with a cutting exercise, if you cant hit the numbers drop the weight.  </p>

                </div>
                <div class="exerciseRecs">
                    <h2>Classic Pushups</h2>
                    <p> In the world of bench press PR’s and new machines popping up everywhere, the classic and simple pushup is becoming a criminally underrated exercise, especially when on a cut. This one really depends on your own personal abilities, but a good place to start is to try and get 20 pushups for 5 sets, making a total of 100 reps. This will have all of your uppers burning and if you stick with it, the definition in your chest area should skyrocket.  </p>

                </div>
            </div>

            <button id="refreshButton">Show More</button>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>

</html>