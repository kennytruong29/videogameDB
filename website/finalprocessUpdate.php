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
    $gname = mysqli_real_escape_string($conn,$_REQUEST['gamename']);
    $pub = mysqli_real_escape_string($conn,$_REQUEST['publisher']);
    $plat = mysqli_real_escape_string($conn,$_REQUEST['platform']);
    $dev = mysqli_real_escape_string($conn,$_REQUEST['developer']);
    $VID = mysqli_real_escape_string($conn,$_REQUEST['vid']);
    //vid, title, publisher, platform, developer, photopath, coverjpg
    $sql = "UPDATE videogame SET title = '$gname', publisher = '$pub', platform = '$plat', developer = '$dev' WHERE vid = $VID ";

    if(mysqli_query($conn, $sql) == true){ //Make sure the query works
        echo "Game updated successfully.";

        echo "\n";
        echo "<td><a href=\"list.php?\">Back to list</a></td>";
        } else {
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn);
        die("Connection failed: " . $conn->connect_error);
        }
    mysqli_close($conn);
?>