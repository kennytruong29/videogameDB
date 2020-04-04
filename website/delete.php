<?php

$servername = "localhost";
$username = "webserver";
$password = "wampstack";
$db = "gamesdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$reviewID = "";
if(isset($_GET['link'])){
    $reviewID = $_GET['link']; //Gets VID from corresponding video game
                               //In order to delete a review from specified game
  } else {
    echo "failed to retireve rid to process the delete.";
    echo "\n";
  }

echo "<form action=\"/processDelete.php\"> 
<fieldset>
  <legend>Enter Admin Password</legend>
  Password: <br>
  <input type = \"Password\" name = \"password\"><br><br>
  <input type='hidden' name='rid' value=\"$reviewID\"> 
  <input type=\"submit\" value=\"Submit\">

</fieldset>    
</form>";


?>