<?php
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  if(!isset($_SESSION["username"])) {
    echo "NOT LOGGED IN";
    die();
  }
  $stars = $_GET["rating"];
  $comment = $_GET["comment"];
  $service_id = $_GET["id"];
  $username = $_SESSION["username"];

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $database = "bowling_green_services";
  try{
    $connect = new PDO("mysql:host=$host; dbname=$database", $dbusername, $dbpassword);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO rating (Comment, Stars, UserName, ServiceID) VALUES (:comment, :stars, :username, :serviceID)";

    $statement = $connect->prepare($query);
    $statement->bindValue(':comment', $comment);
    $statement->bindValue(':stars', $stars);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':serviceID', $service_id);
    $result = $statement->execute();
  }
  catch(PDOException $error) {
       echo $error;
       return null;
  }
?>