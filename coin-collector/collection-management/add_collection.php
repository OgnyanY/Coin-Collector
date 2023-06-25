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
  $user_id = $_POST["user_id"];
  $name = $_POST["name"];

  $sql = "INSERT INTO Collections (user_id, name) VALUES (?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("is", $user_id, $name);

  // Execute the statement
  if ($stmt->execute()) {
    echo "New collection added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>
