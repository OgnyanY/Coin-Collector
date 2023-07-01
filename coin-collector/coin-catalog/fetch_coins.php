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

$name = $_POST['name'] ?? '';

if ($name != '') {
  $sql = "SELECT name, country, year, value, image_front, image_back FROM Coins WHERE name LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $name);
} else {
  $sql = "SELECT name, country, year, value, image_front, image_back FROM Coins";
  $stmt = $conn->prepare($sql);
}

// Execute the statement
$stmt->execute();

// Bind the result to variables
$stmt->bind_result($name, $country, $year, $value, $image_front, $image_back);

// Fetch the result
while ($stmt->fetch()) {
  echo "<div class='coin_row'>";
  echo "<h3>" . $name . "</h3>";
  echo "<p>Country: " . $country . "</p>";
  echo "<p>Year: " . $year . "</p>";
  echo "<p>Value: " . $value . "</p>";
  echo "<div class='coin_images'><img src='" . $image_front . "' alt='Image Front'class='coin_image'>";
  echo "<img src='" . $image_back . "' alt='Image Back' class='coin_image'></div>";
  echo "</div>";
}

$stmt->close();
$conn->close();
?>
