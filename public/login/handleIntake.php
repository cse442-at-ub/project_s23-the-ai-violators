<?php
session_start();

require __DIR__ . '/../../config/database.php';


$user_name = $_POST['username'];
$password_hash = $_POST['password'];

if (checkLogin($user_name, $password_hash)) {
    $_SESSION['user_name'] = $user_name;
    if (checkInitalLogin($user_name)) {
        echo 0;
    } else {
        echo 1;
    }
} else {
    echo 2;
}
