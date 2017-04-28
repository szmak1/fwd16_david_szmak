<?php
//including t he database connection file
include_once("config.php");
//include_once("config_local.php");
 
//getting id of the data from url
$roleId = $_GET['roleId'];
 
//deleting the row from table
$sql = "DELETE FROM role WHERE roleId=:roleId";
$query = $pdo->prepare($sql);
$query->execute(array(':roleId' => $roleId));
  
//redirecting to the display page (index.php in our case)
header("Location: role.php");
?>

