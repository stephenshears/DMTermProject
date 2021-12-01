<?php

    if(!empty($_POST)){
    $searchQuery = "SELECT passwords FROM users WHERE adminFlag = 1 LIMIT 1";
        $result = $db->query($searchQuery);
        if (!$result) {
            print "Error - the query could not be executed";
            $error = mysqli_error($db);
            print "<p>" . $error . "</p>";
            exit;
        }
        $info = $result->fetch_assoc();
        if(password_verify($_REQUEST['pass'], $info['passwords'])){

        require_once('classes/Movie.php');
        require_once('classes/Rating.php');

        $movie = new Movie((int)$_REQUEST['id']);
        $rating = new Rating($movie->getId());

        if(!$movie->deleteFrom()){
            exit();
            print("The delete has failed.");
        }
        $rating->clear();
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