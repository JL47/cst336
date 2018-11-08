<?php
    session_start();
    
    // print_r($_SESSION["scart"]);
    
    if ($_SESSION["purchaseItem"]) {
        header("Location: index.php");
    }
     
    if (isset($_POST["removeBtn"])) {
        unset($_SESSION["scart"]);
        unset($_SESSION["ids"]);
        header("Location: index.php");
    }
    
    // echo "<form class='button' method='POST'>
    // <input type='submit' name='removeBtn' value='Empty Cart'>
    // </form><br>";
    // echo "<form class='button' method='POST' action='purchaseProduct.php'>";
    
    function displayShopCart() {
        // $subtotal = 0;
         $removePlayer;
        if (!empty($_SESSION["scart"])) {
            // echo "<form id='emptyCart' class='button' method='POST' onsubmit='return confirmEmpty()' style='text-align:center;'>
            //         <input type='submit' name='removeBtn' value='Empty Cart'>
            //     </form>
            echo"   <form id='purchaseProd' class='button' method='POST' action='purchaseProduct.php' style='text-align:center;'>";
            echo "<input type='submit' name='submit' value='Purchase Product(s)'><br><br>";
            // echo "</div><br><br>";
            echo "<table class='cart' border='solid 1px black '></form>"; 
            $j = 0;
            foreach ($_SESSION["scart"] as $item) {
                echo "<tr>";
                 for ($col = 0; $col < 2; $col++) {
                    if (isset($_SESSION["scart"][$j])) {
                        echo "<td style='color:navy;'>";
                        echo $_SESSION["scart"][$j]["name"]."</td><td><img src='".$_SESSION["scart"][$j]["image"]."' width='120' ></td>";
                        echo "<td style='padding-right:10px; margin-left:10px; color:green;'>$".$_SESSION["scart"][$j]["price"]."</td>";
                        echo "<td style='padding-left: 30px;padding-right:30px '>Quantity: <input type='number' name='quant$j' value='1'></td>";
                        echo "<td><form action ='deletePlayer.php' onsubmit='return confirmDelete()'></td>";
                        echo "<input type='hidden' name='removePlayer' value='".$j."'>";
                        echo "<td><button class='btn btn-outline-danger' type='submit' style='margin-right:10px; margin-left:10px;'>Remove</button></td>";
                        echo "</form>";
                    }
                    $j++;
                }
                echo "</tr>";
                // $subtotal += $item['price'];
            }
            // $salestax = 0.0725*$subtotal;
            // $total = $subtotal + $salestax;
            // echo "<tr><td id='purchase' colspan='8' style='text-align: center;'>Subtotal: $$subtotal<br>
            // Sales Tax: $$salestax<br>Total: $$total</td></tr>";
            echo "</table>";
            echo "</form>";
            
            // echo "<br><br>";
            // echo"<form id='purchaseProd' class='button' method='POST' action='purchaseProduct.php' style='text-align:center;'>";
            // echo "<input type='submit' name='submit' value='Purchase Product(s)'><br><br>";
            
            echo "<br><form id='emptyCart' class='button' method='POST' onsubmit='return confirmEmpty()' style='text-align:center;'>";
            echo "<input type='submit' name='removeBtn' value='Empty Cart' style='color:red;'></form>";
            
           
            
        } else {
            echo "<h1 style='color:red;'>Cart is empty</h1>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        
        <script>
        
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Click OK to Remove");
                
            }
            function confirmEmpty() {
                
                //alert();
                //prompt();
                return confirm("You Want to Empty the Entire Cart??");
                
            }
            
        </script>
    </head>
    <body>
        <style>
            @font-face{
                font-family: sportsNight;
                src: url(OldSportsFont.ttf);
                
            }
        </style>
        <div class="main2">
            <div>
                <!--<form id="emptyCart" class="button" method='POST'>-->
                <!--    <input type='submit' name='removeBtn' value='Empty Cart'>-->
                <!--</form>-->
                <!--<form id="purchaseProd" class="button" method='POST' action='purchaseProduct.php'>-->
                <?php displayShopCart(); ?>
            </div>
        </div>
    </body>
</html>