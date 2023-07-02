<?php
session_start(); // start the session

unset($_SESSION['user_id']); // unset the user_id session variable

session_destroy(); // destroy the session

header("Location: login.html"); // redirect to login page
exit;
?>