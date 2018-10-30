<?php

$animals = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

function yearList($startYear,$LastYear)
{
    global $animals;
    $zoidiacCounter=0;
    for ($i=$startYear;$i<$LastYear;$i++)
    {
       $sum=0;
        $sum+=1;
        if ($i == 1776)
        {
            echo "<li> Year: $i USA Independence</li>";
        }
        if($i%100==0)
        {
            echo "<li>Happy New Century Year: $i </li>";
        }
        echo "<li> Year:" . $i;
       // echo "img/$animals[$zodiacCounter].png";
        echo "</li>";
        if($zodiacCounter >= 12)
            {
                $zodiacCounter=0;
            }
        else
        {
            
        }
        
        
            
        
    }
    return sum;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Chinese Zodiac  </title>
        
        <h1>Chinese Zodiac</h1>
    </head>
    <body>
        <ul>
            <?= yearList(100,200) ?>
        </ul>
        <form>
           Start <input type="number" name="start"/> 
            <br>
            <br>
           End <input type="text" name="end"/>
            
            <input type="submit" name="Submit"/>
        </form>
    </body>
</html>