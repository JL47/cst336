<?php
include '../inc/dbConnection.php';
$dbConn = startConnection("cars");

    //$sql = "SELECT car_id  FROM allcars ORDER BY price DESC limit 1";
    $sql = "SELECT * FROM allcars ORDER BY price DESC limit 1";
    $stmt=$dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);
    echo json_encode($record);
    

?>