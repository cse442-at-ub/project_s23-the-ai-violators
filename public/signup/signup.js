let password = document.getElementById("password")
let confirm = document.getElementById("confirmPassword")
let submit = document.getElementById("submitButton")

let form = document.getElementsByTagName("form")[0];

function check(){
    if(password.value != confirm.value){
        confirm.setCustomValidity("Passwords must be matching")
    } else {
        confirm.setCustomValidity('')
    }
}

form.addEventListener("submit", e => {
    e.preventDefault();
    alert("Account Created")
})

