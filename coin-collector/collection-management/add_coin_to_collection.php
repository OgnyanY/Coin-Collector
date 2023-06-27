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
  $collection_id = $_POST["collection"];
  $coin_id = $_POST["coin"];

  $sql = "INSERT INTO Collection_Coins (collection_id, coin_id) VALUES (?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $collection_id, $coin_id);

  // Execute the statement
  if ($stmt->execute()) {
    echo "Coin added to collection successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>
