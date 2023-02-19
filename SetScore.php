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
$data = json_decode(file_get_contents("php://input"));
$pID = $data->pID;
$score = $data->score;

//check what the players current highscore is and store it on curr_hscore
$score_query = "SELECT hscore FROM score WHERE pID = $pID";
$score_result = $conn->query($score_query);
$score_row = mysqli_fetch_array($score_result);
$curr_hscore = $score_row['pID'];

//if the players last score is higher than their current highscore, overwrite the highscore in the database
if($score > $curr_hscore){
  //feed the data which is stored on the variables into the database
  $sql = "UPDATE TABLE score SET hscore = $score WHERE pID = $pID";
  $result = $conn->query($sql);
  //check if the data was inserted, if not, return an error which describes the problem that occured
  if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
//close connection to database
mysqli_close($conn)
?>