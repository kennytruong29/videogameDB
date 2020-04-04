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


    $password = mysqli_real_escape_string($conn,$_REQUEST['password']); // retrieve from form
    $VID = mysqli_real_escape_string($conn,$_REQUEST['vid']);
    if(strcmp($password, 'super' ) == 0) {
        echo "Password accepeted.";
        echo "\n";
        echo "<td><a href=\"updateAfterPW.php?link=$VID\">Update Game</a></td>";
        
        echo "\n";
    }
     else {
         echo "ERROR: WRONG PASSWORD THIS WILL BE REPORTED";
    }

    
    
    mysqli_close($conn);
    ?>