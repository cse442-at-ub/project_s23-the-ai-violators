<?php
require __dir__ . '/database.php';


/** 
 * Get a list of meals based on the users remaining macros for the day
 * @param string $user_name The username of the user
 * @param int $number Optional, defauts to 5; The number of meals to return
 * @return json a json object containing the meals
 */
function getMeal($user_name, $number = 5)
{
    $endpoint = 'https://api.spoonacular.com/recipes/findByNutrients';

    $macros = getMacroGoals($user_name);
    $cals = getCalorieGoals($user_name);

    $dailyMacros = getDailyCalories($user_name, date("y-m-d"));

    $todaysCarbs = 0;
    $todaysCals = 0;
    $todaysProtien = 0;
    $todaysFat = 0;

    foreach ($dailyMacros as $macro) {
        $todaysCarbs += $macro[2];
        $todaysCals += $macro[0];
        $todaysProtien += $macro[1];
        $todaysFat += $macro[3];
    }

    $carbsLeft = $macros[1] - $todaysCarbs;
    $calsLeft = $cals - $todaysCals;
    $protienLeft = $macros[0] - $todaysProtien;
    $fatLeft = $macros[2] - $todaysFat;

    $params = array(
        'apiKey' => '29253a411e424ef3a1ab3f15779cd62f',
        'maxCarbs' => $carbsLeft,
        'maxCalories' => $calsLeft,
        'maxProtein' => $protienLeft,
        'maxFat' => $fatLeft,
        'number' => $number,
        'random' => true
    );

    $url = $endpoint . '?' . http_build_query($params);

    print_r($url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);


    $response = curl_exec($ch);

    $json = json_decode($response, true);

    return $json;
}

// getMeal("chad");