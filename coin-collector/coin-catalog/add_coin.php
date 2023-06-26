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
  $name = $_POST["name"];
  $country = $_POST["country"];
  $year = $_POST["year"];
  $value = $_POST["value"];
  $image_front = $_POST["image_front"];
  $image_back = $_POST["image_back"];

  $sql = "INSERT INTO Coins (name, country, year, value, image_front, image_back) VALUES (?, ?, ?, ?, ?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssidss", $name, $country, $year, $value, $image_front, $image_back);

  // Execute the statement
  if ($stmt->execute()) {
    echo "New coin added successfully";
    header("Location: ../successful.html");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>
