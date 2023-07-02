<?php
session_start(); // start the session

include '../shared-files/db_config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$collectionId = $_POST['collection_id'];
$coinId = $_POST['coin_id'];

// Add the coin to the collection
$sql = "INSERT INTO Collection_Coins (collection_id, coin_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $collectionId, $coinId);
$stmt->execute();

$stmt->close();
$conn->close();
?>