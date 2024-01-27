<?php
session_start();
$_SESSION = array();
session_destroy();


header("X-Redirect-URL: /public/login/");
echo json_encode(['redirect' => true]);
exit();