
let errorCircle = '<i class="fa fa-times-circle"></i>'
let error = document.querySelector(".error-msg")


if (d == 1){
   error.style.display = "block"
   error.innerHTML = `${errorCircle} Please Enter Valid Username and Password`

}

