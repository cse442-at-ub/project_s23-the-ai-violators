<?php
require __dir__ . '/database.php';


/** 
 * Get a list of meals based on the users remaining macros for the day
 * @param string $user_name The username of the user
 * @param int $number Optional, defauts to 5; The number of meals to return
 * @return json a json object containing the meals
 */
function getMeal($user_name, $number = 3)
{
    $endpoint = 'https://api.spoonacular.com/recipes/complexSearch';

    $remainingMacros = getRemainingMacros($user_name);

    for ($i = 0; $i < count($remainingMacros); $i++) {
        if ($remainingMacros[$i] < 5) {
            $remainingMacros[$i] = 4;
        }
    }

    $params = array(
        'apiKey' => '4a9fc2eb8037493eb0eb80171d999ce9',
        'maxCarbs' => (int)$remainingMacros[1],
        'maxCalories' => (int)$remainingMacros[0],
        'maxProtein' => (int)$remainingMacros[2],
        'maxFat' => (int)$remainingMacros[3],
        'number' => $number,
        'sort' => 'random'
    );

    $url = $endpoint . '?' . http_build_query($params);


    $ch = curl_init();

    // Set the cURL options
    curl_setopt($ch, CURLOPT_URL, $url); // Set the URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
    curl_setopt($ch, CURLOPT_HEADER, false); // Exclude the header from the response

    // Execute the API call and get the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        // Process the API response
        $json = json_decode($response, true); // Decode the JSON response into an associative array
        return $json['results'];
    }
}
