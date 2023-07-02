$(document).ready(function () {
  $("#addCollection").click(function () {
    var name = $("#name").val();

    // Check if the name is not empty
    if (name != "") {
      $.ajax({
        url: "add_collection.php",
        type: "post",
        data: { name: name },
        success: function (response) {
          // Reload the page
          location.reload();
        },
      });
    }
  });

  // Function to handle exchange type change
  $(".exchange_menu").change(function () {
    var coinId = $(this).parent().data("coin-id");
    var type = $(this).val();
    console.log("Coin ID: " + coinId);
    console.log("Type: " + type);

    if (type !== 'none') {
      $.ajax({
        url: "../exchange-management/add_to_exchanges.php",
        type: "post",
        data: { coin_id: coinId, type: type },
        success: function (response) {
          console.log("Response: " + response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
      });
    }
  });
});
