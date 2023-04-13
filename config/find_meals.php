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

    $remainingMacros = getRemainingMacros($user_name);

    $params = array(
        'apiKey' => '29253a411e424ef3a1ab3f15779cd62f',
        'maxCarbs' => $remainingMacros[1],
        'maxCalories' => $remainingMacros[0],
        'maxProtein' => $remainingMacros[2],
        'maxFat' => $remainingMacros[3],
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

getMeal("chad");