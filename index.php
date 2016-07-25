<!DOCTYPE html>

<?php
require 'dbinfo.php';
echo "Database Connected successfully".PHP_EOL ;
$query = "SELECT name, year, business_address FROM startups WHERE (TYPE='startup')AND (business_address LIKE '%malaysia%')ORDER BY name"; 

$resultObj = $connection->query($query);
$number = 0 ; 

while($row = $resultObj->fetch_assoc())
{
    if($row['business_address'] !== "")
    {  
        $number ++; 
    }
}
echo "<br></br>";
echo "\n <h4> Total number of Malaysian startups is ".$number."</h4>";  
$startup_array = array("year", "business_address", "funding"); 
$investor_array = array("year", "business_address", "funding"); 

?>
<html>
    <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">
        <title>StartupDB Data Extractor</title>
    </head>
    <body>
        <h2>Data Extractor</h2>
        <h4>Welcome to the Data Extractor ! </h4>
        <div class="form well">
        <form method="post" action="info.php" class="form-group" role="form">
            <label for="database">Database Name</label>
            <select name="type" class="form-control" id="option" value=" ">
                <option value=""></option>
                <option value="Startups">Startups</option>
                <option value="Investors">Investors</option>
            </select>
            <button class="btn btn-success" type="submit">Request</button>
        </form>
        </div>
    </body>
</html>

<?php mysqli_close($connection);?>