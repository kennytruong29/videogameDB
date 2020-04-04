<?php
  $vID = ' ';
    if(isset($_GET['link2'])){
      $vID = $_GET['link2'];
      //vID will contain the value for the corresponding game 
      //the user is writing a review for
        } else {
          echo "failed"; 
          echo $vID; 
        }

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

  $title = ' ';
  $sql = "SELECT * FROM videogame V WHERE V.vid = $vID"; //Query the game info
  if($result = mysqli_query($conn, $sql)) { //Prints specific game's information
                                            //and will display above the "review" area
      if(mysqli_num_rows($result) > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Cover Art</th>";
                  echo "<th>Game</th>";
                  echo "<th>Publisher</th>";
                  echo "<th>Platform(s)</th>";
                  echo "<th>Developer</th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                  echo "<td> <img src=\"" . $row['photopath'] . "\" width='190' height='89' /> </td>"; 
                  echo "<td>" . $row['title'] . "</td>";
                  echo "<td>" . $row['publisher'] . "</td>";
                  echo "<td>" . $row['platform'] . "</td>";
                  echo "<td>" . $row['developer'] . "</td>"; 
                  $title = $row['title'];
                  echo "</tr>";
          }
          echo "</table>";
          // Free result set
          mysqli_free_result($result);
      } else{
          echo "No records matching your query were found.";
      }
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }    


  echo "<br><br>";

  echo "<form action=\"/processReview.php\"> 
  <fieldset>
    <legend>Write a review!</legend>
    Username: <br>
    <input type = \"text\" name = \"uname\"><br><br>
    Name of Game :<br>
    <input type=\"text\" name=\"title\" value = \"$title\" readonly=\"readonly\"<br><br>
    Review:<br>
    <input type=\"text\" name=\"comment\"><br><br>
    Rating (out of 5):<br>
    <select name = \"rating\">
  <option value=\"1\">1</option>
  <option value=\"2\">2</option>
  <option value=\"3\">3</option>
  <option value=\"4\">4</option>
  <option value=\"5\">5</option>
  </select>
    <input type=\"submit\" value=\"Submit\">
  </fieldset>    
</form>";
?>
