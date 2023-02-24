<?php
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();
header('location: sgin_in.php');
// print_r($_SESSION)

?>