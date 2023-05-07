

let today = new Date();
let dd = String(today.getDate()).padStart(2, '0');
let mm = String(today.getMonth() + 1).padStart(2, '0');
let yyyy = today.getFullYear();
let diet = ""

today = yyyy + '-' + mm + '-' + dd;



const date = today,
    user = sessionStorage.getItem('username')




let dietForm = document.getElementById('dietSelect')
let forms = document.getElementsByClassName('mealdata')

for (let i = 0; i < forms.length; i++) {
    forms[i].addEventListener("submit", function (e) {
        e.preventDefault()
        let meal = this.querySelector('[name="meal' + (i + 1) + '"]').value;
        let calories = this.querySelector('[name="calories' + (i + 1) + '"]').value;
        let protein = this.querySelector('[name="protein' + (i + 1) + '"]').value;
        let carbs = this.querySelector('[name="carbs' + (i + 1) + '"]').value;
        let fats = this.querySelector('[name="fats' + (i + 1) + '"]').value;


        console.log(meal, calories, protein, carbs, fats, date, user)


        e.target.parentNode.innerHTML = "<h2>added to meals</h2>"
        makeRequest('POST', '/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/handleIntake.php/',
            [user, date, meal, calories, carbs, protein, fats])
    })
}


dietForm.addEventListener("submit", (e) => {
    e.preventDefault()
    diet = document.getElementById('diets').value
})



function makeRequest(method, url, data) {
    return new Promise(function (resolve, reject) {
        formData = new FormData();
        formData.append("username", data[0])
        formData.append("date", data[1])
        formData.append("meal", data[2])
        formData.append("calories", data[3])
        formData.append("protein", data[4])
        formData.append("carbs", data[5])
        formData.append("fats", data[6])
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