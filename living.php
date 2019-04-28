<?php
include_once "php/QueryDatabase.php";

$serviceValues = generateView(queryServiceData("live"));
?>
<!DOCTYPE html>
<html>
<!--Austin Cultra, Austin Kirby, Lana Therrien, Group Project-->
<head>
  <title>Places to live</title>

  <meta charset="utf-8" />
  <link href="cssfiles/serviceStyle.css" type="text/css" rel="stylesheet" />
  <script src="javascripts/controlOperations.js" type="text/javascript"> </script>

</head>
    <body>
        <!--nav element-->
        <?php
          include "php/navigation.php";
        ?>

        <!-- Page-->
        <div id="living">
          <?php
            echo $serviceValues;
          ?>
        </div>
    </body>
</html>
