<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bowling_green_services";
$id; // not sure about this yet
$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully <br>";
try {
  showInfo($conn, $id);
}
// if there is an exception
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage(); // show error
    }

function showInfo($connection, $id) {
  $sql = "SELECT * FROM sevice WHERE idno=$id";
  $stmt = $connect->prepare($sql);

  $stmt->bindValue(':username', $username);

  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

}
?>
