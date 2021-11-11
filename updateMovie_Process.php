<?php

    if(!empty($_POST)){
        require_once('classes/Movie.php');

        $movie = new Movie;
        $movie->setId($_REQUEST['id']);
        $movie->settitle($_REQUEST['title']);
        $movie->setbudget($_REQUEST['budget']);
        $movie->setreleaseDate($_REQUEST['release_date']);
        $movie->setruntime($_REQUEST['runtime']);
        $movie->setDescription($_REQUEST['description']);
        $movie->setURL($_REQUEST['URL']);
        $movie->setembargo($_REQUEST['embargo']);

        if (!$movie->update()) {
            header("Location: ./");
        } else {
            header("Location: ./?action=moviePage&error=1");
        }
    }
    else{
        print("Access Denied");
        exit();
    }
?>