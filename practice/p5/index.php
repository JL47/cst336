<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Custom Password Generator </title>
        <h1>Custom Password Generator</h1>
    </head>
    <body>

    <form method ="GET">
        How many passwords
        <input type="text"name="numberofPasswords" size="5"  value="numberofPasswords"/>
        
        
        No more than 8 passwords!
        <br>
        <br>
        
        <strong>Password Length</strong>
        <br>
        <input type="radio" name="length" value="6">
        <?php
        if($_GET['length']=="6")
                    {
                        echo "checked";
                    }
        ?>
        <label for="six">6 characters</label>
        
        <input type="radio" name="length" value="8">
        <?php
        if($_GET['length']=="8")
                    {
                        echo "checked";
                    }
        ?>
        <label for="eight">8 characters</label>
        
        <input type="radio" name="length" value="10">
         <?php
        if($_GET['length']=="10")
                    {
                        echo "checked";
                    }
        ?>
        <label for="ten">10 characters</label>
        
        <br>
        <br>
        
        <input type="checkbox" name="includeDigits">
          Include digits (up to 3 digits will be part of the password)  
          
          <br>
          <br>
          
          <input type ="submit" value="Submit Password"name="Submit" >
          <br>
          <br>
          
          
    </form>
    <form action="displayPassword.php">
        <input type="submit" value="Display password history" name="passwordHistory"/>
        
    </form>
    
    </body>
</html>