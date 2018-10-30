<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';

if (isset($_GET['updateProduct'])){  //user has submitted update form
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    $sql = "UPDATE  m_product` SET productName = :productName,
                                   productDescription = :description";
    $np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":productImage"] = $image;
    $np[":price"] = $price;
    $np[":catId"] = $catId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
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