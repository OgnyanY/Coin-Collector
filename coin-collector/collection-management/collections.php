<!DOCTYPE html>
<html>

<head>
  <title>Collections</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <div class="navbar">
    <div class="menu">
      <a href="../registration-login/login.html">Exit</a>
      <a href="../main.html">Home</a>
    </div>
    <div id="logo">
      <h2>Coin catalog</h2>
    </div>
  </div>

  <h2>Collections</h2>

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

  $sql = "SELECT Users.username, Collections.name FROM Collections JOIN Users ON Collections.user_id = Users.id";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<h3>" . $row["name"] . "</h3>";
      echo "<p>Owned by: " . $row["username"] . "</p>";
    }
  } else {
    echo "No collections found";
  }

  $conn->close();
  ?>
</body>

</html>