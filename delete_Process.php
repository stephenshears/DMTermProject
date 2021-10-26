<?php

    require_once('classes/Movie.php');

    $movie = new Movie((int)$_REQUEST['id']);

    if(!$movie->deleteFrom()){
        exit();
        print("The delete has failed.");
    }
    print("The film ");
    print($movie->gettitle());
    print(" has been removed");
?>