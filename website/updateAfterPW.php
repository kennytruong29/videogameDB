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
if(isset($_GET['link'])){
    $videoID = $_GET['link']; //Takes vID from processUpdate.php
  } else {
    echo "failed to retireve vid to update game.";
    echo "\n";
  }
  $title = "";
  $pub = "";
  $plat = "";
  $dev = "";
  $path = "";
  $sql = "SELECT * FROM videogame V WHERE V.vid = $videoID";
  if($result = mysqli_query($conn, $sql)){
        while($row = mysqli_fetch_array($result)){
          $title = $row['title'];
          $pub = $row['publisher'];
          $plat= $row['platform'];
          $dev= $row['developer'];
        }
        // Free result set
        mysqli_free_result($result);
    } 
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }


  echo "<form action=\"/finalprocessUpdate.php\"> 
  <fieldset>
    <legend>Update Game Info!</legend>
    Name of Game :<br>
    <input type=\"text\" name=\"gamename\" value = \"$title\"><br><br>
    Publisher:<br>
    <input type=\"text\" name=\"publisher\" value = \"$pub\"><br><br>
    Platform:<br>
    <input type=\"text\" name=\"platform\" value = \"$plat\"><br><br>
    Developer:<br>
    <input type=\"text\" name=\"developer\" value = \"$dev\"><br><br>
    <input type='hidden' name='vid' value=\"$videoID\"> 
    <input type=\"submit\" value=\"Submit\">
  </fieldset>    
</form>";


?>