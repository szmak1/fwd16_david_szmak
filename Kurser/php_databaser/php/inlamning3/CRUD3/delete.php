<?php
//including the database connection file
include_once("config.php");
//include_once("config_local.php");
 
//getting id of the data from url
$idsong = $_GET['idsong'];
 
//deleting the row from table
$sql = "DELETE FROM song WHERE idsong=:idsong";
$query = $pdo->prepare($sql);
$query->execute(array(':idsong' => $idsong));
 
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>


