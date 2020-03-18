<?php
    session_start();

    if ($_POST["logout"]){
    // only true if logout button clicked
        Session_unset();
        header("Location: login.html");
        exit;
    }
    if ($_SESSION["username"] == "" && $_SESSION["password"] == ""){
        if ($_POST["username"] == "" && $_POST["password"] == ""){
            header("Location: login.html");
            exit;
        }
        else {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            $postback = FALSE;
        }
    }
    else {
        $box1 = $_POST["box1"];
        $box2 = $_POST["box2"];
        $postback = $_POST["postback"];
    }
?>

<html>
  <head>
    <title>Protected</title>
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="pageContainer">
      <h2 class="centerText"> Hello  <?php echo $_SESSION["username"]; ?> </h2>
      <form action="protected.php" class="formLayout" method = "post">
        <div class="formGroup">
          <label></label>
          <p class = "formElements"> <?php 
            if (!$postback && strlen($box1) < 1) echo "Enter a value:" ?> </p>        
          <label> Box1: </label>
          <input type="textbox" name="box1" value = "<?php echo $box1; ?>" 
                 pattern = "[A-Za-z'-]{2,20}" autofocus required> <br/>
          <label></label>
          <p class = "formElements"> <?php 
            if (!$postback && strlen($box2) < 1) echo "Enter a value:" ?> </p>
          <label> Box2: </label>
          <input type="textbox" name="box2" value = "<?php echo $box2; ?>" 
                 pattern = "[A-Za-z'-]{2,20}" required>
          <input type = "hidden" name = "postback" value = "true">
          <input type = "hidden" name = "abandon" value = "false">                
        </div>
        <div class="formGroup">
          <input type = "submit" name = "submit" value = "Submit">
        </div>
        <div class="formGroup">
          <input type = "submit" name = "logout" value = "Logout">
        </div>
      </form>
    </div>
  </body>
</html>

<?php
    $box1 = $_POST["box1"];
    $box2 = $_POST["box2"];
    $hidden = $_POST["postback"];

?>