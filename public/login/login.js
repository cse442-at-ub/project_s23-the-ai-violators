let password = document.getElementById("password")
let submit = document.getElementById("button")

let username = document.getElementById("username")

let form = document.getElementsByTagName("form")[0]

let errorCircle = '<i class="fa fa-times-circle"></i>'
let error = document.querySelector(".error-msg")



form.addEventListener("submit", async (e) => {
    e.preventDefault()
    let res = await makeRequest('POST', '/public/login/handleIntake.php/',  [username.value,  password.value])

    if (res.includes("2")) { // failed to login
        error.style.display = "block"
        error.innerHTML = `${errorCircle} Please Enter Valid Username and Password`
    }
    else if (res.includes("1")) { // logged in without survey
        window.location.replace("/public/survey");
        sessionStorage.setItem("username", username.value);
    }
    else { // logged in with survey
        window.location.replace("/public/content");
        sessionStorage.setItem("username", username.value);
    }
    //sessionStorage.getItem("username")

})

function makeRequest(method, url, data) {
    return new Promise(function (resolve, reject) {
        formData = new FormData();
        formData.append("username", data[0])
        formData.append("password", data[1])
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
        xhr.send(formData);
    });
}

