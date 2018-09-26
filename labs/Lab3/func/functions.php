<?php
    $carArray = array("aventador"=> "399,500","huracan"=>"199,800","spider"=>"250,000","488"=>"289,000", "mclarenp1"=>"1.15M ","mclaren720"=>"284,745");

function showImage()
{   global $carArray;
    $car=array_rand($carArray);
    
    unset($carArray[$car]);
    echo "<img id = 'car' src='imgs/$car.jpg' alt='$car' title='".ucfirst($car)."'width='250'>";
    
   // echo carArray[$value];
    
}
//Provides $ symbol according to price ranges 
function ratePrice()
{
    if(is_array($carArray))
    {
        foreach($carArray as $k => $v)
        {
            echo $k;
            if($v > 200000 && $v < 250000)
                echo "$";
            else if($v > 250000 && $v <= 400000)
                echo "$$";
            else 
                echo "$$$";
        }
        
    }
}
function shuffleCars()
{
  
        for ($i=0;$i<3;$i++)
        {
            showImage();
            
        }
        //not being called
       
       
      
}
        
    
    

//echo array_values($carArray);
?>