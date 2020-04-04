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

    $id = '1'; //revID
    if(isset($_GET['link'])){
        $id = $_GET['link']; // Takes corresponding revID from category.php
      } else {
        echo "failed";
        echo "\n";
      }
    //Query outputs games only if it belongs to a specific category/genre
    $sql = "SELECT * from videogame V where V.vid in (SELECT B.vid from belongsto B where B.cid = $id) ORDER BY V.title";
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
                    echo " <td> <a href=\"showReviews.php?link=$vID\">View Reviews</a> </td>";
                    echo "<td><a href=\"post.php?link2=$vID\"> Post Review </a></td>";
                    echo " <td> <a href=\"update.php?link3=$vID\">Update Game (ADMIN ONLY)</a> </td>";
                    echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    echo " <center> <td> <a href=\"category.php\">Back</a> </td> </center>";

    mysqli_close($conn); 
?>



