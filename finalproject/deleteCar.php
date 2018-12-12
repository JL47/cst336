<?php
session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("cars");
include 'functions/functions.php';

validateSession();
    
$sql = "DELETE FROM allcars WHERE car_id = " . $_GET['car_id'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();
    
    
   echo ("Car deleted");

header("Location: adminPage.php");


?>

