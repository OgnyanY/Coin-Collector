$(document).ready(function () {
  // Function to fetch coins
  function fetchCoins(name = "") {
    $.ajax({
      url: "fetch_coins.php",
      type: "post",
      data: { name: name },
      success: function (response) {
        $("#coins").html(response);
        var container = document.getElementById("coins");
        // Add click event to add button after fetching coins
        container.addEventListener("click", handleClick);
      },
    });
  }

  // Fetch all coins when the page loads
  fetchCoins();

  // Fetch coins when the search button is clicked
  $("#search").click(function () {
    var name = $("#name").val();
    fetchCoins(name);
  });

  // Function to add click event to add button
  function handleClick(event) {
    if (event.target.nodeName === "BUTTON") {
      const modal = document.getElementById("myModal");
      modal.classList.add("show"); //show modal

      // Fetch collections of the current user
      $.ajax({
        url: "fetch_collections.php",
        type: "post",
        success: function (response) {
          $("#collectionSelect").html(response); // populate the dropdown menu with the fetched collections
        },
      });

      var coinId = $(event.target).parent().data("coin-id"); // Get the coin's id
      modal.dataset.coinId = coinId; // Store the coin's id in the modal's data
    }
  }

  // Add event listener to the "Submit" button in the modal
  $("#submitCollection").click(function () {
    var collectionId = $("#collectionSelect").val(); // Get the id of the selected collection
    var coinId = $("#myModal")[0].dataset.coinId; // Get the id of the coin to be added to the collection

    // Send a request to add the coin to the collection
    $.ajax({
      url: "add_coin_to_collection.php",
      type: "post",
      data: { collection_id: collectionId, coin_id: coinId },
      success: function (response) {
        document.getElementById("myModal").classList.remove("show"); // close the modal
      },
    });
  });
});
