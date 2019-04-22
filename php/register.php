<?php
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "bowling_green_services";
$message = "";
try
{
     $connect = new PDO("mysql:host=$host; dbname=$database", $dbusername, $dbpassword);
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     if(isset($_POST["register"]))
     {
       $username = !empty($_POST["username"]) ? trim($_POST["username"]) : null;
       $password = !empty($_POST["password"]) ? trim($_POST["password"]) : null;

       $sql = "SELECT COUNT(username) AS num FROM user WHERE username = :username";
       $stmt = $connect->prepare($sql);

       $stmt->bindValue(':username', $username);

       $stmt->execute();

       $row = $stmt->fetch(PDO::FETCH_ASSOC);

       if($row['num'] > 0) {
         die('That username already exists');
       }

       $passwordHashing = sha1($password);

       $query = "INSERT INTO user (username, password) VALUES (:username, :password)";
       $statement = $connect->prepare($query);
       $statement->bindValue(':username', $username);
       $statement->bindValue(':password', $passwordHashing);
       $result = $statement->execute();
       if($result) {
         echo 'You have successfully registered.';
         header("location:login.php");
       }
     }
}
catch(PDOException $error)
{
     $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Your Town - Register</title>
        <link href="../cssFiles/form_style.css" type="text/css" rel="stylesheet" />
        <link href="../cssFiles/style.css" type="text/css" rel="stylesheet" />
    </head>
<html>
    <body id="page1">
      <div class="topNav">
          <ul>
              <li class="title"><h2>Welcome to Bowling Green</h2></li>
              <li><a href="../index.html">Home</a></li>
              <li><a href="visit.html" id="tToQ">Visit here</a></li>
              <li><a href="eat.html" id="tToS">Eat here</a></li>
              <li><a href="living.html" id="tToA">Live here</a></li>
              <li class="right"><a class="active" href="register.php">Register</a></li>
              <li class="right"><a href="login.php">Login</a></li>
          </ul>
      </div>
        <div class="box">
            <h2>Create Your Town Account</h2>
            <form method="post">
                <div class="inputBox">
                    <input type="text" name="username" required/>
                    <label>Username</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required/>
                    <label>Password</label>
                </div>
                <input type="submit" name="register" value="Register"/>
            </form>
        </div>
    </body>
</html>