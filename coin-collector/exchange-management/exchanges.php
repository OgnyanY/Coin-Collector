<!DOCTYPE html>
<html>

<head>
  <title>Exchanges</title>
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
      <a href="exchanges.php">Exchanges</a>
      <a href="../search-statistics/statistics.php">Statistics</a>
    </div>

    <div id="logo">
      <h2><a href="../coin-catalog/catalog.php">Coin catalog</a></h2>
    </div>
  </div>

  <h2>Exchanges</h2>

  <div class="php_generated">

    <?php
    
    include '../shared-files/db_config.php';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT Users.username, Coins.name, Coins.country, Coins.year, Coins.value, Coins.image_front, Coins.image_back, Exchanges.type FROM Exchanges JOIN Users ON Exchanges.user_id = Users.id JOIN Coins ON Exchanges.coin_id = Coins.id";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<div class='coin_row'>";
        echo "<h3>" . $row["name"] . " (" . $row["country"] . ", " . $row["year"] . ") - " . $row["value"] . "</h3>";
        echo "<div class='coin_images'><img src='" . $row["image_front"] . "' alt='Image Front' class='coin_image'>";
        echo "<img src='" . $row["image_back"] . "' alt='Image Back' class='coin_image'></div>";
        echo "<p>" . $row["type"] . "</p>";
        echo "<p>" . $row["username"] . "</p>";
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