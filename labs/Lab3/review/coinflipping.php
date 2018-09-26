<?php
session_start();
//session_destroy();//removes all values
if(isset($_SESSION['heads']) )
{
    $_SESSION['heads'] = 0;
    $_SESSION['tails']=0;
    $_SESSION['tossHistory']= array();
}
if(rand(0,1)==0)
{
    $_SESSION['heads']++;
    $_SESSION['tossHistory'][] = "H";
}
else
{
    $_SESSION['tails']++;
    $_SESSION['tossHistory'][]="T";
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Coin Flipping </title>
    </head>
    <body>
        
        <h2>Number of Heads: <?=$_SESSION['heads']?> </h2>
        <h2>Number of Tails: <?=$_SESSION['tails'] ?></h2>
        
        
    </body>
</html>