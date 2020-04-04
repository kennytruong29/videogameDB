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


    $password = mysqli_real_escape_string($conn,$_REQUEST['password']); //Password request
    $RID = mysqli_real_escape_string($conn,$_REQUEST['rid']); //Taken from delete.php

    $revid = "SELECT R.vid FROM recieves R WHERE R.revID = $RID";
    $redirect = "";
    if($result = mysqli_query($conn, $revid)) { //Makes sure the review is still there
        while($row = mysqli_fetch_array($result)){
            $redirect = $row['vid'];
        }
        mysqli_free_result($result);
     }
    else {
        echo "error in retrieving rid";
    }
    
    $sql = "DELETE FROM reviews R WHERE R.revID = $RID"; //Deletes the review given the revID
    if(strcmp($password, 'super' ) == 0) { //Password
        echo "Password accepeted.";
        echo "\n";
        if(mysqli_query($conn, $sql) == true)  { //Will only successfully delete if
            echo "Review deleted Succesfully.";  //correct pw is inputted
            echo "<td><a href=\"showReviews.php?link=$redirect\">View Reviews</a></td>";
        }
        echo "\n";
    }
     else {
         echo "ERROR: WRONG PASSWORD THIS WILL BE REPORTED."; 
    }

    
    
    mysqli_close($conn);
    ?>