<!DOCTYPE html>
<html>

<head>
  <title>Add Coin</title>
  <link rel="stylesheet" href="../css/styles.css" />
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
      <a href="add_coin_page.php">Add to Catalog</a>
      <a href="../collection-management/view_collections.php">Collections</a>
      <a href="../exchange-management/exchanges.php">Exchanges</a>
      <a href="../search-statistics/statistics.php">Statistics</a>
    </div>

    <div id="logo">
      <h2><a href="catalog.php">Coin catalog</a></h2>
    </div>
  </div>

  <h2>Add a New Coin</h2>

  <form action="add_coin.php" method="post">
    <label for="name">Coin Name:</label><br />
    <input id="input" type="text" id="name" name="name" required /><br />

    <label for="country">Country:</label><br />
    <input id="input" type="text" id="country" name="country" required /><br />

    <label for="year">Year:</label><br />
    <input id="input" type="number" id="year" name="year" required /><br />

    <label for="value">Value:</label><br />
    <input id="input" type="number" step="0.01" id="value" name="value" required /><br />

    <label for="image_front">Image Front (URL):</label><br />
    <input id="input" type="text" id="image_front" name="image_front" /><br />

    <label for="image_back">Image Back (URL):</label><br />
    <input id="input" type="text" id="image_back" name="image_back" /><br />

    <input type="submit" value="Add Coin" />
  </form>
</body>

</html>