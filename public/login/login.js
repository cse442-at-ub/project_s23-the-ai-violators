let username = document.getElementById("username")
let password = document.getElementById("password")
let button = document.getElementById("button")
let form = document.getElementsByTagName("form")[0];

let errorCircle = '<i class="fa fa-times-circle"></i>'
let error = document.querySelector(".error-msg")

function mess(){
   error.style.display = "block"
   error.innerHTML = `${errorCircle} Please Enter Valid Username and Password`


}
