<?php
include '../inc/dbConnection.php';
$dbConn = startConnection("cars");
session_start();
include 'functions/functions.php';

validateSession();

if(isset($_GET["size"])){
    
    $worth = inventoryTotal();
    
    //print_r($worth);
    //return $worth;
    $worth["price"];
}
if(isset($_GET["minCar"])){
    $cheap  = cheapestCar();
    //print_r($cheap);
    return $cheap;
}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Admin Main Page</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
            function cheapCar(){
                $.ajax({

                    type: "GET",
                    url: "api/cheapCar.php",
                    dataType: "json",
                    data: { "car_id": $(this).attr('car_id') },
                    success: function(data, status) {
                        //alert("test");
                        $("#car_modal").html(data.modal);
                        $("#price").html("Price: $"+data.price);
                        $("#img").attr('src', data.image);

                       
                    },
	          }); // ajax closing
            }
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Really??");
                
            }
            $("document").ready(function(){
               
              $("#expCar").click(function(event){
                   $('#car').modal("show");
                 $.ajax({

                    type: "GET",
                    url: "api/expCar.php",
                    dataType: "json",
                    data: { "car_id": $(this).attr('car_id') },
                    success: function(data, status) {
                        //alert("test");
                        $("#car_modal").html(data.modal);
                        $("#price").html("Price: $"+data.price);
                        $("#img").attr('src', data.image);
                        cheapCar();
                       
                    },
	          }); // ajax closing
                   
               }); //end of click event
                
            });
            
        </script>
    </head>
    <body>
        <h1>Admin Section -- Car Sales</h1>
        <h3>Welcome <?= $_SESSION['adminFullName'] ?></h3>
        <br>
       
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
        <a class="nav-link" href="adminPage.php?minCar=" id="minCar" name="minCar">Cheapest Car</a>
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
       <?php
        
        
       ?>
            <!--<form>-->
            <!--    <input type="submit" name="cheapCar" value="Affordable Car"/>-->
            <!--</form>-->
            <input class="btn btn-primary " type="button" id="cheapCar" name="cheapCar" value="Most Affordable">

            <input class="btn btn-primary " type="button" id="expCar" name="expCar" value="Expensivest">
           
        <br>
        <br>
       <div class="modal fade" id="car" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="car_modal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="container"></div>
        <div>
	      <div id="modal"></div>
	      <img id = "img" src="" style="width:400px;">
	      <div id="price"> Price: $</div>
	      
	      
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          
          
          <div class="modal fade" id="cheap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="car">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="container"></div>
        <div>
	      <div id="modal"></div>
	      <img id = "img" src="" style="width:400px;">
	      <div id="price"> Price: $</div>
	      
	      
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
        <?php displayAllCars(); ?>
        
               
          
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <?php
        include 'inc/footer.php';
        ?>
    </body>
</html>