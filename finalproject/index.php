<?php
session_start();
include '../inc/dbConnection.php';
$dbConn = startConnection("cars");
include 'functions/functions.php';



function checkRadio($orderYear) {
    if ($_GET["orderByyear"] == $orderYear) {
        echo "checked";
    }
}
function checkMinRadio($min){
    if($_GET["range"] == $min){
        echo "checked";
    } 
}
function checkMaxRadio($max){
    if($_GET["max"] == $max){
        echo "checked";
    }
}


function carSearch(){
    global $dbConn;
    $brand = $_GET["brand"];
    $carYear = $_GET["year"];
    //$minMax = "ASC";
    
    $sql = "SELECT * FROM `allcars` WHERE 1";
    $namedParameters = array();
    //echo ($_GET["orderByyear"]);
    if(isset($_GET["brand"]) && !empty($_GET["brand"])){
        $sql .= " AND brand_id =:brand";
        $namedParameters[":brand"] = $_GET["brand"];
        
    }
    if(isset($_GET["orderByyear"]) && !empty($_GET["orderByyear"])){
        $sql .= " AND year =:year";
        $namedParameters[":year"] = $_GET["orderByyear"];
    }
    if(isset($_GET["range"]) && !empty($_GET["range"]))
    {
        if($_GET["range"] == "ASC"){
            $sql .= " ORDER BY price ASC";
        }
        elseif($_GET["range"] == "DESC"){
            $sql .= " ORDER BY price DESC";
        }
        
    }
    if(isset($_GET["search"]) && !empty($_GET["search"])){
        $sql .= " AND modal =:modal OR brand =:brand";
        $namedParameters[":modal"] = $_GET["search"];
        $namedParameters[":brand"] = $_GET["search"];
    }
    
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
          foreach($records as $record){
            echo $record["modal"] . ", ";
            echo $record["year"] .", ";
            echo "$ " . $record["price"];
            echo "<div id = 'pic'>";
            echo "<img src= " . $record["image"] . " style='width:300px'>";
            echo "</div>";
            echo "<br>";
        }
        
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Car Sales </title>
        <link  href="css/styles.css" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    </head>
    <body>

        <h1> Car Sales </h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">CarFaxx</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="adminLogin.php">Administrator's ONLY<span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>
           <br>
        <form>
            Search Car: <input type="text" name="search" id = "s_bar" placeholder="Search"> 
            <br><br>
             Car Brand 
             <select id = "brand "name="brand">
                    <option value="">- None -</option>
                    <?= displayBrands() ?>
                </select> <br>
             <br>
             Year <br>
             <input type="radio" name="orderByyear" id="2019" value="2019"/> 2019 <br>
             <input type="radio" name="orderByyear"id="2018" value="2018"/> 2018 <br> 
             <br>
            Price from: <br>
            Min-Max <input type="radio" name="range" value="ASC"/> <br>
            Max-Min <input type="radio" name="range" value="DESC"/>
            <br><br>
            <?php
                carSearch();
            ?>
            <input type="submit" name="Find Car" />
            
        </form>
        
        <?php
        include 'inc/footer.php';
        ?>
    </body>
</html>