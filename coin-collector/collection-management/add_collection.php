<?php
session_start(); // start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'] ?? '';

  // Check if the name is not empty
  if ($name != '') {
    // Insert the new collection into the database
    $sql = "INSERT INTO Collections (name, user_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $name, $_SESSION['user_id']); // use the id of the currently logged-in user
    $stmt->execute();

    $stmt->close();
  }
}

$conn->close();
?>
