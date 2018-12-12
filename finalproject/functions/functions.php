<?php
function validateSession()
{
    if (!isset($_SESSION['adminFullName'])) {
    
    header("Location: adminLogin.php");  //redirects users who haven't logged in 
    exit;
    }
}
function displayAllCars(){
    global $dbConn;
    
    $sql = "SELECT * FROM allcars ORDER BY modal";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            echo "<table class='car_table'>";
            echo "<tr>";
            echo "<th>Car Modal</th> <th>Year</th> <th>Price</th>";
            echo "</tr>";
    foreach($records as $record){
           // echo $record["car_id"] . ",";
            echo "<tr><td>" .  $record["modal"] . "</td>";
            echo "<td>" . $record["year"] ."</td> ";
            echo "<td> $" . $record["price"] . "  </td>";
            //echo "<div id = 'pic'>";
            echo "<td><img class='car' src= " . $record["image"] . "> </td></tr>";
            //echo "</div>";
            echo "</table>";
            echo "<br>";
            
            echo "[<a href='updateCar.php?car_id=" . $record['car_id']."'>Update</a>]";
            echo "<form action='deleteCar.php' onsubmit='return confirmDelete()'>";
                    echo "   <input type='hidden' name='car_id' value='".$record['car_id']."'>";
            echo "<button class='btn btn-danger' type='submit'>Delete</button>";
            echo "</form>";
            //echo "</div>";
            //echo "<a href=updateCar.php?car_id=" . $record["car_id"] .  ">";
            
        }
        //return $records;
}
function getCarinfo($car_id){
    global $dbConn;
    
    $sql = "SELECT * FROM allcars WHERE car_id = $car_id";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch(PDO:: FETCH_ASSOC);
    
    //print_r($records);
   
    return $records;
}
function inventoryTotal(){
    global $dbConn;
    
    $sql = "SELECT SUM(price) FROM allcars";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    print_r($record);
    //return $record;
}
function cheapestCar(){
    global $dbConn;
    
    $sql = "SELECT * FROM allcars ORDER BY price ASC limit 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch();
    
    
    print_r($records);
    
}
function displayBrands(){
    global $dbConn;
    
    $sql = "SELECT * FROM brands";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $i = 1;
    foreach($records as $record){
       if(!empty(getBrandID())){
           if($i == getBrandID()){
               $selected = "selected";
           }
           else {
               $selected = "";
           }
           
       }
       else {
               $selected = selectCategory($record["brand_id"]);
           }
           
           echo "<option value='".$record['brand_id']."' ".$selected.">".$record['brand'] . "</option>";
           $i++;
       
    }
    

}
function selectCategory($brandID) {
        if ($_GET["brand_id"] == $brandID) {
            return "selected";
        }
    }
//function selectbrandID()
function getBrandID(){
    global $dbConn;
    $carModal = $_GET["modal"];
    if(!empty($carModal)){
        $sql = "SELECT * FROM `allcars` WHERE modal = '$carModal'";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $brandID = $records[0]["brand_id"];
    }
    return $brandID;
}
function returnBrandID(){
    global $dbConn;
    $brand_id = $_GET["brand_id"];
    
    if(!empty($brand_id)){
        $sql = "SELECT brand_id FROM brands";
    }
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    print_r($records);
    
    foreach ($records as $record){
         echo "<option value='".$record['brand_id']."' ".$selected.">".$record['brand_id'] . "</option>";
    }
}
?>