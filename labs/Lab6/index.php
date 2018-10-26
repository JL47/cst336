<?php

include '../../inc/dbConnection.php';

$dbConn = startConnection();

function displayCategories(){
    global $dbConn;
    $sql="SELECT * FROM om_category ORDER BY catName";
    $stmt=$dbConn->prepare($sql);
    $stmt->execute();
    $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);

    echo "<hr>";

    foreach($records as $record)
    {
        echo "<option value='".$record['catId']."'>".$record['catName']. "</option>";
    }
}
function filterProducts(){
    global $dbConn;
    $product = $_GET['productName'];
    
    
    $namedParameters = array();
    $sql="SELECT * FROM om_product WHERE 1"; //Getting all records from database
    
    if(!empty($product))
    {   //Prevents SQL injection
        $sql .= " AND productName LIKE :product";
        $namedParameters[':product']="% $product%";
    }
    if(!empty($_GET['category']))
    {
        //Prevents SQL injection
        $sql .= " AND catId = :category";
        $namedParameters[':category']= $_GET['category'];
    }
    //echo $sql;
    
    if(!empty($_GET['priceFrom'])) //Checks if user entered data in priceFrom textbox
    {
        $sql .= " AND price >= :priceFrom";
        $namedParameters[':priceFrom']= $_GET['priceFrom'];
    }
    if(!empty($_GET['priceTo']))
    {
        $sql .= " AND price <= :priceTo";
        $namedParameters[':priceTo']= $_GET['priceTo'];
    }
    
    if(isset($_GET['orderBy']))
    {
        if($_GET['orderBy'] == "productPrice")
        {
            $sql .= " ORDER BY price";
        }
        else
        {
            $sql .= " ORDER BY productName";
        }
    }
    
    
    
    $stmt=$dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
   
   foreach($records as $record)
   {
       echo "<a href=\'productInfo.php?productId=".$record['productId']. "\"> History </a>";
       echo $record['productName']; 
       echo "</a>";
       echo $record['productDescription'] . $record['price'] . " <br><br>";
   }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6  </title>
    </head>
    <body>
        <h1>Ottermart</h1>
        <h2>Product Search</h2>
        
        
        <form>
            Product: <input type="text" name ="productName" placeholder="Product Keyword"/>
           <br>
            Category: <select name ="category">
                <option value="">Select One</option>
                <?=displayCategories()?>
            </select>
            <input type="submit" name="submit" value="Search!"/>
            
            Price: From: <input type="text" name="priceFrom"/>
             To: <input type="text" name ="priceTo"/>
            <br>
            Order By:
             Price: <input type="radio" name="orderBy" value="productPrice" />
             Name: <input type="radio" name="orderBy" value="productName" />
            <br>
        </form>
        <?= filterProducts()?>
        
    </body>
</html>