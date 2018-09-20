   <?php
        function getMyLuckyNumber()
        {
                do 
                {
                    $lucky=rand(1,10);
                    
                }
                while($lucky==4);
                {
                    echo $lucky;
                }
        }
        
        function randomcolor()
        {
            echo "background-color:rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,10/10.");";
        }
            ?>  

<!DOCTYPE html>
<html>
    <head>
        <title>Random Colors & Numbers</title>
        <style>
            body{
                <?php
                    $red = rand(0,255);
                    echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand((0,10)/10).");"
                ?>
                
            }
        </style>
    </head>
    <body>
        <h1>
            My Lucky number is 
            <?php
                getMyLuckyNumber();
            ?>
           
        </h1>
    </body>
</html>