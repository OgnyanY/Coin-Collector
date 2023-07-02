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

      //here do stuff with php:
      //var coinId = $(this).parent().data("coin-id"); // Get the coin's id
      //modal.data("coin-id", coinId); // Store the coin's id in the modal's data
    }
  }
  var closeButton = document.getElementById("close-modal-button");
  console.log(closeButton);
  closeButton.addEventListener("click", function () {
    console.log("test");
    document.getElementById("myModal").classList.remove("show");
  });
});
