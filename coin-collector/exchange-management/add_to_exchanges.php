<?php
session_start();

include '../shared-files/db_config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$coinId = $_POST['coin_id'];
$exchangeType = $_POST['type'];
$userId = $_SESSION['user_id'];

// Check if the coin is already in the Exchanges table
$sql = "SELECT * FROM Exchanges WHERE coin_id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $coinId, $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // If the coin is already in the Exchanges table, update its type
  $sql = "UPDATE Exchanges SET type = ? WHERE coin_id = ? AND user_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sii", $exchangeType, $coinId, $userId);
} else {
  // If the coin is not in the Exchanges table, insert it
  $sql = "INSERT INTO Exchanges (coin_id, user_id, type) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iis", $coinId, $userId, $exchangeType);
}

$stmt->execute();

$stmt->close();
$conn->close();
?>
