<?php

function getMeal($maxCarbs, $maxCalories, $maxProtien, $maxFat)
{
    $endpoint = 'https://api.spoonacular.com/recipes/findByNutrients';

    $params = array(
        'apiKey' => '29253a411e424ef3a1ab3f15779cd62f',
        'maxCarbs' => $maxCarbs,
        'maxCalories' => $maxCalories,
        'maxProtein' => $maxProtien,
        'maxFat' => $maxFat,
    );

    $url = $endpoint . '?' . http_build_query($params);

    print_r($url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);


    $response = curl_exec($ch);

    $json = json_decode($response, true);

    return $json;
}