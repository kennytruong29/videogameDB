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

    //vid, title, publisher, platform, developer, photopath, coverjpg
    $sql = "SELECT * FROM category"; // output alphabetically 

    $CID = "";
    if($result = mysqli_query($conn, $sql)) {
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
                echo "<tr>";
                    echo "<th></th>";
                    echo "<th>Category</th>";
                    echo "<th> </th>";
                    echo "<th> </th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    $CID = $row['cid'];
                    echo "<td> <img src=\"" . $row['photoPath'] . "\" width='190' height='89' /> </td>"; 
                    echo "<td><a href=\"showcatReviews.php?link=$CID\">".$row['categoryName']."</a></td>";
                    echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($sql);
    }

    echo " <center> <td> <a href=\"index.html\">Home</a> </td> </center>";

    mysqli_close($conn); 
?>