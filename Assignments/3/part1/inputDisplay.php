Here is your input:
<br/>
<br/>
Email: 
<?php 
    if ($_POST["email"] == "Email" || sizeof($_POST["email"]) == 0)
        echo $_POST["email"]."<pre> Required Field </pre>";
?> 
<br/>
First Name: <?php echo $_POST["firstName"] ?>  
<br/>
Birthday: <?php echo $_POST["birthday"] ?> 
<br/>
Age: <?php echo $_POST["age"] ?>
<br/>
State: <?php echo $_POST["state"] ?> 
<br/>
Zip: <?php echo $_POST["zip"] ?> 
<style>
    pre {
        color: red;
        margin: 0px;
        display: inline;
    }
</style>