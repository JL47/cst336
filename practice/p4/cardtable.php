<?php
function playDeck()
{   
    $totalKings = 4;
    $totalAces = 4;
    
    $deck = array("clubs","diamonds","hearts","spades");
    if(isset($_POST['clubs']))
    {
        unset($deck['clubs']);
    }
    if(isset($_POST['diamonds']))
    {
        unset($deck['diamonds']);
    }
    if(isset($_POST['hearts']))
    {
        unset($deck['hearts']);
    }
    if(isset($_POST['spades']))
    {
        unset($deck['spades']);
    }
    
    $card=array_pop($deck);
    
    $suitname=$deck(floor($deck/13));
    
    $cardValue = $card % 13 + 1;
    
    
}

function printGame() {
    $row=0;
    $column=0;
    $deck = range(0, 51);
    shuffle($deck);
    
    if (isset($_POST['row']))
        $row='row';
        
    if (isset($_POST['column']))
        $column='column';
        
    echo '<table>';
    
    for($r=0;$r<$row;$r++)
    {
        echo '<tr>';
        for($c=0;$c<$column;$c++)
        {
            
            echo '<td>';
            playDeck();
            echo '</td>';
           
            
        }
        
            echo '</tr>';
           
    }
    echo '</table>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <table></table>

    </body>
</html>