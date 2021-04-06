/**
 * Created by hosamzewain on 8/11/15.
 */
/*global $, alert, window, document*/
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

  $(".change_lang").click(function () {
    if ($(".lang_css").hasClass("arabic")) {
      $(".lang_css").removeClass("arabic").attr("href", "css/en.css");
    } else {
      $(".lang_css").addClass("arabic").attr("href", "css/ar.css");
    }
  });

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
})();

anime({
  targets: ".row svg",
  translateY: 10,
  autoplay: true,
  loop: true,
  easing: "easeInOutSine",
  direction: "alternate",
});

anime({
  targets: "#zero",
  translateX: 10,
  autoplay: true,
  loop: true,
  easing: "easeInOutSine",
  direction: "alternate",
  scale: [{ value: 1 }, { value: 1.4 }, { value: 1, delay: 250 }],
  rotateY: { value: "+=180", delay: 200 },
});


const inputs=document.querySelectorAll(".input");


function addcl() {
    let parent=this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl() {
    let parent=this.parentNode.parentNode;

    if(this.value=="") {
        parent.classList.remove("focus");
    }
}


inputs.forEach(input=> {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    }

);


var username=document.querySelector("#username");
var password=document.querySelector("#password");
var btn=document.querySelector("#btn");

function check() {
    if(username.value !=""&& password.value !="") {
        btn.disabled=false;
    }

    else {
        btn.disabled=true;
    }
}


username.addEventListener('keyup', check);
password.addEventListener('keyup', check);

document.querySelector(".show i").addEventListener("click",
    function ShowPass() {
        if(this.classList[1]=="fa-eye") {
            this.classList.remove("fa-eye");
            this.classList.add("fa-eye-slash");
            password.type="text";
        }

        else {
            this.classList.add("fa-eye");
            this.classList.remove("fa-eye-slash");
            password.type="password";
        }
    }

);