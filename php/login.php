<?php
//session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "bowling_green_services";
$message = "";
if(isset($_SESSION["username"])) {
  header("location:login_success.php");
}
try
{
     $connect = new PDO("mysql:host=$host; dbname=$database", $dbusername, $dbpassword);
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     if(isset($_POST["login"]))
     {
       $username = ($_POST["username"]);
       $password = $_POST["password"];
       $passwordHashing = sha1($password);
       $query = "SELECT * FROM user WHERE username = :username AND password = :password";

       $statement = $connect->prepare($query);
       $statement->bindValue(':username', $username);
       $statement->bindValue(':password', $passwordHashing);
       $result = $statement->execute();
       if($result > 0)
       {
            $_SESSION["username"] = $_POST["username"];
            session_start();
            header("location:../index.html");
       }
       else
       {
            $message = '<label>Wrong Data</label>';
       }
     }
}
catch(PDOException $error)
{
     $message = $error->getMessage();
	 echo $message;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Your Town - Login</title>
        <link href="../cssFiles/form_style.css" type="text/css" rel="stylesheet" />
    </head>
<html>
    <body id="page6">
        <div class="topNav">
            <ul>
                <li class="title"><h2>Welcome to Bowling Green</h2></li>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../visit.html" id="tToQ">Visit here</a></li>
                <li><a href="../eat.html" id="tToS">Eat here</a></li>
                <li><a href="../living.html" id="tToA">Live here</a></li>
                <li class="right"><a href="register.php">Register</a></li>
                <li class="right"><a class="active" href="login.php">Login</a></li>
            </ul>
        </div>

        <div class="box">
            <h2>Login to Your Town</h2>
            <form method="post">
                <div class="inputBox">
                    <input type="text" name="username" required/>
                    <label>Username</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required/>
                    <label>Password</label>
                </div>
                <input type="submit" name="login" value="Login"/>
            </form>
        </div>
    </body>
</html>
