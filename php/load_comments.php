<?php
include "QueryDatabase.php";
$id = $_GET["id"];
$ratingValues = generateView2(queryServiceId($id));
echo $ratingValues;
?>