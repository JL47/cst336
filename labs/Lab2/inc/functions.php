<?php
function displaySymbol($randomValue,$pos)
        {
            //$randomValue = rand(0,4);//Generate random num from 0-4
            switch($randomValue)
            {
                case 0: $symbol = "seven";
                    break;
                case 1: $symbol = "cherry";
                    break;
                case 2: $symbol = "lemon";
                    break;
                case 3: $symbol = "grapes";
                    break;
                case 4: $symbol = "orange";
                    break;
            
            }
         echo "<img id = 'reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."'width='70'>";
        
        
        }
        
function displayPoints($randomValue1, $randomValue2,$randomValue3)
        {
            
            echo "<div id = 'output'>";
          
            if($randomValue1==$randomValue2 && $randomValue2==$randomValue3)
            {
                switch($randomValue1)
                {
                    case 0: $totalPoints = 1000;
                        echo "<h1>Jackpot</h1>";
                        break;
                    case 1: $totalPoints = 500;
                        echo $totalPoints;
                        break;
                    case 2: $totalPoints = 250;
                        break;
                    case 3: $totalPoints = 200;
                        break;
                    case 4: $totalPoints = 150;
                        break;
                }
                
                echo "<h2>you won $totalPoints points!<h2>";
                
            }
            else
            {
                echo "<h3>Try Again!</h3>";
            }
            echo "</div>";
        }
        
function play()
{
    for ($i=1;$i<4;$i++)
        {
            ${"randomValue".$i} = rand(0,4);
            displaySymbol(${"randomValue" .$i}, $i );
        }
        displayPoints($randomValue1,$randomValue2,$randomValue3);
}
?>