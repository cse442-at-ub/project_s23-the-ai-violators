let password = document.getElementById("password")
let submit = document.getElementById("button")

let username = document.getElementById("username")

let form = document.getElementsByTagName("form")[0]

let errorCircle = '<i class="fa fa-times-circle"></i>'
let error = document.querySelector(".error-msg")



form.addEventListener("submit", async (e) => {
    e.preventDefault()
    let res = await makeRequest('GET', '/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/login/handleIntake.php/?username=' + username.value + '&password=' + password.value)

    if (res.includes("2")) { // failed to login
        error.style.display = "block"
        error.innerHTML = `${errorCircle} Please Enter Valid Username and Password`
    }
    else if (res.includes("1")) { // logged in without survey
        window.location.replace("/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/survey");
        sessionStorage.setItem("username", username.value);
    }
    else { // logged in with survey
        window.location.replace("/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content");
        sessionStorage.setItem("username", username.value);
    }
    //sessionStorage.getItem("username")

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

