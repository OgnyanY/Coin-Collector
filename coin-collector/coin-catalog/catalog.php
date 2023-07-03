<!DOCTYPE html>
<html>

<head>
  <title>Coin Catalog</title>
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="catalog.js"></script>
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
      <form action="export.php" method="post">
        <input type="submit" value="Export" />
      </form>
      <form action="import.php" method="post" enctype="multipart/form-data">
        <input type="file" name="csv" accept=".csv" />
        <input type="submit" value="Import" />
      </form>

    </div>
    <div id="logo">
      <h2><a href="catalog.php">Coin catalog</a></h2>
    </div>
  </div>

  <div class="search_bar">
    <input type="text" id="name" name="name" required />
    <input type="submit" value="Search" id="search" />
  </div>

  <div id="coins" class="php_generated">
    <!-- Coins will be inserted here by JavaScript -->
  </div>

  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <button id="close-modal-button" class="close">&times;</button>
      <p>Select a collection for the coin to be added in:</p>
      <select id="collectionSelect">
        <!-- Options will be filled by JavaScript -->
      </select>
      <button id="submitCollection">Submit</button>
    </div>
  </div>

</body>


</html>