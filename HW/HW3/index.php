<?php
session_start();

//$_SESSION['answer']= 

function validate()
{
    if(empty($keyword) && empty($_GET['choice']))
    {
        echo "Blank!";
    }
    if(empty($_GET[option1]) && empty($_GET[option2]) && empty($_GET[option3])&& empty($_GET[option4]))
    {
        echo "Blank!";
    }
}

function Q1()
{
    if($_GET['choice']=="tobey")
        {
            echo "<br><h1>Correct</h1>";
        }
    if($_GET['choice']=="garfield")
        {
            echo "<br><h1>Wrong</h1>";
        }
    if($_GET['choice']=="banner")
        {
            echo "<br><h1>Wrong</h1>";
        }             
}

function Q2()
{
    //$_SESSION['answer'] = $_GET['user'];
    $keyword = $_GET["user"];
    if(isset($_GET["user"]))
    {
                            
        if($keyword == "New York" or $keyword == "new york")
        {
            echo "Correct!";
        }
        else 
        {
            echo "Wrong!";
        }
                            
    }
}

function Q3()
{   
    
    if($_GET['choice'] == "true")
    {
        echo "<h1> Correct </h1>";    
    }
    if($_GET['choice'] == "false")
    {
        echo "<h1> Wrong! </h1>";
    }
}

function Q4()
{
    if(isset ($_GET['check1']) && ($_GET['check4']))
    {
        echo "<h3>Correct!</h3>";
    }
    if(isset($_GET['check2']))
    {
        echo "<h3>Wrong</h3>";
    }
    if(isset($_GET['check3']))
    {
        echo "<h3>Wrong</h3>";
    }
}

function Q5()
{
    if(isset ($_GET['option1']) && ($_GET['option2'])&& ($_GET['option3']))
    {
        echo "<h3>Correct!</h3>";
       // echo $_GET['option1'],$_GET['option2'],$_GET['option3'];
                       
    }
    if(isset($_GET['option4']))
    {
        echo "<h3>Wrong</h3>";
    }    
}

function Q6()
{
    if(isset ($_GET['option1']) && ($_GET['option2'])&& ($_GET['option3']))
    {
        echo "<h3>Correct!</h3>";
                       
    }
    if(isset($_GET['option4']))
    {
        echo "<h3>Wrong</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> HW3: Quiz </title>
        <h1>Marvel Test</h1>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
    </head>
    <body>
        <div class="Q1">
            <h3>Question 1: Who was the OG Spiderman?</h3>
            
            
            <form method="GET">
            <input type="radio" name="choice" value="tobey" <?=($_GET['choice']=="tobey")?" checked":"" ?>/> Tobey Macguire
           
            <input type="radio" name="choice" value="garfield"<?=($_GET['choice']=="garfield")?" checked":"" ?>/>Andrew Garfield
           
            <input type="radio" name="choice" value="banner" <?=($_GET['choice']=="banner")?" checked":"" ?>/> Bruce Banner
            <?=
                //validate();
                Q1(); 
            ?>
            <br>
           <input type="submit" value="Submit"/>
            </form>
        </div>
        
        
        <div class="Q2">
            <h3>Question 2: Where does Spiderman take place?</h3>
            
            <form method="GET">
                <input type="text" name="user" /> 
                    <?=Q2();?>
                    
                <br>
                <br>
                <input type="submit" value="Submit"/>
            </form>
        </div>
        
        <div class="Q3">
            <h3>Question 3: Is Hulk part of the Avengers?</h3>
            
            <form method="GET">
                <select name="choice">
                <option value="true"  <?=($_GET['choice']=="true")?" checked": "" ?>>True</option>
                <option value="false"  <?=($_GET['choice']=="false")?" checked": "" ?>>False</option>
                     <?=Q3();?>
                </select>
                
                <br>
                <!--<input type="submit" value="Submit"/>-->
            </form>
            
        </div >
        
        <div class="Q4">
            <h3>Question 4: Check all in Marvel Universe.</h3>
            
            <form method="GET">
                
                <input type="checkbox" name="check1" value="thor"<?=($_GET['check1']=="thor")?" checked":"" ?>/> Thor<br>
                <input type="checkbox" name="check2" value="vader"<?=($_GET['check2']=="vader")?" checked":"" ?>/> Vader<br>
                <input type="checkbox" name="check3" value="flash"<?=($_GET['check3']=="flash")?" checked":"" ?>/> The Flash<br>
                <input type="checkbox" name="check4" value="ironman" <?=($_GET['check4']=="ironman")?" checked":"" ?>/> Iron Man
                
                <?=Q4();?>
                <br>
                <input type="submit" name="Submit"/>
            </form>
        </div>
            
        <div class="Q5">
            <h3>Question 5: What are Thor's superpowers excluding his hammer</h3>
            
            <form method="GET">
                
                <input type="checkbox" name="option1" value="sstrength" <?=($_GET['option1']=="sstrength")?" checked":"" ?>/> Super Strength<br>
                <input type="checkbox" name="option2" value="speed"<?=($_GET['option2']=="speed")?" checked":"" ?>/> Speed<br>
                <input type="checkbox" name="option3" value="thunder"<?=($_GET['option3']=="thunder")?" checked":"" ?>/> Manipulate thunder<br>
                <input type="checkbox" name="option4" value="fly"<?=($_GET['option4']=="fly")?" checked":"" ?>/> Ability to fly<br>
                <?= Q5(); ?>
                <br>
                <input type="submit" name="Submit"/>
            </form>
        </div>    
        
        <div class="Q6">
            <h3>Question 6: Which actor plays Iron Man?</h3>
            <form>
                <input type="text" name="answer"/>
                <?=Q6(); ?>
                     
                
                
                <br>
                <input type="submit" name="Submit"/>
            </form>
        </div>
        
    </body>
        <footer>This is for educational purpose.</footer>
</html>