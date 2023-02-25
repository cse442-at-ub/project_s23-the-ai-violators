password = document.getElementById("password")
confirm = document.getElementById("confirmPassword")
submit = document.getElementById("submitButton")

function check(){
    if(password.value != confirm.value){
        confirm.setCustomValidity("Passwords must be matching")
    } else {
        confirm.setCustomValidity('')
    }
}
