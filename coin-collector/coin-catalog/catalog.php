<!DOCTYPE html>
<html>

<head>
  <title>Coin Catalog</title>
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div class="navbar">
    <div class="menu">
      <a id="exit" href="../registration-login/login.html">Exit</a>
    </div>
    <div>
      <a href="add_coin.html">Add to Catalog</a>
      <a href="../collection-management/view_collections.php">View Collections</a>
      <a href="../exchange-management/exchanges.php">View Exchanges</a>
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

  <script>
    $(document).ready(function () {
      // Function to fetch coins
      function fetchCoins(name = '') {
        $.ajax({
          url: 'fetch_coins.php',
          type: 'post',
          data: { name: name },
          success: function (response) {
            $('#coins').html(response);
          }
        });
      }

      // Fetch all coins when the page loads
      fetchCoins();

      // Fetch coins when the search button is clicked
      $('#search').click(function () {
        var name = $('#name').val();
        fetchCoins(name);
      });
    });
  </script>
</body>


</html>