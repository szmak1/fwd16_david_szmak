<?php
//including t he database connection file
include_once("config.php");
//include_once("config_local.php");
  
//getting id of the data from url
$aircraftId = $_GET['aircraftId'];
 
//deleting the row from table
$sql = "DELETE FROM aircraft WHERE aircraftId=:aircraftId";
$query = $pdo->prepare($sql);
$query->execute(array(':aircraftId' => $aircraftId));
 
//redirecting to the display page (index.php in our case)
header("Location:aircraft.php");
?>

