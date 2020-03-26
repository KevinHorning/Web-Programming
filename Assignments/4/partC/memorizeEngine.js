var numPairs, difficulty, photoArray, selectableArray, match1Path, match2Path, match1Row, match1Col;

function createGame(){
    var table = document.getElementById("table");
    table.innerHTML = "";

    getSettings();
    createTable();
    setTimeout(hidePhotos, difficulty * 1000);
}

function getSettings(){
    pairOptions = document.getElementsByName("pairs");
    for (i = 0; i < pairOptions.length; i++){
        if (pairOptions[i].checked)
            numPairs = pairOptions[i].value;
    }
    difOptions = document.getElementsByName("dif");
    for (i = 0; i < difOptions.length; i++){
        if (difOptions[i].checked)
            difficulty = difOptions[i].value;
    }
}

function createTable(){
    // creates the array of images
    photoArray = ["photos/dog1.jpg", "photos/dog2.jpg", "photos/cat1.jpg", "photos/cat2.jpg", "photos/rat1.jpg", "photos/rat2.jpg", "photos/possum1.jpg", "photos/possum2.jpg", "photos/lizard1.jpg", "photos/lizard2.jpg", "photos/snake1.jpg", "photos/snake2.jpg", "photos/otter1.jpg", "photos/otter2.jpg", "photos/mouse1.jpg", "photos/mouse2.jpg"];
    if (numPairs > 8){
        photoArray.push("photos/fish1.jpg");
        photoArray.push("photos/fish2.jpg");
        photoArray.push("photos/bird1.jpg");
        photoArray.push("photos/bird2.jpg");
    }
    if (numPairs > 10){
        photoArray.push("photos/turtle1.jpg");
        photoArray.push("photos/turtle2.jpg");
        photoArray.push("photos/frog1.jpg");
        photoArray.push("photos/frog2.jpg");
    }

    // shuffles the array
    numUnshuffled = photoArray.length;
    while (numUnshuffled > 0){
        index = Math.floor(Math.random() * numUnshuffled);
        numUnshuffled--;
        temp = photoArray[numUnshuffled];
        photoArray[numUnshuffled] = photoArray[index];
        photoArray[index] = temp;
    } 

    // fills the table with the images
    for (r = 0; r < 4; r++){
        row = table.insertRow(r); 
        for (c = 0; c < numPairs/2; c++){
            col = row.insertCell(c);
            col.innerHTML = `<img src = "${photoArray[(r*numPairs/2)+c]}">`;
        } 
    }
}

function hidePhotos(){
    table.innerHTML = "";
    for (r = 0; r < 4; r++){
        row = table.insertRow(r); 
        for (c = 0; c < numPairs/2; c++){
            col = row.insertCell(c);
            col.innerHTML = '<img src = "photos/black.jpg">';
        } 
    }
    initializeListeners();
}

function initializeListeners(){
    // determines if a cell can be clicked
    selectableArray = [true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true]
    
    // creates listener for each table cell
    table.rows[0].cells[0].addEventListener("click", function(){ show(0,0);} );
    table.rows[0].cells[1].addEventListener("click", function(){ show(0,1);} );
    table.rows[0].cells[2].addEventListener("click", function(){ show(0,2);} );
    table.rows[0].cells[3].addEventListener("click", function(){ show(0,3);} );
    table.rows[1].cells[0].addEventListener("click", function(){ show(1,0);} );
    table.rows[1].cells[1].addEventListener("click", function(){ show(1,1);} );
    table.rows[1].cells[2].addEventListener("click", function(){ show(1,2);} );
    table.rows[1].cells[3].addEventListener("click", function(){ show(1,3);} );
    table.rows[2].cells[0].addEventListener("click", function(){ show(2,0);} );
    table.rows[2].cells[1].addEventListener("click", function(){ show(2,1);} );
    table.rows[2].cells[2].addEventListener("click", function(){ show(2,2);} );
    table.rows[2].cells[3].addEventListener("click", function(){ show(2,3);} );
    table.rows[3].cells[0].addEventListener("click", function(){ show(3,0);} );
    table.rows[3].cells[1].addEventListener("click", function(){ show(3,1);} );
    table.rows[3].cells[2].addEventListener("click", function(){ show(3,2);} );
    table.rows[3].cells[3].addEventListener("click", function(){ show(3,3);} );

    if (numPairs > 8){
        table.rows[0].cells[4].addEventListener("click", function(){ show(0,4);} );
        table.rows[1].cells[4].addEventListener("click", function(){ show(1,4);} );
        table.rows[2].cells[4].addEventListener("click", function(){ show(2,4);} );
        table.rows[3].cells[4].addEventListener("click", function(){ show(3,4);} );
    }
    if (numPairs > 10){
        table.rows[0].cells[5].addEventListener("click", function(){ show(0,5);} );
        table.rows[1].cells[5].addEventListener("click", function(){ show(1,5);} );
        table.rows[2].cells[5].addEventListener("click", function(){ show(2,5);} );
        table.rows[3].cells[5].addEventListener("click", function(){ show(3,5);} );
    }

    // stores the images during matching 
    match1Path = "";
    match2Path = "";
}

function show(row, col){
    // it is first match pick
    if (match1Path === "" && selectableArray[(row*(numPairs/2)+col)]){
        match1Path = `"${photoArray[row*(numPairs/2)+col]}"`;
        table.rows[row].cells[col].innerHTML = `<img src = ${match1Path}>`;
        match1Row = row;
        match1Col = col;
        selectableArray[(row*(numPairs/2)+col)] = false;
    }
    // it is second match pick
    else if (match2Path === "" && selectableArray[(row*(numPairs/2)+col)]){
        match2Path = `"${photoArray[row*(numPairs/2)+col]}"`;
        table.rows[row].cells[col].innerHTML = `<img src = ${match2Path}>`;
        selectableArray[(row*(numPairs/2)+col)] = false;
        verifyMatch(row, col);
    }
    // else - it was already found
}

function verifyMatch(match2Row, match2Col){
    pathIndex = match1Path.indexOf("1");
    if (pathIndex === -1)
        pathIndex = match1Path.indexOf("2");
            
    if (match1Path.substring(0, pathIndex) !== match2Path.substring(0, pathIndex)){
        tempArray = selectableArray;
        selectableArray = [false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false] 
        setTimeout(function(){
            table.rows[match1Row].cells[match1Col].innerHTML = '<img src = "photos/black.jpg">';
            table.rows[match2Row].cells[match2Col].innerHTML = '<img src = "photos/black.jpg">';
            selectableArray = tempArray;
            selectableArray[(match1Row*(numPairs/2)+match1Col)] = true;
            selectableArray[(match2Row*(numPairs/2)+match2Col)] = true;
        }, 1500);
    }
        
    match1Path = "";
    match2Path = "";        
}

