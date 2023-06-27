<!DOCTYPE html>
<html>

<head>
  <title>Archived Collections</title>
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

  <h2>Archived Collections</h2>
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

    $sql = "SELECT Users.username, Collections.name FROM Collections JOIN Users ON Collections.user_id = Users.id WHERE Collections.is_archived = TRUE";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<div class='coin_row'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>Owned by: " . $row["username"] . "</p>";
        echo "</div>";
      }
    } else {
      echo "No archived collections found";
    }

    $conn->close();
    ?>

  </div>
</body>

</html>