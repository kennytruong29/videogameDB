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

    $id = '1'; //the vID
    if(isset($_GET['link'])){
        $id = $_GET['link']; //Takes corresponding vID from list.php
      } else {
        echo "failed";
        echo "\n";
      }

    //Query all reviews from specified game through vID
    $sql = "SELECT * FROM videogame V WHERE V.vid = $id"; 
                                                          
    if($result = mysqli_query($conn, $sql)) {
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
                echo "<tr>";
                    echo "<th>Cover Art</th>";
                    echo "<th>Game</th>";
                    echo "<th>Publisher</th>";
                    echo "<th>Platform(s)</th>";
                    echo "<th>Developer</th>";
                    echo "<th> </th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td> <img src=\"" . $row['photopath'] . "\" width='190' height='89' /> </td>"; 
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['publisher'] . "</td>";
                    echo "<td>" . $row['platform'] . "</td>";
                    echo "<td>" . $row['developer'] . "</td>";
                    $vID = $row['vid'];  
                    $vTitle = $row['title'];
                    echo "<td><a href=\"post.php?link2=$vID\"> Post Review </a></td>";
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

    //Query to output all reviews for a game
    $sql = "SELECT R.creationDate,R2.rating, R2.name, R2.comment, R2.revID from recieves R, Reviews R2 
    where R.revID = R2.revID and R.revID IN (SELECT R2.revID FROM recieves R2 WHERE R2.vid = $id)";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
                echo "<tr>";
                    echo "<th>Username</th>";
                    echo "<th>Rating</th>";
                    echo "<th>Review</th>";
                    echo "<th>Date Posted</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rating'] . "</td>";
                    echo "<td>" . $row['comment'] . "</td>";
                    $revID = $row['revID'];
                    echo "<td>" . $row['creationDate'] . "</td>"; // 
                    echo "<td><a href=\"delete.php?link=$revID\"> Delete Review (ADMIN ONLY) </a></td>";
                    echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No reviews just yet :(";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn); 
?>
