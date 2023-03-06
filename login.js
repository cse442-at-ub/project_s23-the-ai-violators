let username = document.getElementById("username")
let password = document.getElementById("password")
let button = document.getElementById("button")

function checkInfo() {
    if (password.value != "testpassword" && username.value != "testusername") {
        button.setCustomValidity("Please Enter Valid Username and Password")
    }else {
        button.setCustomValidity('')
        window.location.href = "content.php";
    }
  }