<?php
session_start();
$_SESSION = array();
session_destroy();


header("X-Redirect-URL: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/");
echo json_encode(['redirect' => true]);
exit();