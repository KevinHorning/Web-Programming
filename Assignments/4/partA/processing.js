hoursList = [];
totalSum = 0;

function addHour() {
    hours = document.forms["hourInput"]["hours"].value;
    document.getElementById("hourInput").reset();

    if (hours < 0){
        hoursList.forEach(printRow);
        p = document.getElementById("totalPay");
        p.insertAdjacentHTML("beforeend", totalSum);
        hoursList = [];
    }
    else 
        hoursList.push(parseInt(hours));
}

function printRow(item, index){  
    var salary;
    overtime = item - 40;
    if (overtime > 0)
        salary = 40 * 15 + overtime * (15 * 1.5);
    else 
        salary = item * 15;

    table = document.getElementById("table");
    rowCount = table.rows.length;
    row = table.insertRow(rowCount);
    col1 = row.insertCell(0);
    col1.innerHTML = index + 1;
    col2 = row.insertCell(1);
    col2.innerHTML = item;
    col3 = row.insertCell(2);
    col3.innerHTML = "$" + salary;

    totalSum += salary;
}