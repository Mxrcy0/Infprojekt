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

//store data created in the html file 
$data = json_decode(file_get_contents("php://input"));

// access the variables
$username = $data->username;
$passw = $data->passw;

//try to find a user with the same password and username that were input
$sql = "SELECT  username, passw, pID FROM player WHERE username = $username AND passw = $passw";
$result = $conn->query($sql);

//check if a user with the same password and username that were input, if so, return true, if not, return false
//if a user with the given username and password exists, also return the users ID
//note that all of the returned data is stored in an array called response_array
if ($result->num_rows != 0){
  $is_true = true;
  $pID_row = mysqli_fetch_array($result);
  $pID = $pID_row['pID'];

  $response_array['is_true'] = $is_true;
  $response_array['pID'] = $pID;
  echo json_encode($response_array);
}else{
  $is_true = false;
  $response_array['is_true'] = $is_true;
  echo json_encode($response_array);
}

//close connection to database
mysqli_close($conn)
?>