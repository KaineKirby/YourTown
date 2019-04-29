<?php
include "php/QueryDatabase.php";
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
  <script src="javascripts/controlOperations.js" type="text/javascript"></script>
  <script src="javascripts/jquery.js" type="text/javascript"></script>
  <script src="javascripts/commentsOperations.js" type="text/javascript"></script>

</head>
    <body id="page2">
        <?php
          include "php/navigation.php";
        ?>
        <div id="comments"></div>
        <?php
          if(isset($_SESSION["username"])) {
        ?>
        <div class="user_rating">
          <div class="userForm">
            <p id="formTitle">Leave a rating and a comment</p>
            <br>
            <textarea id="newComment" name="userComment" rows="8" cols="80" maxlength="10000"></textarea>
            <br>
            <input type="radio" name="stars" value="0">0
            <input type="radio" name="stars" value="1">1
            <input type="radio" name="stars" value="2">2
            <input type="radio" name="stars" value="3">3
            <input type="radio" name="stars" value="4">4
            <input type="radio" name="stars" value="5">5<br>
            <button id="commentBtn" name="button">Submit</button>
          </div>
        </div>
        <?php } ?>
    </body>
</html>
