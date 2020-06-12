<?php
session_start();
require('config.php');

function sanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_SESSION['logged_in'])) {
//authenticated user request
    $_SESSION['logged_in'] = False;
    session_destroy();
    session_unset();
   header("Location: $login_url"); 
    exit();
}
    ?>