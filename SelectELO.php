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

$pID = $_POST['pID'];

$sql = "SELECT elo FROM player WHERE pID = $pID";
$result = $conn->query($sql);

//store the result on the $elo variable and then return it using the json_encode function
$elo_row = mysqli_fetch_array($result);
$elo = $elo_row['elo'];
$response_array['elo'] = $elo;
echo json_encode($response_array);

//close connection to database
mysqli_close($conn)
?>