$(document).ready(function() {
  for (i = new Date().getFullYear(); i > 1900; i--) {
    $("#birth-year").append(
      $("<option />")
        .val(i)
        .html(i)
    );
  }
  $("#send").on("click", function(event) {
    event.preventDefault();
    let name = $("#name").val();

    let birth_year = $("#birth-year").val();
    // $("form").trigger("reset");
    if (name == "") {
      $("#result").html("");
      $("#error").text("Please insert you name");
      $("#error").css({ display: "block", color: "red" });
    } else {
      $("#error").css({ display: "none" });
      function funcSuccess(data) {
        data = JSON.parse(data);
        if (data.old >= 21) {
          $("#result").html(`Hello, ${data.name}, access accepted`);
        } else {
          $("#result").html(`Sorry, ${data.name}, no entrance until 21`);
        }
      }
      function funcBefore() {
        $("#result").text("Loading...");
      }
      $.ajax({
        url: "access.php",
        type: "GET",
        data: {
          name: name,
          birth_year: birth_year
        },
        dataType: "html",
        beforeSend: funcBefore,
        success: funcSuccess
      });
    }
  });
});
