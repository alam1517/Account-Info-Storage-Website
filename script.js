// Toggling between Login/Register buttons
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function login() {
    x.style.left = "0px";
    y.style.left = "500px";
    z.style.left = "0";
    document.getElementById("register").reset();
}

function register() {
    x.style.left = "-500px";
    y.style.left = "0px";
    z.style.left = "110px";
    document.getElementById("login").reset();
}