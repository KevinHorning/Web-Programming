<?php

$purchaseNo = $_POST["purchaseNo"];
$supplierID = $_POST["supplierID"];
$date = $_POST["date"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];
$description = $_POST["description"];
$conn;  // database connection

if (errorCheck()){
    $result = $conn->query("INSERT INTO Purchases VALUES (\"{$purchaseNo}\", \"{$supplierID}\", \"{$date}\", {$quantity}, \"{$description}\", {$price});");
    header("Location: display.php");
}

$conn->close();

function errorCheck(){
    $noErrors = true;
    $purchaseNumbers = getPurchaseNumbers();
    global $purchaseNo, $date;
    if (in_array($purchaseNo, $purchaseNumbers)){
        $noErrors = false;
        echo "<h1> Error: Purchase Number already exists </h1>";
    }
    
    if (!checkdate(substr($date, 0, 2), substr($date, 3, 2), "20" . substr($date, 6))){
        $noErrors = false;
        echo "<h1> Error: Date is invalid </h1>";
        // echo "<br> <h1> Month: " . substr($date, 0, 2) . " Day: " . substr($date, 3, 2) . " Year: " .substr($date, 6) . "</h1>";
    }
    return $noErrors;
}

function getPurchaseNumbers(){
    global $conn;
    $conn = new mysqli("localhost", "khorning2", "khorning2");

    if ($conn->connect_error) 
        die("Connection failed: " . $conn->connect_error);

    $conn->query("USE khorning2");
    $result = $conn->query("SELECT * FROM Purchases");

    $purchaseNoList = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
            array_push($purchaseNoList, $row["PurchaseNo"]);
    } 
    else 
        echo "<br> 0 results";

    return $purchaseNoList;
}

?>

<form method = "POST">
    <input type = "submit" formaction = "newPurchase.html" value = "Return to Page">
</form>
<style>
    body {
        background: #f1f1f1;
    }
    h1{
        text-align: center;
    }
    input {
        display: block;
        margin-left: auto;
        margin-right: auto;
        font-size: 20px;
    }
</style>