<?php
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

  $sql = "INSERT INTO Users (username, password) VALUES (?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);

  // Execute the statement
  if ($stmt->execute()) {
    header("Location: login.html");  // redirect to login page
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>
