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
  $collection_id = $_POST["collection_id"];

  $sql = "UPDATE Collections SET is_archived = TRUE WHERE id = ?";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $collection_id);

  // Execute the statement
  if ($stmt->execute()) {
    echo "Collection archived successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>
