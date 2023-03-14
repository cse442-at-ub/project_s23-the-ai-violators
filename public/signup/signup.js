let password = document.getElementById("password")
let confirm = document.getElementById("confirmPassword")
let submit = document.getElementById("submitButton")

let email = document.getElementById("email")
let username = document.getElementById("username")

let form = document.getElementsByTagName("form")[0]

let takenEmail = "Taken@example.com"
let takenUsername = "Taken"


function check(){
    if(password.value != confirm.value){
        confirm.setCustomValidity("Passwords must be matching")
    } else {
        confirm.setCustomValidity('')
    }
}

form.addEventListener("submit",  async (e) => {
   let res = await makeRequest('GET', '/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/HandleSignup.php?username='+user+'&email='+email+'&password='+password)
   e.preventDefault()
   let errorCircle = '<i class="fa fa-times-circle"></i>'
   let error = document.querySelector(".error-msg")
   /*if(email.value === takenEmail && username.value === takenUsername){
        error.style.display = "block"
        error.innerHTML = `${errorCircle} Email and Username already taken`
    }*/
    if(res == 2){
        error.style.display = "block"
        error.innerHTML = `${errorCircle} Username already taken`
   }
   else if(res == 1){
        error.style.display = "block"
        error.innerHTML = `${errorCircle} Email already taken`
   }
   else{
    //submitForm() //This function has no current functionality
    error.style.display = "none"
    let success = document.querySelector(".success-msg")
    success.style.display = "block"
   }
})

function makeRequest(method, url) {
    return new Promise(function (resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.open(method, url);
        xhr.onload = function () {
            if (this.status >= 200 && this.status < 300) {
                resolve(xhr.response);
            } else {
                reject({
                    status: this.status,
                    statusText: xhr.statusText
                });
            }
        };
        xhr.onerror = function () {
            reject({
                status: this.status,
                statusText: xhr.statusText
            });
        };
        xhr.send();
    });
}

// function signupChcker(email,user,password,cfunc) {
//     let xhr = new XMLHttpRequest();

//   xhr.onreadystatechange = function(){
//     if(this.readyState === 4 && this.status === 200)
//       {
//         let res = JSON.parse(this.responseText)
//         console.log(res)
//         cfunc(res)
//       }
//     }
//     xhr.open('GET', '/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/HandleSignup.php?username='+user+'&email='+email+'&password='+password, true);
//   xhr.send();
// }
