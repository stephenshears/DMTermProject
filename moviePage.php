<?php

require_once('classes/Movie.php');

if (!array_key_exists('id', $_REQUEST) || !is_numeric($_REQUEST['id'])) {
    echo '<div class="alert alert-danger">Error - No movie ID found</div>';
    return;
}

$movie = new Movie((int)$_REQUEST['id']);
$db->set_charset("utf8");

?>

    <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h1><?= $movie->gettitle() ?></h1>
                <p class="mb-0">
                    <strong>Release Date:</strong> <?= $movie->getreleaseDate("n/j/Y") ?>
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
                <form action="./?action=delete_Process&id=<?= $movie->getId() ?>" method="post">
                <button type="submit" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>
