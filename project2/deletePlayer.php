<?php

session_start();


if (isset($_GET["removePlayer"])){
    
    $removePlayer = $_GET["removePlayer"];
    unset($_SESSION["scart"][$removePlayer]);
    $_SESSION["scart"] = array_values($_SESSION["scart"]);
    header("Location: scart.php");
}

    
 
// echo"DEBUG: " . $removePlayer;
   

    
    //  $removePlayer;
    // include "dbConnection.php";
    // $dbConn = getDatabaseConnection("sports");
   
    
    
   
    
 

?>