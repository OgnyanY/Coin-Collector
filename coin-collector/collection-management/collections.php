<!DOCTYPE html>
<html>

<head>
  <title>Collections</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <div class="navbar">
    <div class="menu">
      <a href="../main.html">Home</a>
      <a href="../registration-login/logout.php">Exit</a>
    </div>
    <div id="logo">
      <h2>Coin catalog</h2>
    </div>
  </div>

  <h2>Collections</h2>

  <div class="php_generated">

    <?php
    session_start(); // start the session

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

    // Fetch collections of the currently logged-in user
    $sql = "SELECT name FROM Collections WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['user_id']); // use the id of the currently logged-in user
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<div class='coin_row'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "</div>";
      }
    } else {
      echo "No collections found";
    }

    $stmt->close();
    $conn->close();
    ?>

  </div>
</body>

</html>
