/*let breakfast = document.getElementById("breakfast");
breakfast.addEventListener('click', function() {
    breakfast.classList.add('active');
});

let lunch = document.getElementById('lunch');
lunch.addEventListener('click', function() {
    lunch.classList.add('active');
});

let dinner = document.getElementById('dinner');
dinner.addEventListener('click', function() {
    dinner.classList.add('active');
});

let snack = document.getElementById('snack');
snack.addEventListener('click', function() {
  snack.classList.add('active');
});
*/

let date = document.getElementById("date")
let calories = document.getElementById("calories")
let carbs = document.getElementById("carbs")
let protein = document.getElementById("protein")
let fats = document.getElementById("fats")

let submit = document.getElementById("submitButton")

//console.log(date.value)

let form = document.getElementsByTagName("form")[0]

let errorCircle = '<i class="fa fa-times-circle"></i>'
let error = document.querySelector(".error-msg")

form.addEventListener("submit", async (e) => {
    e.preventDefault()
    let res = await makeRequest('GET', '/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/handleIntake.php/?username=' + sessionStorage.getItem("username") + '&date=' + date.value + '&calories=' + calories.value + '&carbs=' + carbs.value + '&protein=' + protein.value + '&fats=' + fats.value)

    if (res.includes("2")) { // failed to login
        error.style.display = "block"
        error.innerHTML = `${errorCircle} Error`
    }
    else if (res.includes("1")) { // logged in without survey
        error.style.display = "block"
        error.innerHTML = `${errorCircle} Sucessfully Tracked!`
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


