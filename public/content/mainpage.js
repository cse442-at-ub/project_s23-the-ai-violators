let currentProtienArray = document.querySelectorAll('.tableProtein')
let currentCarbsArray = document.querySelectorAll('.tableCarbs')
let currentFatsArray = document.querySelectorAll('.tableFats')
let currentCalsArray = document.querySelectorAll('.tableCalories')

let curProSpan = document.querySelector('#curPro')
let curCarbSpan = document.querySelector('#curCarb')
let curFatSpan = document.querySelector('#curFat')
let curCalsSpan = document.querySelector('#curCals')

let totalCurrentProtien = 0
let totalCurrentCarbs = 0
let totalCurrentFats = 0
let totalCurrentCalories = 0

for (let i = 0; i < currentProtienArray.length; i++) {
  totalCurrentProtien += Number(currentProtienArray[i].innerText)
  totalCurrentCarbs += Number(currentCarbsArray[i].innerText)
  totalCurrentFats += Number(currentFatsArray[i].innerText)
  totalCurrentCalories += Number(currentCalsArray[i].innerText)
}

curProSpan.innerText = totalCurrentProtien
curCarbSpan.innerText = totalCurrentCarbs
curFatSpan.innerText = totalCurrentFats
curCalsSpan.innerText = totalCurrentCalories




//values in calories
/*let curPro_K = currentProtien * 4
let curCarb_K = currentCarb * 4
let curFat_K = currentFat * 9

let totalCur_K = curPro_K + curCarb_K + curFat_K*/



let protienProgress = document.querySelector(".protienProgress")
let protienValue = Number(document.querySelector('#totalPro').innerText)


protienProgress.style.background = `conic-gradient(rgb(196, 32, 60) ${(totalCurrentProtien / protienValue) * 360}deg, #ededed 0deg)`


let carbsProgress = document.querySelector(".carbsProgress")
let carbValue = Number(document.querySelector('#totalCar').innerText)

console.log(carbValue)

carbsProgress.style.background = `conic-gradient(rgb(33, 157, 205) ${(totalCurrentCarbs / carbValue) * 360}deg, #ededed 0deg)`


let fatsProgress = document.querySelector(".fatsProgress")
let fatValue = Number(document.querySelector('#totalFat').innerText)

fatsProgress.style.background = `conic-gradient(rgb(230, 227, 71) ${(totalCurrentFats / fatValue) * 360}deg, #ededed 0deg)`

let cals = document.querySelector('#cals')

cals.innerHTML = `${totalCur_K}/${calorieGoal}`


/*}

  function getMacroGoals(user_name, cfunc) {
  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      let res = JSON.parse(this.responseText)

      cfunc(res)

    }
  }
  xhr.open('GET', '/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/getMacroGoals.php?user_name=' + user_name, true);
  xhr.send();
}*/