<!DOCTYPE html>
<html>

<head>
  <title>Exchanges</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
<div class="navbar">
    <div class="menu">
      <a href="../main.html">Home</a>
      <a href="../registration-login/login.html">Exit</a>
    </div>
    <div id="logo">
      <h2>Coin catalog</h2>
    </div>
  </div>

  <h2>Exchanges</h2>

  <div class="php_generated">

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test"; // replace with your database name
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT Users.username, Coins.name, Exchanges.type FROM Exchanges JOIN Users ON Exchanges.user_id = Users.id JOIN Coins ON Exchanges.coin_id = Coins.id";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<div class='coin_row'>";
      echo "<h3>" . $row["username"] . " - " . $row["type"] . " - " . $row["name"] . "</h3>";
      echo "</div>";
    }
  } else {
    echo "No exchanges found";
  }

  $conn->close();
  ?>

  </div>
</body>

</html>