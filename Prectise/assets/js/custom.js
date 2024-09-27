// $(document).ready(function(){
//     console.log("WElcome...");
// });

$(function () {
  //click
  $("#btn1").click(function () {
    //alert("btn1 called");
    $("#img").fadeToggle();
  });

  // add multiple css
  $("#heading").css({
    "background-color": "black",
    color: "white",
  });

  // $("#btn1").hover(function () {
  //   $("#btn1").attr("disabled", true);
  // });
  function func(x) {
    console.log(typeof x, arguments.length);
  }
  func();
  func(1);
  func("1", "2", "3");

  // double click
  var title = $("em").attr("title");
  $("#divid").text(title);
  $("#img").dblclick(function () {
    $("#img").attr(
      "src","../img1.jpg",
    );
  });

  //mouseleave & mouseenter
  $("#img2").mouseenter(function () {
    $(this).attr("src", "../img3.png");
  });
  $("#img2").mouseleave(function () {
    $(this).attr("src", "../img1.jpg");
  });

  $("li").filter('.blue').addClass("text-primary");

  $("li").each(function(index){
      console.log(index+":"+$(this).text());   
  })

});
