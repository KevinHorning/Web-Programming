<?php
    $FN = $_POST["firstName"];
    if (strlen($FN) >= 2 && strlen($FN) <= 20 && ctype_alpha($FN)){
        setcookie("firstName", $FN);
        setcookie("model", $_POST["model"]);
    }
    else{
        echo "First Name is not alphabetic and between 2 and 20 letters long.";
        exit();
    }
?>

<html>
    <head>
        <title>Select Color</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="pageContainer centerText">     
            <p></p>
            <h2 class="centerText">Select Color</h2>
            <div class="pageContainer">
                <form action="order03.php" class="formLayout" method = "post">
                    <div class="formGroup">
                        <label>Car color:</label>
                        <div class="formElements">
                            <select name="carColor" required >
                                <option value=""></option>
                                <option style="background-color: blue; color:white;" value="blue">Blue</option>
                                <option style="background-color: red" value="red">Red</option>
                                <option style="background-color: yellow" value="yellow">Yellow</option>
                            </select> 
                        </div>
                    </div>
                    <div class="formGroup">
                        <label></label>
                        <button type="submit"> >> Next >> </button>
                    </div>
                    <div class="centerText vertGap55">
                        <button type="submit" formnovalidate>Submit without validation</button><br><br>
                        <a href="?">Reload page</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>