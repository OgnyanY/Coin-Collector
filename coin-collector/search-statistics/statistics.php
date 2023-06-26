<!DOCTYPE html>
<html>

<head>
  <title>Statistics</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <div class="navbar">
    <a href="registration-login/login.html">Exit</a>
    <div id="logo">
      <h2>Coin catalog</h2>
    </div>
  </div>
  <h2>Statistics</h2>

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

  // Number of coins
  $sql = "SELECT COUNT(*) AS num_coins FROM Coins";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo "<p>Number of coins: " . $row["num_coins"] . "</p>";

  // Number of collections
  $sql = "SELECT COUNT(*) AS num_collections FROM Collections";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo "<p>Number of collections: " . $row["num_collections"] . "</p>";

  // Number of exchanges
  $sql = "SELECT COUNT(*) AS num_exchanges FROM Exchanges";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo "<p>Number of exchanges: " . $row["num_exchanges"] . "</p>";

  $conn->close();
  ?>
</body>

</html>