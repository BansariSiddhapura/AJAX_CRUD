$(function () {
  // $('#mainpage_content').append("<h1 id='title'>This is Demo Project</h1>");
  $("#custFormDiv").hide();
  $("#contactFormDiv").hide();
  $("#ProjectFormDiv").hide();
  $("#counterFormDiv").hide();
 // $("#detailsFormDiv").hide();

 $.ajax({
    url:'view.php?type=details',
    type:'get',
    dataType:'json'
 }).done(function(res){
  $.each(res,function(i,v){
    //console.log(res);
    var comp=(v.company!=null)?v.company:'-';
    var pnm=(v.project_name!=null)?v.project_name:'-';
    var cnm=(v.counter_name!=null)?v.counter_name:'-';

    $("#deatilsBody").append(`<tr>
      <td>${comp}</td>
      <td>${pnm}</td>
      <td>${cnm}</td>
      </tr>`);
  })
 })
  //--------Customer-----------
  $("body").on("click", "#customer", function () {
    $("#mainpage_content").hide();
    $("#contactFormDiv").hide();
    $("#custFormDiv").show();
    $("#ProjectFormDiv").hide();
    $("#counterFormDiv").hide();
    //$("#detailsFormDiv").hide();

    // $.ajax({
    //   url: "view.php?type=customer",
    //   type: "get",
    //   dataType: "json",
    // }).done(function (res) {
    //   $.each(res, function (i, v) {
    //     $(
    //       "#custBody"
    //     ).append(`<tr><td>${v.id}</td><td>${v.company}</td><td>${v.phone}</td><td>${v.city}</td><td>${v.state}</td>
    //       <td><button class='btn btn-warning btn-sm me-3' id='custEdit' data-id=${v.id} data-bs-toggle="modal" data-bs-target="#custModel">Edit</button>
    //       <button class='btn btn-danger btn-sm' id='custDelete' data-id=${v.id}>Remove</button></td></tr>`);
    //   });
    // });

    $.ajax({
      url: "view.php?type=joinCustCont",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      $.each(res, function (i, v) {
        //console.log(v);
       var cust= (v.company!=null) ? v.company : '-' ;
       var pr_con=(v.firstName&&v.lastName!=null) ? v.firstName +' '+v.lastName : '-';
       var mail=(v.email!=null) ? v.email : '-';
       var phone=(v.phone!=null)? v.phone : '-';
       var date_time=(v.created_at!=null)? v.created_at :'-';
       
        $("#custJoinTable").append(`<tr><td>${v.id}</td>
          <td>${cust}</td>
          <td> ${pr_con}</td>
          <td>${mail}</td>
          <td>${phone}</td>
            <td>${date_time}</td>
            <td><button class='btn btn-warning btn-sm' id='custEdit' data-id=${v.id} data-bs-toggle="modal" data-bs-target="#custModel">Edit</button>
            <button class='btn btn-danger btn-sm' id='custDelete' data-id=${v.id} >Delete</button></td></tr>
           `);
      });
    });
    //---------customer add------------
    $("body").on("submit", "#customerForm", function (e) {
      e.preventDefault();
      let formData = $(this).serialize();
      //console.log(formData);

      $.ajax({
        url: "insert.php?type=joinCustCont",
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
        url: `delete.php?id=${id}&type=joinCustCont`,
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
        url: `view.php?type=joinCustCont&id=${id}`,
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

  // ---------------contact-----------------
  $("body").on("click", "#contact", function () {
    $("#mainpage_content").hide();
    $("#contactFormDiv").show();
    $("#custFormDiv").hide();
    $("#ProjectFormDiv").hide();
    $("#counterFormDiv").hide();
   // $("#detailsFormDiv").hide();
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
      $.each(res, function (i, v) {
        $(
          "#contactBody"
        ).append(`<tr><td>${v.id}</td><td>${v.customer}</td><td>${v.firstName}</td><td>${v.lastName}</td>
                <td>${v.email}</td><td>${v.phone}</td><td>${v.primary_contact}</td>
                <td> <button class='btn btn-warning btn-sm' id='contactEdit' data-id=${v.id} data-bs-toggle="modal" data-bs-target="#contactModel">Edit</button>
                <button class='btn btn-danger btn-sm' id='contactDelete' data-id=${v.id}>Remove</button></td>
                </tr>`);
      });
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
    // $.ajax({
    //   url: "view.php?type=contact",
    //   type: "get",
    //   dataType: "json",
    // }).done(function (res) {
    //   $.each(res, function (i, v) {
    //     $(
    //       "#contactBody"
    //     ).append(`<tr><td>${v.id}</td><td>${v.customer}</td><td>${v.firstName}</td><td>${v.lastName}</td>
    //             <td>${v.email}</td><td>${v.phone}</td><td>${v.primary_contact}</td>
    //             <td> <button class='btn btn-warning btn-sm' id='contactEdit' data-id=${v.id} data-bs-toggle="modal" data-bs-target="#contactModel">Edit</button>
    //             <button class='btn btn-danger btn-sm' id='contactDelete' data-id=${v.id}>Remove</button></td>
    //             </tr>`);
    //   });
    // });

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

  //-------------edit contact---------
  $("body").on("click", "#contactEdit", function () {
    var id = $(this).data("id");
    $.ajax({
      url: `view.php?id=${id}&type=contact`,
      type: "post",
      dataType: "json",
    }).done(function (res) {
      $("#contactModel").find('input[name="id"]').val(res.id);
      $("#compDropdown").val(res.customer);
      $("#fnm").val(res.firstName);
      $("#lnm").val(res.lastName);
      $("#email").val(res.email);
      //$("#phone").val(res.phone);
      $("#contactModel").find('input[name="phone"]').val(res.phone);
      $("#pass").val(res.password);
      //  if($("#pCon").val(res.primary_contact)==1){
      //   $("#contactModel").find('input[name="primary_contact"]').attr("checked disabled");
      //  }
    });
  });

  //------------------project----------------------
  $("body").on("click", "#project", function () {
    $("#mainpage_content").hide();
    $("#ProjectFormDiv").show();
    $("#contactFormDiv").hide();
    $("#custFormDiv").hide();
    $("#counterFormDiv").hide();
    //$("#detailsFormDiv").hide();
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
      url: "view.php?type=project",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      $.each(res, function (i, v) {
        $(
          "#projectBody"
        ).append(`<tr><td>${v.id}</td><td>${v.project_name}</td><td>${v.company}</td>
          <td>${v.start_date}</td><td>${v.end_date}</td><td>${v.created_at}</td>
          <td><button class='btn btn-warning btn-sm' id='projectEdit' data-id=${v.id} data-bs-toggle="modal" data-bs-target="#projectModal">Edit</button>
                <button class='btn btn-danger btn-sm' id='projectDelete' data-id=${v.id}>Remove</button></td></tr>`);
      });
    });

    //-----------add project---------------
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

    //---------------edit project-----------------------
    $("body").on("click", "#projectEdit", function () {
      var id = $(this).data("id");
      $.ajax({
        url: `view.php?type=project&id=${id}`,
        type: "POST",
        dataType: "JSON",
      }).done(function (res) {
        $("#projectModal").find('input[name="id"]').val(res.id);
        $("#pnm").val(res.project_name);
        //$("#projectModal").find('input[name="customer"]').val(res.customer);
        $("#proDropdown").val(res.customer);
        $("#sdate").val(res.start_date);
        $("#edate").val(res.end_date);
      });
    });

    //--------------delete project------------------
    $("body").on("click", "#projectDelete", function () {
      var id = $(this).data("id");
      $.ajax({
        url: `delete.php?type=project&id=${id}`,
        type: "POST",
        dataType: "JSON",
      }).done(function (res) {
        alert(res.message);
        location.reload();
      });
    });
  });

  $("body").on("click", "#counter", function () {
    $("#mainpage_content").hide();
    $("#ProjectFormDiv").hide();
    $("#contactFormDiv").hide();
    $("#custFormDiv").hide();
    $("#counterFormDiv").show();
   // $("#detailsFormDiv").hide();
    $.ajax({
      url: "view.php?type=project",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      $.each(res, function (i, v) {
        $("#ctrCust").append(`<option>${v.company}</option>`);
      });

      $.ajax({
        url: "view.php?type=counter",
        type: "get",
        dataType: "json",
      }).done(function (res) {
        $.each(res, function (i, v) {
          $(
            "#counterBody"
          ).append(`<tr><td>${v.id}</td><td>${v.counter_name}</td><td>${v.customer}</td><td>${v.project_name}</td><td>${v.created_at}</td>
              <td><button class='btn btn-warning btn-sm' id='counterEdit' data-id=${v.id} data-bs-toggle="modal" data-bs-target="#counterModal">Edit</button>
              <button class='btn btn-danger btn-sm' id='counterDelete' data-id=${v.id}>Delete</button></td></tr>
             `);
        });
      });

      //-----------project dropdown based on customer---------------
      $("body").on("change", "#ctrCust", function () {
        var custVal = $(this).val();
        //console.log(custVal);
        $("#counterPro").empty();
        $.each(res, function (i, v) {
          // console.log(v.customer);
          if (custVal == v.customer) {
            $("#counterPro").append(`<option>${v.project_name}</option>`);
          }
        });
      });
    });

    //---------------add counter-------------------
    $("body").on("submit", "#counterForm", function (e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url: "insert.php?type=counter",
        type: "post",
        dataType: "json",
        data: formData,
      }).done(function (res) {
        alert(res.message);
        $("#id").val("");
        location.reload();
      });
    });
    //-----------------edit counter----------------------
    $("body").on("click", "#counterEdit", function () {
      var id = $(this).data("id");
      //console.log(id);

      $.ajax({
        url: `view.php?type=counter&id=${id}`,
        type: "post",
        dataType: "json",
      }).done(function (res) {
        $("#id").val(res.id);
        $("#ctrCust").val(res.customer);
        $("#counterPro").val(res.project_name);
        $("#counterName").val(res.counter_name);
      });
    });
    //------------------delete counter--------------------
    $("body").on("click", "#counterDelete", function () {
      var id = $(this).data("id");
      $.ajax({
        url: `delete.php?id=${id}&type=counter`,
        type: "post",
        dataType: "json",
      }).done(function (res) {
        alert(res.message);
        location.reload();
      });
    });
  });
});
