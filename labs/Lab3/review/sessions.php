<?php
session_start();

$_SESSION["name"] = "Jorge";
$_SESSION["course"]="CST 336 Internet Programming";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Set Session Variables</title>
    </head>
    <body>
        Name is <?= $_SESSION["name"]?>
        <h2> Course is <?= $_SESSION["course"] ?></h2>
    </body>
</html>