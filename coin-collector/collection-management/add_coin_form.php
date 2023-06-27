<!DOCTYPE html>
<html>

<head>
    <title>Add Coin to Collection</title>
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

    <h2>Add Coin to Collection</h2>

    <form action="add_coin_to_collection.php" method="post">
        <label for="collection">Collection:</label><br>
        <select id="collection" name="collection" required>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test"; // replace with your database name
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch collections from the database and add them as options
            $sql = "SELECT id, name FROM Collections";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </select><br>

        <label for="coin">Coin:</label><br>
        <select id="coin" name="coin" required>
            <?php
            // Fetch coins from the database and add them as options
            $sql = "SELECT id, name, value, year, country FROM Coins";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['value'] . " " . $row['name'] . ", " . $row['year'] . ", " . $row['country'] . "</option>";
            }
            $conn->close();
            ?>
        </select><br>

        <input type="submit" value="Add Coin">
    </form>
</body>

</html>