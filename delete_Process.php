<?php

    if(!empty($_POST)){
    $searchQuery = "SELECT pass FROM movieblock.admin WHERE adminID = 0 LIMIT 1";
        $result = $db->query($searchQuery);
        if (!$result) {
            print "Error - the query could not be executed";
            $error = mysqli_error($db);
            print "<p>" . $error . "</p>";
            exit;
        }
        $info = $result->fetch_assoc();
        if($info['pass'] == $_REQUEST['pass']){

        require_once('classes/Movie.php');

        $movie = new Movie((int)$_REQUEST['id']);

        if(!$movie->deleteFrom()){
            exit();
            print("The delete has failed.");
        }
        print("The film ");
        print($movie->gettitle());
        print(" has been removed");
        }
        else{
            print("That password was incorrect. Please try again.");
        }
    }
    else{
        print("Access Denied");
        exit();
    }
?>