<?php
session_start(); // start the session

include 'db_config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch username of the currently logged-in user
$sql = "SELECT username FROM Users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']); // use the id of the currently logged-in user
$stmt->execute();
$stmt->bind_result($username); // bind the result to $username
$stmt->fetch(); // fetch the result

$stmt->close();
$conn->close();

return $username; // return the username
?>