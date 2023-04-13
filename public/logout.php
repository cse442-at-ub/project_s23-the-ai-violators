<?php
function logout() {
    session_start();
    session_destroy();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    logout();
}
?>
