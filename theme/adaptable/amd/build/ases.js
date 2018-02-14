define(['jquery'], function($) {
return {
  init: function(){
    
  $(".check").click(function(event){
  $(".check > .fa").each(function(key, val){
    $(val).remove();
  });
  $(this).append("<i class='fa fa-check-square' aria-hidden='true'></i>");
      
    });

  $(".navbar > ul > li, .expanded > li").click(function(event){
    var filterClass = $(this).children("a").data("filter");
      $("#ova-container > .ova").fadeOut();
      $("#ova-container > " + filterClass).fadeIn("fast");
      
    });
 
  $(".expandable").click(function(event){
    var subme = $(this);
    subme.parent().next().slideToggle("slow");
    subme.children("span").toggleClass("animate");
    $(".expanded > li > a > h1 > .fa").each(function(key, val){
        $(val).remove();
      });
  });
    
    $(".expanded > li > a").click(function(event){
      $(".expanded > li > a > h1 > .fa").each(function(key, val){
        $(val).remove();
      });
      $(this).children("h1").append("<i class='fa fa-check-square' aria-hidden='true'></i>");
    });

$(".navbar li").click(function(event){
      $(".navbar li").removeClass("active");
      $(this).toggleClass("active");
      
    });

$(".navbar.ex2 > ul > li").click(function(){
  var filterClass = $(this).children("a").data("filter");
  $("#ova-container > .ova2").fadeOut();
  $("#ova-container > " + filterClass).fadeIn("fast");
});

$(".navbar li").click(function(event){
  $(".navbar li").removeClass("active");
  $(this).toggleClass("active");
});

    }
  } 
});