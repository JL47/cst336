<?php
function startConnection($dbname="c9"){
//Creating database connection
    $host="localhost";
//$dbname="ottermart";
    $username="root";
    $password="";
    
    //checks whether the URL contains "herokuapp" (using Heroku)
    if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
     $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
     $host = $url["host"];
     $dbname = substr($url["path"], 1);
     $username = $url["user"];
     $password = $url["pass"];
}   
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;

}

$dbConn = startConnection("c9");


   
    
     $categorySelect = $_POST['option'];
    if(isset($_POST['option']))
    {
        global $dbConn;
        $sql = "SELECT quote FROM 'p1_quotes WHERE category='Reflection'";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
function displayCategories()
{
    global $dbConn;
    
    $sql = "SELECT DISTINCT(category) FROM 'p1_quotes'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($record);
    foreach($records as $record)
    {
        echo '<option value="'.$record['category']." </option>";
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Quote Finder </title>
        <h1>Famous Quote Finder</h1>
    </head>
    <body>
    <form>
    Enter Keyword: <input type="text" name="keyword"/>
    Category: <select method = "post" name="option"> 
                <option value="Select One"></option>
                <?= displayCateogeries ?>
            </select> <br><br>
            Order
            <input type="radio" value="az"/> A-Z
            <input type="radio" value="za"/> Z-A
            
            
            <input type="submit" value="Display Quote"name="submit"/>
    </form>
   
    
    </body>
</html>