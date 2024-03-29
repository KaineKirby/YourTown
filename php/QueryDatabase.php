<?php


function queryServiceId($id) {
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $database = "bowling_green_services";
  try{
    $connect = new PDO("mysql:host=$host; dbname=$database", $dbusername, $dbpassword);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT Stars, Comment, UserName FROM rating WHERE ServiceID=:id";

    $statement = $connect->prepare($query);
    $statement->bindValue(':id', $id);
    $result = $statement->execute();

    $statement->bindColumn(1, $stars);
    $statement->bindColumn(2, $comment);
    $statement->bindColumn(3, $username);

    $ratingsArray = [];
    while($row = $statement->fetch(PDO::FETCH_BOUND)) {
      $ratings = new stdClass();
      $ratings->stars = $stars;
      $ratings->comment = $comment;
      $ratings->username = $username;

      $ratingsArray[] = $ratings;
    }
    return $ratingsArray;
  }
  catch(PDOException $error) {
       echo $error;
       return null;

  }
}

function queryServiceData($type) {
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $database = "bowling_green_services";
  try{
    $connect = new PDO("mysql:host=$host; dbname=$database", $dbusername, $dbpassword);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT Name, Description, Address, AVG(Stars), COUNT(ServiceID), IDno FROM service LEFT JOIN rating ON IDno = ServiceID WHERE Type = :type GROUP BY IDno";

    $statement = $connect->prepare($query);
    $statement->bindValue(':type', $type);
    $result = $statement->execute();

    $statement->bindColumn(1, $name);
    $statement->bindColumn(2, $description);
    $statement->bindColumn(3, $address);
    $statement->bindColumn(4, $rating);
    $statement->bindColumn(5, $numOfRatings);
    $statement->bindColumn(6, $serviceID);


    $services = [];
    while($row = $statement->fetch(PDO::FETCH_BOUND)) {
      $services = new stdClass();
      $services->name = $name;
      $services->description = $description;
      $services->address = $address;
      $services->rating = $rating;
      $services->numOfRatings = $numOfRatings;
      $services->serviceID = $serviceID;

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
    $serviceID = $service->serviceID;
    if($rating == null) {
      $rating = 0;
    }
    $numOfRatings = $service->numOfRatings;

    $viewStr = $viewStr . "<div class='service'>";
    $viewStr = $viewStr . "<div class='rating_title'><a href= 'rating.php?id=$serviceID'>$name</a></div>";
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

function generateView2($ratingsArray) {
  $viewStr = "";
  foreach ($ratingsArray as $rating) {
    $stars = $rating->stars;
    $comment = $rating->comment;
    $username = $rating->username;
    if($stars == null) {
      $stars = 0;
    }

    $viewStr = $viewStr . "<div class='service'>";
    $viewStr = $viewStr . "<div class= 'description'>$comment</div>";
    $viewStr = $viewStr . "<div class= 'address'>$username</div>";
    $viewStr = $viewStr . "<div class= 'rating'>";

    for($i = 0; $i < 5; $i++) {
      if($i < $stars) {
        $viewStr = $viewStr . "<img class='rating_star' src='images/star-icon.png'>";
      }
      else {
        $viewStr = $viewStr . "<img class='rating_star' src='images/gray-star.png'>";
      }

    }

    $viewStr = $viewStr . "</div>";
    $viewStr = $viewStr . "</div>";
  }
  return $viewStr;
}

?>
