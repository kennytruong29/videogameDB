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

$videoID = "";
if(isset($_GET['link3'])){
    $videoID = $_GET['link3']; //Takes vID from list.php
  } else {
    echo "failed to retireve vid to update game.";
    echo "\n";
  }

echo "<form action=\"/processUpdate.php\"> 
<fieldset>
  <legend>Enter Admin Password</legend>
  Password: <br>
  <input type = \"Password\" name = \"password\"><br><br>
  <input type='hidden' name='vid' value=\"$videoID\"> 
  <input type=\"submit\" value=\"Submit\">

</fieldset>    
</form>";


?>