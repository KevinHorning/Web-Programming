<?php
   if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
      $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      header('HTTP/1.1 301 Moved Permanently');
      header('Location: ' . $location);
      exit;
   }
?>

<html>
   <head>
      <title>Login</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer">
         <h2 class="centerText">Login</h2>
         <form action="protected.php" class="formLayout" method = "post">
            <div class="formGroup">
               <label>Username:</label>
               <input type="text" name="username" class="textbox" autofocus required >
               <label>Password:</label>
               <input type="password" name="password" class="textbox" required >
            </div>
            <div class="formGroup">
               <label></label>
               <button type="submit"> >> Next >> </button>
            </div>
         </form>
      </div>
   </body>
</html>