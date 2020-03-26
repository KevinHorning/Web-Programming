var guessesLeft = 8;
var secretNum = parseInt(Math.random() * 100 + 1);

function guessResponse(){
    var newGameHeader = document.getElementById("newGame");
    var hintHeader = document.getElementById("hint");
    guessesLeft -= 1;

    if (guessesLeft <= 0){
        newGameHeader.innerHTML = "YOU LOSE!!! New game started";
        guessesLeft = 8;
    }
    else{
        newGameHeader.innerHTML = "";
        var guessNum = document.forms["form"]["guessNum"].value;

        if (guessNum > secretNum){
            hintHeader.innerHTML = "Guess lower";
            hintHeader.style.color = "purple";
        }
        else if (guessNum < secretNum) {
            hintHeader.innerHTML = "Guess higher";
            hintHeader.style.color = "blue";
        }
        else {
            hintHeader.innerHTML = "";
            newGameHeader.innerHTML = "YOU WIN!!! New game started";
            guessesLeft = 8;
        }
    }

    document.getElementById("remaining").innerHTML = guessesLeft;

    var guessBox = document.getElementById("guessBox");
    guessBox.oninvalid = function(event) {
        event.target.setCustomValidity("Should only contain numbers");
    }
}