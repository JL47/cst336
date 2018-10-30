<?php

function displayFrenchLocations($numofPics)
{
    $franceLocs = array("bordeaux", "le_havre", "lyon","montpellier","paris","strasbourg");
   // echo $FranceLocs;
    $destinations = array_rand($franceLocs);
   // echo $destinations;
    //unset($franceLocs[$destinations]);
    echo "<img id='destinations' src='img/France/$destinations.png'  width='200'>";
    
}
function displayMexLocations($numofPics)
{
    $mexicoLocs = array("acapulco","cabos","cancun","chichenitza","huatulco","mexico_city");
    
    $destination = array_rand($mexicoLocs);
    echo "<img id='destination' src='img/Mexico/$destination.png' width='200'>";
}
function displayUSLocations($numofPics)
{
    $usLocs = array("chicago","hollywood","las_vegas","ny","washington","yosemite");
    
    $destination = array_rand($usLocs);
    echo "<img id='destination' src='img/Mexico/$destination.png' width='200'>";
}
function displayMonth()
{
    
}
if(isset($_GET['months']) && isset($_GET['choice']))
{
    include "inc/functions.php";
    
    validateforms();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Winter Vacation Planner </title>
        <h1> Winter Vacation Planner </h1>
        
    </head>
    
    <body>
       
        <form>
           
            <h3>Select Month:</h3>
            <select name="months">
                <option value "">Select One</option>
                <option value="november">November</option>
                <option value="december">December</option>
                <option value="january">January</option>
                <option value="february">February</option>
            </select>
         </form>  
         
         <form>
              <h4>Number of Locations: </h4>
            <input type="radio" name="choice" value="three" <?=($_GET['choice']=="three")?" checked":"" ?>/>Three
            <?php
                    if($_GET['choice']=="three")
                    {
                        echo "three";
                    }
                ?>
            <input type="radio" name="choice" value="four" <?=($_GET['choice']=="four")?" checked":"" ?>/>Four
            <input type="radio" name="choice" value="five" <?=($_GET['choice']=="five")?" checked":"" ?>/>Five
         </form>
           
        <form> 
            <h4>Select Country: </h4>
            <select name="country">
                <option value="usa" <?=($_GET['country']=="usa")?" selected": "" ?>> USA</option>
                <?php
                    if($_GET['country'] == 'usa' && $_GET['choice'] == 'choice')
                    {
                        displayUSLocations('choice');
                    }
                ?>
                <option value="mexico" <?=($_GET['country']=="mexico")?" selected": "" ?>> Mexico</option>
                <?php
                  if($_GET['country'] == 'mexico')
                    {
                        displayMexLocations('choice');
                    }  
                ?>
                <option value="france" <?=($_GET['country']=="france")?" selected": "" ?>> France</option>
                <?php
                    if($_GET['country'] == 'france' && $_GET['choice'] == 'choice')
                    {
                        displayFrenchLocations('choice');
                    }
                ?>
            </select>
        </form>    
            
            <form>
                <h4>Visit Locations in Alphabetical Order: </h4>
                <input type="radio" name="option" value="a-z"/> A-Z
                <input type="radio" name="option" value="z-a"/> Z-A
                
                <br>
                <br>
                
                <input type="submit" value="Create Itinerary" /> 
            </form>
            
            
           <?php
           displayMexLocations('choice');
           displayFrenchLocations('choice'); ?>
            
        
    </body>
    
</html>