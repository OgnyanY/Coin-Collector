<!DOCTYPE html>
<html>

<head>
  <title>Statistics</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <div class="navbar">
    <div class="menu">
      <a id="exit" href="../registration-login/login.html">Exit</a>
      <?php
      $username = include '../shared-files/fetch_username.php';
      echo "<p class='logged_as'>Logged in as: " . $username . "</p>"; // display the username
      ?>
    </div>

    <div>
      <a href="../coin-catalog/add_coin_page.php">Add to Catalog</a>
      <a href="../collection-management/view_collections.php">Collections</a>
      <a href="../exchange-management/exchanges.php">Exchanges</a>
      <a href="statistics.php">Statistics</a>
    </div>

    <div id="logo">
      <h2><a href="../coin-catalog/catalog.php">Coin catalog</a></h2>
    </div>
  </div>

  <h2>Statistics</h2>

  <div class="php_generated">

    <?php

    include '../shared-files/db_config.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Number of coins
    echo "<div class='coin_row'>";
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
    echo "</div>";
    $conn->close();
    ?>

  </div>
</body>

</html>