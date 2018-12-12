<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("cars");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM car_admin
                 WHERE username =:username 
                 AND  password =:password ";                 
$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC);



if (empty($record)) {
    
    echo "Wrong username or password!!";
} else {
   
   $_SESSION['adminFullName'] = $record['firstname'] .  "   "  . $record['lastname'];
   header('Location:adminPage.php'); //redirects to another program
    
}

?>