<!DOCTYPE html>
<html>
<head>
    <title>View Collections</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>View Collections</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";  // replace with your database name

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
      while($row = $result->fetch_assoc()) {
        echo "<h3>" . $row["name"] . "</h3>";

        // Fetch coins in the collection
        $sql2 = "SELECT Coins.name, Coins.country, Coins.year, Coins.value, Coins.image_front, Coins.image_back FROM Collection_Coins JOIN Coins ON Collection_Coins.coin_id = Coins.id WHERE Collection_Coins.collection_id = " . $row["id"];
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
          // Output data of each row
          while($row2 = $result2->fetch_assoc()) {
            echo "<p>" . $row2["name"] . " (" . $row2["country"] . ", " . $row2["year"] . ") - " . $row2["value"] . "</p>";
            echo "<img src='" . $row2["image_front"] . "' alt='Image front'>";
            echo "<img src='" . $row2["image_back"] . "' alt='Image back'>";
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
</body>
</html>