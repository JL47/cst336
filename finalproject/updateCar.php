<?php
session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("cars");

include 'functions/functions.php';
validateSession();

if(isset($_GET['updateCar'])){
    $carModal = $_GET['carModal'];
    $carYear = $_GET['year'];
    $price = $_GET['price'];
    $carImg = $_GET['image'];
    $brand = $_GET['brand'];
    $brand_id = $_GET['brand_id'];
    
    $sql = "UPDATE allcars SET modal= :carModal, 
            image = :image,
            brand = :brand, 
            brand_id = :brand_id, 
            price = :price, 
            year = :year
            WHERE car_id = " . $_GET['car_id'];
    
    $np = array();
    $np[":carModal"] = $carModal;
    $np[":brand"] =$brand;
    $np[":brand_id"]=$brand_id;
    $np[":year"]=$carYear;
    $np[":price"]=$price;
    $np[":image"]=$carImg;
    
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    //$record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
}
if(isset($_GET['car_id'])){
    
   $carInfo = getCarinfo($_GET['car_id']);
    
   
   // print_r($carInfo);
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Car Inventory</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    </head>
    <body>
        <h1>Update current car</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">CarFaxx</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="newCar.php">Add Car <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminPage.php">Admin Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminPage.php?minCar" id="minCar" name="minCar">Cheapest Car</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminPage.php?size=" id="size" name="size">Inventory Worth</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
        
        <form>
        <input type="hidden" name="car_id" value="<?=$carInfo['car_id']?>">

            Car Modal <input type="text" name="carModal" value="<?=$carInfo['modal']?>" /> <br>
            Car Brand 
             <select name="brand_id">
              <option value="">Select One</option>
              <?php
              
              $brands = displayBrands();
              
              foreach ($brands as $brand) {
                  
                  echo "<option  "; 
                  echo  ($brand['brand_id']==$carInfo['brand_id'])?"selected":"";
                  echo " value='".$brand['brand_id']."'>". $brand['name'] ."</option>";
                  
              }
              
              ?>
           </select> <br />
            Car Year <input type="text" name="year" value="<?=$carInfo['year'] ?>"/> <br>
            Price <input type="text" name = "price" value="<?=$carInfo['price'] ?>"/> <br>
            Car Image URL <input type="text" name="image" value="<?=$carInfo['image'] ?>"/>
            <br><br>
            <input class="btn btn-primary" type="submit" name="updateCar" value="Update Car"/>
        </form>
    <?php
        include 'inc/footer.php';
        ?>
    </body>
</html>