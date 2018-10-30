<?php
session_start();

if (!isset($_SESSION['adminFullName'])) {
    
    header("Location: index.php");  //redirects users who haven't logged in 
    exit;
}

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

include 'inc/functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            form {
                display: inline-block;
            }
        </style>
    </head>
    <body>
        
        <h1> ADMIN SECTION - OTTERMART </h1>
        
         <h3>Welcome <?= $_SESSION['adminFullName'] ?> </h3>

          <form action="addProduct.php">
              <input type="submit" value="Add New Product">
          </form>
         <form action="logout.php">
              <input type="submit" value="Logout">
          </form>

           <br><br>
        
        <?= displayAllProducts() ?>
        

    </body>
</html>