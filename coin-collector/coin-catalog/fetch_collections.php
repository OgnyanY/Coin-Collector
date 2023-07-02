<?php
session_start(); // start the session

include '../shared-files/db_config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch collections of the currently logged-in user
$sql = "SELECT id, name FROM Collections WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']); // use the id of the currently logged-in user
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // Output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
  }
}

$stmt->close();
$conn->close();
?>