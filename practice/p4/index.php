<?php
    include 'cardtable.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ace vs Kinga </title>
        <h1>Ace vs. Kings</h1>
    </head>
    <body>
    <form action="/cardtable.php">
        Number of Rows: <input type="hidden" name="rows">
        Number of Columns: <input type="hidden"name ="columns">
        
        
    </form>
    <h3>Suit to Omit</h3>
    <select>
        <option value="clubs">Clubs</option>
        <option value="diamonds">Diamnonds</option>
        <option value="hearts">Hearts</option>
        <option value="spades">Spades</option>
    </select>
    <input type="submit" value="Submit">
    
    
    </body>
</html>