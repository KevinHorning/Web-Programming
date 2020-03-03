Number of Burgers: <?php echo $_POST["burgers"]; ?>
<br>
Number of Milk: <?php echo $_POST["milk"]; ?>
<br/>
Number of Pops: <?php echo $_POST["pop"]; ?>
<br/>
<br/>
Your Total:
<?php
    $preTax = (int)($_POST["burgers"])*2.475 + (int)($_POST["milk"])*1.95 + (int)($_POST["pop"])*.85;
    $cost = $preTax + $preTax*.075 + $preTax*.016;
    echo "$".number_format($cost, 2);
?> 
