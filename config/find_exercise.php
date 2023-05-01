<?php
require __dir__ . '/database.php';


/** 
 * Get a list of excercises based on the users current fitness goal 
 * @param string $user_name The username of the user
 * @param int $number Optional, defauts to 5; The number of excercises to return
 * @return json a json object containing the meals
 */
function getExcercise($user_name)
{
    

    $userInfo = getUserInfo($user_name);

    if ($userInfo[10] = "CUT"){
        $type = 'cardio';
        $api_url = 'https://api.api-ninjas.com/v1/exercises?type=' . $type;
        $api_key = 'nVXNJKB20TItJlyh6IewAA==Nv8RebMKasOV9MWF';
    }

    
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => $api_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'X-Api-Key: ' . $api_key
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo 'cURL Error #:' . $err;
    } else {
        $json = json_decode($response, true); // Decode the JSON response into an associative array
        return $json['results'];
    }
}