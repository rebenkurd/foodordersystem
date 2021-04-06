
/*global, $, alert, window, document*/
(function () {
  "use strict";
  $(".open_close_menu").click(function () {
    $(".main_sidebar").toggleClass("right_sidebar");
    $(".main_container").toggleClass("main_menu_open");
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
  $(".user_info").click(function () {
    if ($(".main_container").hasClass("user_side_open")) {
      $(".main_container").removeClass("user_side_open");
      $(".user_details").addClass("close_user_details");
    } else {
      $(".main_container").addClass("user_side_open");
      $(".user_details").removeClass("close_user_details");
    }
  });

  function hideSideBar() {
    if ($(window).width() < 768) {
      $(".main_sidebar").addClass("right_sidebar");
    } else {
      $(".main_sidebar").removeClass("right_sidebar");
    }
  }

  $(window).resize(function () {
    hideSideBar();
  });
  hideSideBar();


  $(".main_sidebar_wrapper li a").click(function (e) {
    if ($(this).next("ul").hasClass("drop_main_menu")) {
      e.preventDefault();
      if ($(this).next("ul").hasClass("opened")) {
        $(this).next("ul").slideUp().removeClass("opened");
      } else {
        $(this).next("ul").slideDown().addClass("opened");
      }
    }
  });
  
  $('#btn-toggle-open').on('click',function(){
    $('.menu ul').css('display','flex');
    $('.btn-toggle-open').css('display','none');
    $('.btn-toggle-close').css('display','block');
  });
  $('#btn-toggle-close').on('click',function(){
    $('.menu ul').css('display','none');
    $('.btn-toggle-close').css('display','none');
    $('.btn-toggle-open').css('display','block');
  });

  function toggleFullScreen() {
    if (
      !document.fullscreenElement && // alternative standard method
      !document.mozFullScreenElement &&
      !document.webkitFullscreenElement &&
      !document.msFullscreenElement
    ) {
      // current working methods
      if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
      } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullscreen) {
        document.documentElement.webkitRequestFullscreen(
          Element.ALLOW_KEYBOARD_INPUT
        );
      }
    } else {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      }
    }
  }

  $(".full_screen").click(function () {
    toggleFullScreen();
  });
  
$("#checkall").change(function(){
    $(".checkitem").prop("checked",$(this).prop("checked"));
});
$(".checkitem").change(function(){
    if($(this).prop("#checkall")==false){
        $("#checkall").prop("checked",false);
    }
    if($(".checkitem:checked").length==$(".checkitem")==length){
        $("#checkall").prop("checked",false);
    }
});

  // Search all columns
  $('#txt_searchall').keyup(function() {
    // Search Text
    var search = $(this).val();

    // Hide all table tbody rows
    $('table tbody tr').hide();

    // Count total search result
    var len = $('table tbody tr:not(.notfound) td:contains("' + search + '")').length;

    if (len > 0) {
      // Searching text in columns and show match row
      $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
        $(this).closest('tr').show();
      });
    } else {
      $('.notfound').show();
    }

  });


  // Case-insensitive searching (Note - remove the below script for Case sensitive search )
  $.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function(elem) {
      return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    }
  });

})();
