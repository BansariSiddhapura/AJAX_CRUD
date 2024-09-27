$(function () {
  // $('#mainpage_content').append("<h1 id='title'>This is Demo Project</h1>");
  $("#custFormDiv").hide();
  $("#contactFormDiv").hide();
  $("#ProjectFormDiv").hide();

  //--------Customer-----------
  $("body").on("click", "#customer", function () {
    $("#mainpage_content").hide();
    $("#contactFormDiv").hide();
    $("#custFormDiv").show();
    $("#ProjectFormDiv").hide();

    $.ajax({
      url: "view.php?type=customer",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      $.each(res, function (i, v) {
        $(
          "#custBody"
        ).append(`<tr><td>${v.id}</td><td>${v.company}</td><td>${v.phone}</td><td>${v.city}</td><td>${v.state}</td>
          <td><button class='btn btn-warning btn-sm me-3' id='custEdit' data-id=${v.id} data-bs-toggle="modal" data-bs-target="#custModel">Edit</button>
          <button class='btn btn-danger btn-sm' id='custDelete' data-id=${v.id}>Remove</button></td></tr>`);
      });
    });

    $.ajax({
      url: "view.php?type=joinCustCont",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      $.each(res, function (i, v) {
        $(
          "#custJoinTable"
        ).append(`<tr><td>${v.id}</td><td>${v.customer}</td><td>${v.firstName} ${v.lastName}</td><td>${v.email}</td><td>${v.phone}</td>
            <td>${v.created_at}</td>
           `);
      });
    });
    //---------customer add------------
    $("body").on("submit", "#customerForm", function (e) {
      e.preventDefault();
      let formData = $(this).serialize();
      //console.log(formData);

      $.ajax({
        url: "insert.php?type=customer",
        type: "post",
        dataType: "JSON",
        data: formData,
      }).done(function (res) {
        // console.log(res);
        alert(res.message);

        $("#custModel").modal("hide");
        $("#customerForm").trigger("reset");
        $("#id").val("");
        location.reload();
      });
    });
    // ------------customer delete------------
    $("body").on("click", "#custDelete", function () {
      var id = $(this).data("id");
      $.ajax({
        url: `delete.php?id=${id}&type=customer`,
        type: "post",
        dataType: "json",
      }).done(function (res) {
        alert(res.message);
        location.reload();
      });
    });
    //----------customer edit------------
    $("body").on("click", "#custEdit", function () {
      var id = $(this).data("id");
      $.ajax({
        url: `view.php?type=customer&id=${id}`,
        type: "POST",
        dataType: "JSON",
      }).done(function (res) {
        $("#id").val(res.id);
        $("#comp").val(res.company);
        $("#phone").val(res.phone);
        $("#city").val(res.city);
        $("#state").val(res.state);
      });
    });
  });

  // ---------------for contact-----------------
  $("body").on("click", "#contact", function () {
    $("#mainpage_content").hide();
    $("#contactFormDiv").show();
    $("#custFormDiv").hide();
    $("#ProjectFormDiv").hide();

    //--------dropdown customer on contact form----------
    $.ajax({
      url: "view.php?type=customer",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      $.each(res, function (i, v) {
        $("#compDropdown").append(`<option>${v.company}</option>`);
      });
    });

    //-----primary contact checkbox------
    $.ajax({
      url: "view.php?type=contact",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      //console.log(res.primary_contact);

      $("body").on("change", "#compDropdown", function () {
        var selectedValue = $(this).val();
        //console.log(selectedValue);

        $("#pCon").removeAttr("disabled");
        $.each(res, function (i, v) {
          if (selectedValue == v.customer) {
            //console.log(v.customer);

            if (v.primary_contact == "1") {
              //console.log(v.company);

              $("#pCon").attr("disabled", "disabled");
            }
          }
        });
      });
    });
    //----------contact view--------------
    $.ajax({
      url: "view.php?type=contact",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      $.each(res, function (i, v) {
        $(
          "#contactBody"
        ).append(`<tr><td>${v.id}</td><td>${v.customer}</td><td>${v.firstName}</td><td>${v.lastName}</td>
                <td>${v.email}</td><td>${v.phone}</td><td>${v.primary_contact}</td>
                <td><button class='btn btn-danger btn-sm' id='contactDelete' data-id=${v.id}>Remove</button></td>
                </tr>`);
      });
    });

    //-----------add contact-----------
    $("body").on("submit", "#contactForm", function (e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url: "insert.php?type=contact",
        type: "post",
        dataType: "JSON",
        data: formData,
      }).done(function (res) {
        alert(res.message);
        $("#custModel").modal("hide");
        $("#customerForm").trigger("reset");
        $("#id").val("");
        location.reload();
      });
    });

    //---------delete contact----------
    $("body").on("click", "#contactDelete", function () {
      var id = $(this).data("id");
      $.ajax({
        url: `delete.php?id=${id}&type=contact`,
        type: "post",
        dataType: "json",
      }).done(function (res) {
        alert(res.message);
      });
    });
  });

  $("body").on("click", "#project", function () {
    $("#mainpage_content").hide();
    $("#ProjectFormDiv").show();
    $("#contactFormDiv").hide();
    $("#custFormDiv").hide();

    //--------dropdown customer on contact form----------
    $.ajax({
      url: "view.php?type=customer",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      $.each(res, function (i, v) {
       
        $("#proDropdown").append(`<option>${v.company}</option>`);
      });
    });

    $.ajax({
      url:'view.php?type=project',
      type:"get",
      dataType:"json"
    }).done(function(res){
      $.each(res,function(i,v){
        $("#projectBody").append(`<tr><td>${v.id}</td><td>${v.project_name}</td><td>${v.customer}</td>
          <td>${v.start_date}</td><td>${v.end_date}</td></tr>`)
      })
    })

    $("body").on("submit", "#projectForm", function (e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url: "insert.php?type=project",
        type: "post",
        dataType: "json",
        data: formData,
      }).done(function (res) {
        alert(res.message);
        //$("#custModel").modal("hide");
        $("#customerForm").trigger("reset");
        $("#id").val("");
        location.reload();
      });
    });
  });
});
