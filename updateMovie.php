<?php

require_once('classes/Movie.php');

if (!array_key_exists('id', $_REQUEST) || !is_numeric($_REQUEST['id'])) {
    echo '<div class="alert alert-danger">Error - No movie ID found</div>';
    return;
}

$movie = new Movie((int)$_REQUEST['id']);
$db->set_charset("utf8");

?>

    <div class="container" id="wrapper">
        <h1 class="display-4"> Update <?= $movie->gettitle() ?> here </h1>
        <br>

        <form action="./?action=updateMovie_Process&id=<?= $movie->getId() ?>" method="post">
            <li class="list-group-item">
                <div class="form-group">
                    <input type="text" name="title" value="<?= $movie->gettitle() ?>" class="form-control" maxlength="60" required>
                </div>
                <p class="lead">Release Date:</p>
                <div class="form-group">
                    <input type="date" name="release_date" value="<?= $movie->getreleaseDate() ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="budget" value="<?= $movie->getbudget() ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="runtime" value="<?= $movie->getruntime() ?>" min="90" max="300" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="description" value="<?= $movie->getDescription() ?>" class="form-control" maxlength="1000" required>
                </div>
                <div class="form-group">
                    <input type="date" name="embargo" value="<?= $movie->getembargo() ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="URL" value="<?= $movie->getURL() ?>" class="form-control" maxlength="1000">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-brand btn-block">Next</button>
                </div>
            </li>
        </form>
    </div>