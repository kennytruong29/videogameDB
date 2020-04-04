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
    $uname = mysqli_real_escape_string($conn,$_REQUEST['uname']);
    $title = mysqli_real_escape_string($conn,$_REQUEST['title']);
    $review = mysqli_real_escape_string($conn,$_REQUEST['comment']);
    $rating = mysqli_real_escape_string($conn,$_REQUEST['rating']);
    //vid, title, publisher, platform, developer, photopath, coverjpg
    $sql = "INSERT INTO reviews VALUES (DEFAULT,'$rating', '$review', '$uname')";

    if(mysqli_query($conn, $sql) == true){ //If query is successful, execute code below block
        } else {
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn);
        die("Connection failed: " . $conn->connect_error);
        }

    $last_id = mysqli_insert_id($conn); //revID

    
    $vid = "SELECT V.vid FROM videogame V WHERE V.title = '$title'";
    $redirect = "";
    if($result = mysqli_query($conn, $vid)) {
        while($row = mysqli_fetch_array($result)){
            $redirect = $row['vid']; //Fetch vID of video game, given the title
        }
        mysqli_free_result($result);
     }
    else {
        echo "error in retrieving vid";
    }
  

    date_default_timezone_set('America/Los_Angeles');
    $date = date('Y/m/d H:i:s'); //Takes current date and time formatted in YYYY-MM-DD
    //Query to insert review into recieves table
    $insert = "INSERT INTO recieves VALUES ((SELECT vid FROM videogame WHERE title = '$title'),$last_id,'$date')"; 
    
    if(mysqli_query($conn, $insert) == true){
        echo "Record inserted successfully";
        echo "\n";
        echo "<td><a href=\"showReviews.php?link=$redirect\">View Reviews</a></td>";
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn);
    }

    mysqli_close($conn);
?>