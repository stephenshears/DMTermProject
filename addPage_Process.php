<?php

    if(!empty($_POST)){
        require_once('classes/Movie.php');

        $movie = new Movie;

        $movie->settitle($_REQUEST['title']);
        $movie->setbudget($_REQUEST['budget']);
        $movie->setreleaseDate($_REQUEST['release_date']);
        $movie->setruntime($_REQUEST['runtime']);
        $movie->setDescription($_REQUEST['description']);
        $movie->setURL($_REQUEST['URL']);
        $movie->setembargo($_REQUEST['embargo']);

        if (!$movie->save()) {
            if(!empty($_REQUEST['genres'])) 
            {
                $movie->plugGenres($_REQUEST['genres']);
            }

            header("Location: ./");
        } else {
            header("Location: ./?action=addPage&error=1");
        }
    }
    else{
        print("Access Denied");
        exit();
    }

?>