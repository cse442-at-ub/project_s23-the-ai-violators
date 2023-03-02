<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/':
        require __DIR__ . 'login.php';
        break;

    case '/signup':
        require __DIR__ . 'signup.php';
        break; case '':
    
    case '/historym':
        require __DIR__ . 'historym.php';
        break;

    case '/historyw':
        require __DIR__ . 'historyw.php';
        break;

    case '/login':
        require __DIR__ . 'login.php';
        break;
    
    case '/content':
        require __DIR__ . 'content.php';
        break;

    case '/recommendations':
        require __DIR__ . 'recommendations.php';
        break;
    
    case '/mealtrack':
        require __DIR__ . 'mealtrack.php';
        break;
    
    default:
        http_response_code(404);
        require __DIR__ . '404.php';
        break;
}