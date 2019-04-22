<?php
 //login_success.php
 session_start();
 if(isset($_SESSION["username"]))
 {
      echo '<h3>Your Login Was Successful! Welcome to Your Town - '.$_SESSION["username"].'</h3>';
      echo '<br/><br/><a href="logout.php">Logout</a>';
 }
 else
 {
      header("location:login.php");
 }