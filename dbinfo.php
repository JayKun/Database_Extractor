 <?php
$dbServer = "us-cdbr-iron-east-03.cleardb.net";
$dbUserName = "b7d2ee3e1f3444"; 
$dbPassword = "14d96b46"; 
$dbName = "heroku_4b873a8d632cc30"; 

$connection=new mysqli($dbServer,$dbUserName,$dbPassword,$dbName); 
if($connection->connect_errno)
    exit("Database Connection Failed. Reason: ".$connection->connect_error); 

?>