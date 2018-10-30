<?php
$numofPasswords = $_GET["numberofPasswords"];
$passwords=array();

 if ($numofPasswords > 8)
    {
        echo ("Error!!: Only 8 passwords ");
    }
    


function()
{
    $numberofPasswords = range(0,$numberofPasswords);
    
    $passwords=rand(0,10);
}

?>