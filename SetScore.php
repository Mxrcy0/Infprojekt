<?php
// code inspired by stackoverflow (https://stackoverflow.com/questions/18632607/how-to-use-php-to-connect-to-sql-server#:~:text=php%20%24serverName%20%3D%20%22ServerName%22,Connect%20using%20SQL%20Server%20Authentication.)
// make variables to connect with database
$myServer = "127.0.0.1.3306";       
$myUser = "u681823632_jan";
$myPass = "Jannoahrobin0";
$myDB = "u681823632_iratasdatabase";

//open connection to database
$conn = mysqli_connect($myServer, $myUser, $myPass)
  or die("Couldn't connect to SQL Server on $myServer");
echo "connected successfully";

//variables, which are fed into database after having been entered by the user
$pID = $_POST['pID'];
$hscore = $_POST['hscore'];
$lscore = $_POST['lscore'];

//feed the data which is stored on the variables into the database
$sql = "INSERT INTO score (pID, hscore, lscore ) VALUES ($pID, $hscore, $lscore)";

//check if the data was inserted, if not, return an error which describes the problem that occured
if ($conn->query($sql) !== TRUE) {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//close connection to database
mysqli_close($conn)
?>
//not done