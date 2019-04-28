<?php
session_start();
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "bowling_green_services";
try
{
     $connect = new PDO("mysql:host=$host; dbname=$database", $dbusername, $dbpassword);
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     if(isset($_POST["register"]))
     {
       $username = $_POST["username"];
       $password = $_POST["password"];

       $sql = "SELECT COUNT(username) AS num FROM user WHERE username = :username";
       $stmt = $connect->prepare($sql);

       $stmt->bindValue(':username', $username);

       $stmt->execute();

       $row = $stmt->fetch(PDO::FETCH_ASSOC);

       if($row['num'] > 0) {
         die('That username already exists');
       }

       $passwordHashing = sha1($password);

       $query = "INSERT INTO user VALUES (:username, :password)";
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
	 echo $message;

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Your Town - Register</title>
        <link href="cssFiles/form_style.css" type="text/css" rel="stylesheet" />
    </head>
<html>
    <body id="page5">
      <?php
        include "php/navigation.php";
      ?>
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
