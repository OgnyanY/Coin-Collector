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

  $sql = "SELECT name, country, year, value, image_front, image_back FROM Coins WHERE name LIKE ?";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $name);

  // Execute the statement
  $stmt->execute();

  // Bind the result to variables
  $stmt->bind_result($name, $country, $year, $value, $image_front, $image_back);

  // Fetch the result
  while ($stmt->fetch()) {
    echo "<h3>" . $name . "</h3>";
    echo "<p>Country: " . $country . "</p>";
    echo "<p>Year: " . $year . "</p>";
    echo "<p>Value: " . $value . "</p>";
    echo "<p><img src='" . $image_front . "' alt='Image Front'></p>";
    echo "<p><img src='" . $image_back . "' alt='Image Back'></p>";
  }

  $stmt->close();
}

$conn->close();
?>
