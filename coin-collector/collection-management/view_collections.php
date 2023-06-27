<!DOCTYPE html>
<html>

<head>
  <title>View Collections</title>
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

  <h2>View Collections</h2>

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

    // Fetch collections
    $sql = "SELECT id, name FROM Collections";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<h3 style='border-top: 3px solid black;'>" . $row["name"] . "</h3>";

        // Fetch coins in the collection
        $sql2 = "SELECT Coins.name, Coins.country, Coins.year, Coins.value, Coins.image_front, Coins.image_back FROM Collection_Coins JOIN Coins ON Collection_Coins.coin_id = Coins.id WHERE Collection_Coins.collection_id = " . $row["id"];
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
          // Output data of each row
          while ($row2 = $result2->fetch_assoc()) {
            echo "<div class='coin_row'>";
            echo "<p>" . $row2["name"] . " (" . $row2["country"] . ", " . $row2["year"] . ") - " . $row2["value"] . "</p>";
            echo "<div class='coin_images'><img src='" . $row2["image_front"] . "' alt='Image Front' class='coin_image'>";
            echo "<img src='" . $row2["image_back"] . "' alt='Image Back' class='coin_image'></div>";
            echo "</div>";
          }
        } else {
          echo "<p>No coins in this collection</p>";
        }
      }
    } else {
      echo "<p>No collections found</p>";
    }

    $conn->close();
    ?>
  </div>
</body>

</html>