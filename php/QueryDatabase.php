<?php

function queryServiceData($type) {
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $database = "bowling_green_services";

  try{
    $connect = new PDO("mysql:host=$host; dbname=$database", $dbusername, $dbpassword);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT Name, Description, Address, AVG(Stars), COUNT(ServiceID) FROM service LEFT JOIN rating ON IDno = ServiceID WHERE Type = :type GROUP BY IDno";

    $statement = $connect->prepare($query);
    $statement->bindValue(':type', $type);
    $result = $statement->execute();

    $statement->bindColumn(1, $name);
    $statement->bindColumn(2, $description);
    $statement->bindColumn(3, $address);
    $statement->bindColumn(4, $rating);
    $statement->bindColumn(5, $numOfRatings);

    $services = [];
    while($row = $statement->fetch(PDO::FETCH_BOUND)) {
      $services = new stdClass();
      $services->name = $name;
      $services->description = $description;
      $services->address = $address;
      $services->rating = $rating;
      $services->numOfRatings = $numOfRatings;

      $serviceArray[] = $services;
    }
    return $serviceArray;
  }
  catch(PDOException $error) {
       echo $error;
       return null;

  }
}

function generateView($serviceArray) {
  $viewStr = "";
  foreach ($serviceArray as $service) {
    $name = $service->name;
    $description = $service->description;
    $address = $service->address;
    $rating = $service->rating;
    if($rating == null) {
      $rating = 0;
    }
    $numOfRatings = $service->numOfRatings;

    $viewStr = $viewStr . "<div class='service'>";
    $viewStr = $viewStr . "<div class='rating_title'><a href= 'rating.php'>$name</a></div>";
    $viewStr = $viewStr . "<div class= 'description'>$description</div>";
    $viewStr = $viewStr . "<div class= 'address'>$address</div>";
    $viewStr = $viewStr . "<div class= 'rating'>";

    for($i = 0; $i < 5; $i++) {
      if($i < $rating) {
        $viewStr = $viewStr . "<img class='rating_star' src='images/star-icon.png'>";
      }
      else {
        $viewStr = $viewStr . "<img class='rating_star' src='images/gray-star.png'>";
      }

    }

    $viewStr = $viewStr . "</div>";
    $viewStr = $viewStr . "<div class='rating_num'>$numOfRatings Reviews</div>";
    $viewStr = $viewStr . "</div>";
  }
  return $viewStr;
}

?>