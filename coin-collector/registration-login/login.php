<?php
session_start(); // start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT id FROM Users WHERE username = ? AND password = ?";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);

  // Execute the statement
  $stmt->execute();

  // Bind the result to a variable
  $stmt->bind_result($id);

  // Fetch the result
  if ($stmt->fetch()) {
    $_SESSION['user_id'] = $id; // set the user_id session variable
    header("Location: ../main.html");  // redirect to main page
    exit;
  } else {
    echo "Invalid username or password";
  }

  $stmt->close();
}

$conn->close();
?>
