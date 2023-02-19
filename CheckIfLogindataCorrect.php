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

$username = $_POST['username'];

$passw = $_POST['passw'];

$sql = "SELECT  username, passw FROM player WHERE username = $username AND passw = $passw";
$result = $conn->query($sql);

if ($result->num_rows != 0){
  $is_true = true;
  $response_array['is_true'] = $is_true;
  echo json_encode($response_array);
}

//close connection to database
mysqli_close($conn)
?>