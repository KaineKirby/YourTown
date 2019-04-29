<?php
include "php/QueryDatabase.php";
$ratingValues = generateView2(queryServiceId(1));
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
        <?php
          include "php/navigation.php";
        ?>
        <div class="rating">
          <form class="" action="index.html" method="post">
            <strong>Leave a rating and a comment</strong>
            <br>
            <textarea name="name" rows="8" cols="80" maxlength="10000"></textarea>
            <br>
            <button type="submit" name="button">Submit</button>
          </form>

          <?php
            echo $ratingValues;
          ?>
        </div>
    </body>
</html>
