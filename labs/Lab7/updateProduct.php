<?php
session_start();
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';
validateSession();
if (isset($_GET['updateProduct'])){  //user has submitted update form
    $productName = $_GET['productName'];
    $description =  $_GET['productDescription'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    $sql = "UPDATE om_product SET productName = :productName,
                                   productDescription = :description";
    $np = array();
    $productName=$np[":productName"];
    $description=$np[":productDescription"];
    $image=$np[":productImage"];
    $price=$np[":price"];
    $catId=$np[":catId"];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);
}

if (isset($_GET['productId'])) 
{

  $productInfo = getProductInfo($_GET['productId']);
  
  
  
    print_r($productInfo);
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Products</title>
    </head>
    <body>
        <h1>Update products</h1>
        
        <form>
           Product name: <input type="text" name="productName" value="<?=$productInfo['productName']?>"><br>
           Description: <textarea name="description" cols="50" rows="4"> <?=$productInfo['productDescription']?> </textarea><br>
           Price: <input type="text" name="price" value="<?=$productInfo['price']?>"><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['catId']==$productInfo['catId'])?"selected":"";
                  echo " value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> <br />
           Set Image Url: <input type="text" name="productImage" value="<?=$productInfo['productImage']?>"><br>
           <input type="submit" name="updateProduct" value="Update Product">
        </form>
    </body>
</html>