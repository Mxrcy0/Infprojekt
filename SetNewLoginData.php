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

//get the users chosen name and password from the html file
$username = $_POST['username'];
$passw = $_POST['passw'];

//set the elo rating to the standard value of 1000
$elo = 1000;

//generate the players ID
//here we take the last registred player's id and ad one to it in order to create a new ID
$pID_query = "SELECT pID FROM player ORDER BY pID DESC LIMIT 1";
$pID_result = $conn->query($pID_query);
$pID_row = mysqli_fetch_array($pID_result);
$pID = $pID_row['pID'] + 1;

//insert the data collected above into the database
$sql = "INSERT INTO player (pID, passw, username, elo)
VALUES ($pID, $passw, $username, $elo)";
$result = $conn->query($sql);

//if data was not input into the database, return an error
if(!$result) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
//close connection to database
mysqli_close($conn)
?>