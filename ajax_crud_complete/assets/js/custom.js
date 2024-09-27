$(function () {
  // $("table").hide();
  $("body").on("click", "#showTableBtn", function () {
    $("table").toggle();
  });

  //--------------view------------------
  $.ajax({
    url: "view.php",
    type: "GET",
    dataType: "JSON",
  }).done(function (res) {
    $.each(res, function (i, v) {
      //console.log(res);
      $("#tbody").append(
        `<tr><td>${v.id}</td>
        <td>${v.name}</td>
        <td>${v.email}</td>
        <td>${v.city}</td>
        <td>${v.gender}</td>
        <td><button class="btn btn-warning" id="edit" data-id="${v.id}">Edit</button>
        <button class="btn btn-danger ms-2" id="delete" data-id="${v.id}">Delete</button></td></tr>`
      );
    });
  });

  //---------------insert-----------------
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
      $("#myForm").trigger("reset");
      $('input[name="id"]').val("");
      alert(res.message);
      location.reload();
    });
  });

  //insert data using fetch value of individual field instand of formData

  // $("body").on("submit", "#myForm", function (e) {
  //   e.preventDefault();
  //   var name = $("#name").val();
  //   var email = $("#email").val();
  //   var password = $("#pass").val();
  //   var city = $("#city").val();
  //   var gender = $("#gender").val();
  //   $.ajax({
  //     url: "insert.php",
  //     type: "POST",
  //     dataType: "JSON",
  //     data: {
  //       name: name,
  //       email: email,
  //       pass: password,
  //       city: city,
  //       gender: gender,
  //     },
  //   }).done(function (res) {
  //     alert(res.message);
  //     $("#myForm").trigger("reset");
  //   });
  // });

  //---------delete-------------
  $("body").on("click", "#delete", function () {
    var id = $(this).data("id");
    $.ajax({
      url: `delete.php?id=${id}`,
      type: "POST",
      dataType: "html",
    }).done(function (res) {
      //alert(res);
      location.reload();
    });
  });

  //----------------update/edit--------------
  $("body").on("click","#edit",function(){
    var id = $(this).data("id");
    $.ajax({
      url:`view.php?id=${id}`,
      type:"POST",
      dataType:"HTML"
    }).done(function(res){   
      var res=JSON.parse(res);
      $("#id").val(res.id);
      $("#name").val(res.name);
      $("#email").val(res.email);
      $("#pass").val(res.password);
      $("#city").val(res.city);
      res.gender == "male"
      ? $('input[value="male"]').prop("checked", true)
      : $('input[value="female"]').prop("checked", true);

    })
  })
});
