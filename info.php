<!DOCTYPE html>
<?php
$dbServer = "us-cdbr-iron-east-03.cleardb.net";
$dbUserName = "b7d2ee3e1f3444"; 
$dbPassword = "14d96b46"; 
$dbName = "heroku_4b873a8d632cc30"; 
$query_startup ="SELECT * FROM startups WHERE (TYPE='startup') ORDER BY name"; 
$query_investor ="SELECT * FROM startups WHERE(TYPE='investor') ORDER BY name"; 
if($_POST["type"] == "Startups")
{
    $query = $query_startup; 
}
else if ($_POST["type"] == "Investors") 
{
    $query = $query_investor; 
}

$connection=new mysqli($dbServer, $dbUserName,$dbPassword,$dbName); 

if($connection->connect_errno)
    exit("Database Connection Failed. Reason: ".$connection->connect_error); 
$resultObj = $connection->query($query);
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<title>Info Page</title>
</head>

    <?php 
    while($row = $resultObj->fetch_assoc()){ ?>
<div class="well"> 
    <?= "<h4> Name: </h4> <p>".$row["name"].PHP_EOL ?> 
    <?=  "<h4> Year Founded: </h4><p>". $row["year"]?>
    <?="<h4>Business Address: </h4><p>".$row["business_address"]?>
</div>
    <?php }?>
</html>

<?phpmysqli_close($connection);?>