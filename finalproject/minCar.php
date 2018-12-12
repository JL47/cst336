<?php
session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("cars");

include 'functions/functions.php';
validateSession();
// global $dbConn;
// if(isset($_GET['cheapCar'])){
//     if(isset($_GET['car_id'])){
//         $cheap = cheapestCar($_GET['car_id']);
//         echo "[<a href='minCar.php?car_id=" . $record['car_id']."'>Cheap Car</a>]";
//         print_r($cheap);
//     }
// }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cheapest Car</title>
    </head>
    <body>
        <h1>Most Affordable Car</h1>
        <form>
            <input type="hidden" name="car_id" value="<?=$cheap['car_id']?>">

        Car Modal: <input type="text" name="modal" value="<?=$cheap['modal'] ?>"> <br>
        Car Image: <input type="text" name="image" value=""><br>
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
        
        <!--<input class="btn btn-primary" type="submit" name="updateCar" value="Update Car"/>-->
        </form>
        

    </body>
</html>