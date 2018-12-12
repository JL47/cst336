<?php
session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("cars");

include 'functions/functions.php';

validateSession();
if (isset($_GET['newCar'])) { //checks whether the form was submitted
    
    $modal = $_GET['modal'];
    $image =  $_GET['image'];
    $price =  $_GET['price'];
    $brand =  $_GET['brand'];
    $brand_id = $_GET['brand_id'];
    $year = $_GET['year'];
    
    
    $sql = "INSERT INTO allcars (modal, image, brand,brand_id,price, year) 
            VALUES (:modal, :image, :brand, :brand_id, :price, :year);";
    $np = array();
    $np[":modal"] = $modal;
    $np[":image"] = $image;
    $np[":brand"] = $brand;
    $np[":brand_id"] = $brand_id;
    $np[":price"] = $price;
    $np[":year"] = $year;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    //echo "New Car was added!";
    header("Location: adminPage.php");
}
if(isset($_GET['newCar'])){
    echo "Must fill out the form";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adding New Car</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link  href="css/styles.css" type="text/css" >

    </head>
    <body>
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
        
        <form id ="adding">
            <h1>Add to Car Inventory</h1>
           
        Car Modal: <input type="text" name="modal"> <br>
        Car Image: <input type="text" name="image"><br>
        Car Brand: <select id = "brand "name="brand">
                    <option value="">- None -</option>
                        <?php displayBrands() ?>
                </select> <br>
        Car Brand ID:<input type="text" name="brand_id">
           
            <div id="listofBrand_id" >
                <strong>Number of ID (1-9): Order of Brands</strong>
            </div> <br>
        Price: <input type="text" name="price"> <br><br>
        Year: <input type="text" name="year"><br>
        <input class="btn btn-primary" type="submit" name="newCar" value="Add Car"/>
        </form>
        
        <?php
        include 'inc/footer.php';
        ?>
    </body>
</html>