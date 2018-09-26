<!DOCTYPE html>
<html>
    <header>
        <title>Sports Cars Generator</title>
        <h1>Sports Cars</h1>
        
        <style>
             @import url("css/style.css");
        </style>
    </header>
    <body>
        <div>
            <?php
            include 'func/functions.php';
            shuffleCars();
            
        ?>
        </div>
        <form><input type="submit" value="Refresh"/></form>
        
        
    </body>
    <br>
    <footer>
        <strong>Note:</strong>This is for educational purposes only. All images were found online.
    </footer>
</html>

