<?php

require_once('classes/Movie.php');
require_once('classes/Rating.php');

if (!array_key_exists('id', $_REQUEST) || !is_numeric($_REQUEST['id'])) {
    echo '<div class="alert alert-danger">Error - No movie ID found</div>';
    return;
}

$movie = new Movie((int)$_REQUEST['id']);
$rating = new Rating((int)$_REQUEST['id']);
$db->set_charset("utf8");

?>

    <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h1><?= $movie->gettitle() ?></h1>
                <p class="mb-0">
                    <strong>Release Date:</strong> <?= $movie->getreleaseDate("n/j/Y") ?>
                    <strong style="padding-left: 20px;">Genres: </strong> 
                    <?= $genres = implode(', ', $movie->getGenres());
                        if(empty($genres))
                        {
                            print("N/A");
                        }
                    ?>
                </p>
                <hr>
                <img src="<?= $movie->getURL() ?>" alt="<?= $movie->gettitle() ?>" class="img-thumbnail" style="width: auto; height: 500px;">
            </div>
            <div class="col-sm-6">
                <h2> OverView </h2>
                <hr>
                <h3>Description</h3>
                <p><?php print $movie->getDescription(); ?></p>
                <h3>Runtime</h3>
                <p><?php print $movie->getruntime() ?> minutes</p>
                <h4>Budget</h4>
                <p>$<?= $movie->getbudget() ?></p>
                <hr>
                <h2>Review Scores </h2>
                <h5><b>IMDb Score:</b></h5> 
                <p><b><?= $rating->getimdbRating() ?></b> / 10 </p>
                <h5><b>Rotten Tomatoes Score:</b></h5>
                <p><b><?= $rating->gettomatoRating() ?></b>% </p>
                <h4><b>BlocScore:</b></h4>
                <h5><b><?= $rating->getblocRating() ?></b> / 10</h5>

                <hr>
                <div class="col-sm-6">
                    <form action="./?action=updateMovie&id=<?= $movie->getId() ?>" method="post">
                    <input type="password" name="pass" placeholder="Admin Password Required" class="form-control" maxlength="20" required>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
                <br>
                <div class="col-sm-6">
                    <form action="./?action=delete_Process&id=<?= $movie->getId() ?>" method="post">
                    <input type="password" name="pass" placeholder="Admin Password Required" class="form-control" maxlength="20" required>
                    <button type="submit" class="btn btn-secondary">Delete</button>
                    </form>
                </div>
                <br>
                <?php 
                if(isset($_SESSION['status']))
                {
                    if(in_array($movie->getID(), $_SESSION['movieList']))
                    {
                        print("
                        <div class='col-sm-6'>
                            <form action='./?action=removeFromList_Process&id=". $movie->getId() ."' method='post'>
                            <button type='submit' class='btn btn-secondary'>Remove from List</button>
                            </form>
                        </div>");
                    }
                    else
                    {
                        print("
                        <div class='col-sm-6'>
                        <form action='./?action=addToList_Process&id=". $movie->getId() ."' method='post'>
                        <button type='submit' class='btn btn-secondary'>Add to List</button>
                        </div>");
                    }
                }
                ?>
                
            </div>
        </div>
    </div>
</div>
