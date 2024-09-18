$(function () {
  $.ajax({
    url: "view.php",
    type: "GET",
    dataType: "JSON",
  }).done(function (res) {
    $.each(res, function (i, v) {
      console.log(res);
      $("#tbody").append(
        `<tr><td>${v.id}</td><td>${v.name}</td><td>${v.email}</td><td>${v.city}</td><td>${v.gender}</td><td><button class="btn btn-warning">Edit</button><button class="btn btn-danger ms-2">Delete</button></td></tr>`
      );
    });
  });

  $("body").on("submit", "#myForm", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    //console.log(formData);

    $.ajax({
      url: "insert.php",
      type: "POST",
      dataType: "JSON",
      data: formData,
    }).done(function (res) {
      alert(res.message);
      $("#myForm").trigger("reset");
    });
  });
});
