<?php
   $color = $_POST["carColor"];
   $model = $_COOKIE["model"];
   $photoPath = '"photos/'.$color.$model.'.jpg"';
?>

<html>
   <head>
      <title>Photo</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <h1> Next car for <?php echo $_COOKIE["firstName"]; ?>: </h1>
      
      <img src = <?php echo $photoPath; ?> >

      <br/>
      <a href = "order01.php"> Link to beginning </a>
   </body>
</html>