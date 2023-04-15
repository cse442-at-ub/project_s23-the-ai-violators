let date
let meal
let calories
let carbs
let protein
let fats
let mId

let submit = ""
let form = document.getElementsByTagName("form")[0]

//let user = document.querySelector('#username')
let user= sessionStorage.getItem('username')

function findRow(searchValue) {
    // Get the table by its ID
    const table = document.getElementById("myTable");
    const columnIndex = 6;

    // Iterate through the rows
    for (let i = 1; i < table.rows.length; i++) {
        // Get the row
        const row = table.rows[i];

        // Check if the cell content in the specified column matches the search value
        if (parseInt(row.cells[columnIndex].textContent) === searchValue) {
            console.log(`Found the row with'${searchValue}':`, row);

            let c = 0
            // Iterate through the cells in the row
            for (let j = 0; j < row.cells.length; j++) {
                // Get the cell
                const cell = row.cells[j];

                if (j < 6){
                    if (j == 0){
                        // Create a new input element
                        const inputElement = document.createElement("input");

                        // Set the input element's attributes
                        inputElement.type = "text";
                        inputElement.id = "" + c
                        c = c+1
                        inputElement.value = cell.textContent;

                        // Replace the cell content with the input element
                        cell.textContent = "";
                        cell.appendChild(inputElement);
                    }
                    else if (j == 1){
                        // Create a new input element
                        const inputElement = document.createElement("input");

                        // Set the input element's attributes
                        inputElement.type = "text";
                        inputElement.id = "" + c
                        c = c+1
                        inputElement.value = cell.textContent;

                        // Replace the cell content with the input element
                        cell.textContent = "";
                        cell.appendChild(inputElement);
                    }
                    else{
                        // Create a new input element
                        const inputElement = document.createElement("input");

                        // Set the input element's attributes
                        inputElement.type = "number";
                        inputElement.id = "" + c
                        c = c+1
                        inputElement.value = cell.textContent;

                        // Replace the cell content with the input element
                        cell.textContent = "";
                        cell.appendChild(inputElement);
                    }
                }
                else if (j == 6){
                    const inputElement = document.createElement("input");
                    inputElement.type = "number";
                    inputElement.id = "id"
                    inputElement.value = cell.textContent;

                    // Replace the cell content with the input element
                    cell.textContent = "";
                    cell.appendChild(inputElement);
                }
                else if (j == 7){
                    const newButton = document.createElement("button");

                    // Set the new button's attributes (e.g., text content and onclick event)
                    newButton.textContent = "Save";
                    newButton.type = "submit";
                    newButton.id = "sub"

                    cell.textContent = "";
                    cell.appendChild(newButton);
                }
            }

            date = document.getElementById("0")
            meal = document.getElementById("1")
            calories = document.getElementById("2")
            carbs = document.getElementById("3")
            protein = document.getElementById("4")
            fats = document.getElementById("5")
            mId = document.getElementById("id")

            submit = document.getElementById("sub")

            return row;
        }
    }


    console.log(`Row with ${columnName} '${searchValue}' not found.`);
    return null;
}


form.addEventListener("submit", async (e) => {
    e.preventDefault()
    console.log("sub")
    let res = await makeRequest('POST', '/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/history/handleIntake.php/',  [sessionStorage.getItem("username"), date.value, meal.value, calories.value, carbs.value, protein.value, fats.value, mId.value])


    if (res.includes("1")) { 
        window.location.reload();
    }
})

async function del(id){
    let d = await makeRequest('POST', '/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/history/handleDelete.php/',  [sessionStorage.getItem("username"), id])

    if (d.includes("1")) { 
        window.location.reload();
    }

}

function makeRequest(method, url, data) {
    return new Promise(function (resolve, reject) {
        if(data.length > 2){
            formData = new FormData();
            formData.append("username", data[0])
            formData.append("date", data[1])
            formData.append("meal", data[2])        
            formData.append("calories", data[3])
            formData.append("protein", data[4])
            formData.append("carbs", data[5])
            formData.append("fats", data[6])
            formData.append("mId", data[7])
        }
        else{
            formData = new FormData();
            formData.append("username", data[0])
            formData.append("id", data[1])
        }
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


