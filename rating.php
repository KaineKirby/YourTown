<?php

if(isset($_SESSION["username"])) {
  header("location:login_success.php");
}

?>
<!DOCTYPE html>
<html>
<!--Austin Cultra, Austin Kirby, Lana Therrien, Group Project-->
<head>
  <title>Places To Go</title>

  <meta charset="utf-8" />
  <link href="cssfiles/serviceStyle.css" type="text/css" rel="stylesheet" />
  <script src="javascripts/controlOperations.js" type="text/javascript"> </script>

</head>
    <body id="page2">
        <!--TOP NAV element-->
        <?php
          include "php/navigation.php";
        ?>
        <div class="rating">
        </div>
    </body>
</html>
