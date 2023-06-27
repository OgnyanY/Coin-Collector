<!DOCTYPE html>
<html>

<head>
  <title>Coin Catalog</title>
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

  <div id="coins" class="php_generated">
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

    $sql = "SELECT name, country, year, value, image_front, image_back FROM Coins";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<div class='coin_row'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>Country: " . $row["country"] . "</p>";
        echo "<p>Year: " . $row["year"] . "</p>";
        echo "<p>Value: " . $row["value"] . "</p>";
        echo "<div class='coin_images'><img src='" . $row["image_front"] . "' alt='Image Front' class='coin_image'>";
        echo "<img src='" . $row["image_back"] . "' alt='Image Back' class='coin_image'></div>";
        echo "</div>";
      }
    } else {
      echo "No coins found";
    }

    $conn->close();
    ?>

  </div>
</body>

</html>