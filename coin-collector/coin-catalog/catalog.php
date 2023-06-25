<!DOCTYPE html>
<html>
<head>
    <title>Coin Catalog</title>
</head>
<body>
    <h2>Coin Catalog</h2>

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
      while($row = $result->fetch_assoc()) {
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>Country: " . $row["country"] . "</p>";
        echo "<p>Year: " . $row["year"] . "</p>";
        echo "<p>Value: " . $row["value"] . "</p>";
        echo "<p><img src='" . $row["image_front"] . "' alt='Image Front'></p>";
        echo "<p><img src='" . $row["image_back"] . "' alt='Image Back'></p>";
      }
    } else {
      echo "No coins found";
    }

    $conn->close();
    ?>
</body>
</html>