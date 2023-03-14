let username = document.getElementById("username")
let password = document.getElementById("password")
let button = document.getElementById("button")
let form = document.getElementsByTagName("form")[0];

form.addEventListener("submit", login => {
    if (password.value != "test_password" || username.value != "test_username") {
        login.preventDefault();
        alert("Please Enter Valid Username and Password")
    }
})