$(document).ready(function() {
    $("#addCollection").click(function() {
      var name = $("#name").val();
  
      // Check if the name is not empty
      if (name != '') {
        $.ajax({
          url: "add_collection.php",
          type: "post",
          data: { name: name },
          success: function(response) {
            // Reload the page
            location.reload();
          }
        });
      }
    });
  });