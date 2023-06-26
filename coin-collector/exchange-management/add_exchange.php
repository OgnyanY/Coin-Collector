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
  $coin_id = $_POST["coin_id"];
  $type = $_POST["type"];

  $sql = "INSERT INTO Exchanges (user_id, coin_id, type) VALUES (?, ?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iis", $user_id, $coin_id, $type);

  // Execute the statement
  if ($stmt->execute()) {
    echo "New exchange added successfully";
    header("Location: ../successful.html");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>
