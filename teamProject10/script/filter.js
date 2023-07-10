$(document).ready(function () {
  // when the "make" dropdown changes
  $("#make").on("change", function () {
    var make = $(this).val(); // get the selected value from the "make" dropdown
    $("#model").attr("disabled", false); // enable the "model" dropdown
    $("#model").html('<option value="">Select model</option>'); // set the default option for the "model" dropdown
    if (make == "Volkswagen") {
      // if the selected make is Volkswagen
      // add options for Volkswagen models to the "model" dropdown
      $("#model").append('<option value="Golf">Golf</option>');
      $("#model").append('<option value="Passat">Passat</option>');
      $("#model").append('<option value="Touran">Touran</option>');
      $("#model").append('<option value="Up">Up</option>');
      $("#model").append('<option value="Tiguan">Tiguan</option>');
    } else if (make == "BMW") {
      // if the selected make is BMW
      // add options for BMW models to the "model" dropdown
      $("#model").append('<option value="3 series">3 series</option>');
      $("#model").append('<option value="4 series">4 series</option>');
      $("#model").append('<option value="5 series">5 series</option>');
      $("#model").append('<option value="X3">X3</option>');
      $("#model").append('<option value="X5">X5</option>');
    } else if (make == "Mercedes") {
      // if the selected make is Mercedes
      // add options for Mercedes models to the "model" dropdown
      $("#model").append('<option value="A class">A class</option>');
      $("#model").append('<option value="B class">B class</option>');
      $("#model").append('<option value="C class">C class</option>');
      $("#model").append('<option value="E class">E class</option>');
      $("#model").append('<option value="S class">S class</option>');
    } else if (make == "Toyota") {
      // if the selected make is Toyota
      // add options for Toyota models to the "model" dropdown
      $("#model").append('<option value="C-HR">C-HR</option>');
      $("#model").append('<option value="Aygo">Aygo</option>');
      $("#model").append('<option value="Prius">Prius</option>');
      $("#model").append('<option value="RAV4">RAV4</option>');
      $("#model").append('<option value="Corolla">Corolla</option>');
      $("#model").append('<option value="Avensis">Avensis</option>');
    } else if (make == "Audi") {
      // if the selected make is Audi
      // add options for Audi models to the "model" dropdown
      $("#model").append('<option value="A1">A1</option>');
      $("#model").append('<option value="A3">A3</option>');
      $("#model").append('<option value="A5">A5</option>');
      $("#model").append('<option value="Q5">Q5</option>');
      $("#model").append('<option value="Q7">Q7</option>');
    } else {
      // if no make is selected, disable the "model" dropdown
      $("#model").attr("disabled", true);
    }
  });

  // when the filter form is submitted
  $("#filter-form").on("submit", function (e) {
    e.preventDefault(); // prevent the form from submitting normally

    var formData = $(this).serialize(); // serialize the form data into a string

    $.ajax({
      type: "POST", // use the POST method for the AJAX request
      url: "filter.php", // specify the URL for the
      data: formData,
      success: function (result) {
        // displays the cars in correlation to the specified filters
        $("#car-list").html(result);
      },
      error: function () {
        alert("Error filtering cars"); // displays a message if the filter was not able to filter them properly
      },
    });
  });
});
