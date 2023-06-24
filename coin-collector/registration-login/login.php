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
  $username = $_POST["username"];
  $password = $_POST["password"];  // plain text password

  $sql = "SELECT password FROM Users WHERE username = ?";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);

  // Execute the statement
  $stmt->execute();

  // Bind the result to a variable
  $stmt->bind_result($hashed_password);

  // Fetch the result
  $stmt->fetch();

  // Verify the password
  if (password_verify($password, $hashed_password)) {
    echo "Login successful";
  } else {
    echo "Invalid username or password";
  }

  $stmt->close();
}

$conn->close();
?>
