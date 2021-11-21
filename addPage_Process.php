<?php

    if(!empty($_POST)){
        require_once('classes/Movie.php');
        require_once('classes/Rating.php');

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
            $rating = new Rating;

            $rating->setimdbRating($_REQUEST['imdbRating']);
            $rating->settomatoRating($_REQUEST['tomatoRating']);
            $rating->setMovieID($movie->getID());
            (float)$bloc = ((float)$_REQUEST['imdbRating'] + (float)($_REQUEST['tomatoRating'] / 10)) / 2;
            $rating->setblocRating((float)$bloc);

            if(!$rating->save()){
                header("Location: ./");
            }
            else{
                header("Location: ./?action=addPage&error=1");
            }

        }
        else {
            header("Location: ./?action=addPage&error=1");
        }
    }
    else{
        print("Access Denied");
        exit();
    }

?>