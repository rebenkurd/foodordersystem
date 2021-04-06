
const themeCookieName = "theme";
const themeDark = "dark";
const themeLight = "light";
const body = document.getElementsByTagName("body")[0];

//Change Theme
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
loadTheme();
function loadTheme() {
  var theme = getCookie(themeCookieName);
  body.classList.add(theme === "" ? themeLight : theme);
}


function switchTheme() {
  if (body.classList.contains(themeLight)) {
    body.classList.remove(themeLight);
    body.classList.add(themeDark);
    
    setCookie(themeCookieName, themeDark);
  } else {
    body.classList.add(themeLight);
    body.classList.remove(themeDark);
    setCookie(themeCookieName, themeLight);
  }
}


const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});


    var username=document.querySelector("#username");
    var password=document.querySelector("#password");
    var btn=document.querySelector(".btn");
    function check(){
        if(username.value != "" && password.value !=""){
            btn.disabled=false;
        }else{
            btn.disabled=true;
        }
    }


    username.addEventListener('keyup',check);
    password.addEventListener('keyup',check);

    document.querySelector(".show i").addEventListener("click",
    function ShowPass(){
        if(this.classList[1]=="fa-eye"){
            this.classList.remove("fa-eye");
            this.classList.add("fa-eye-slash");
            password.type="text";
        }else{
            this.classList.add("fa-eye");
            this.classList.remove("fa-eye-slash");
            password.type="password";
        }
    });
