<!-- Assignment2 -->

Question 1
<br/>
<?php
    function isBitten(){
        return rand(0, 1);
    }

    if (isBitten())
        echo "Charlie ate my lunch!";
    else
        echo "Charlie did not eat my lunch";
?>

<br/>
<br/>

Question 2
<br/>
<style>
    td {
        width: 35px;
        height: 35px;
    }
    .r {
        background-color: red;
    }
    .b {
        background-color: black;
    }
</style>
<table>
<?php for ($r = 0; $r < 8; $r++){
    echo "<tr>";
    for ($c = 0; $c < 8; $c++){
        $color = NULL;
        if (($r + $c) % 2 == 0)
            $color = "\"r\"";
        else 
            $color = "\"b\"";
    
        echo "<td class = $color>  </td>";

    }
    echo "</tr>";
    echo PHP_EOL;
}
?>
</table>

<br/>
<br/>

Question 3
<br/>
<?php
    $month = array ('January', 'February', 'March', 'April', 'May', 'June', 'July',
    'August','September', 'October', 'November', 'December'); 
    
    for ($i = 0; $i < sizeof($month); $i++){
        echo $month[$i]." ";
    }
    echo "<br/>";
    
    $monthSorted = $month;
    sort($monthSorted);
    for ($i = 0; $i < sizeof($monthSorted); $i++){
        echo $monthSorted[$i]." ";
    }

    echo "<br/>";
    foreach ($month as $key => $val){
        echo $val." ";
    }
    
    echo "<br/>";
    $monthSorted = $month;
    sort($monthSorted);
    foreach ($monthSorted as $key => $val){
        echo $val." ";
    }
?>

<br/>
<br/>

Question 4
<br/>
<?php
    $restaurants = array(
        "Chama Gaucha" => 40.5,
        "Aviva" => 15,
        "Bone's Restaurant" => 65,
        "Umi Sushi Buckhead" => 40.5,
        "Fandangles" => 30,
        "Capital Grille" => 60.5,
        "Canoe" => 35.5,
        "One Flew South" => 21,
        "Fox Bros. BBQ" => 15,
        "South City Kitchen Midtown" => 29
    );
    echo "No Sort: <table>";
    foreach ($restaurants as $name => $price){
        echo "<tr><td>".$name."</td><td>".$price."<td></tr>";
    }
    echo "</table>";
    echo "<br/>";
    
    asort($restaurants);
    echo "Price Sort: <table>";
    foreach ($restaurants as $name => $price){
        echo "<tr><td>".$name."</td><td>".$price."<td></tr>";
    }
    echo "</table>";
    echo "<br/>";
    
    ksort($restaurants);
    echo "Name Sort: <table>";
    foreach ($restaurants as $name => $price){
        echo "<tr><td>".$name."</td><td>".$price."<td></tr>";
    }
    echo "</table>";
?>

<br/>
<br/>

Question 5
<br/>

<form method="post" action="formReader.php">
    Hamburger Quanitity: <input type: = "text" name = "burgers">
    <br/>
    Chocolate Milk Quantity: <input type: = "text" name = "milk"> 
    <br/>
    Pop Quantity: <input type: = "text" name = "pop">
    <br/>
    <input type = "submit" value = "Submit">
</form>

<?php

?>