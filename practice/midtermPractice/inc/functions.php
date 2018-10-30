<?php

$usaLocations = array();
$franceLocations = array();
$mexicanLocations=array();
 
 

function validateforms()
{
    // if(isset($_GET['months']) && isset($_GET['choice']))
    // {
    if(!empty($_GET['months']) && !empty($_GET['choice']))
    {
        echo "<h1>ERROR: Select a month and number of locations!</h1>";
        return false;
    }
    return true;
    // }
}

function displayCalendar()
{
    
}

?>