<?php

    if(!empty($_POST)){
        require_once('classes/Movie.php');
        require_once('classes/Rating.php');

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
            if(!empty($_REQUEST['genres'])) 
            {
                $movie->updateGenres($_REQUEST['genres']);
            }
            $rating = new Rating;

            $rating->setimdbRating($_REQUEST['imdbRating']);
            $rating->settomatoRating($_REQUEST['tomatoRating']);
            $rating->setMovieID($_REQUEST['id']);
            (float)$bloc = ((float)$_REQUEST['imdbRating'] + (float)($_REQUEST['tomatoRating'] / 10)) / 2;
            $rating->setblocRating((float)$bloc);

            if(!$rating->update()){
                header("Location: ./");
            }
            else{
                header("Location: ./?action=updateMovie&error=1");
            }
        }
            else{
                header("Location: ./?action=updateMovie&error=2");
            }
    }
    else{
        print("Access Denied");
        exit();
    }
?>