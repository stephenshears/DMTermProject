<?php

require_once('classes/Movie.php');

// Get new game releases
$options = array(
    'date_released_max' => date('Y-m-d'),
    'order_by' => "releaseDate",
    'order_dir' => "desc",
    'limit' => 4
);
$newReleases = Movie::factory($options, $db);

?>

    <div class="container" id="wrapper">
        <br>
        <form action="./" method="post">
        <div class="row align-items-start">
            <div class="col-sm-10">
                <input type="text" name="search_bar" placeholder="Search for movie" class="form-control" required>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-light">Search</button>
            </div>
        </div>
        </form>
        <br>
        <br>
        <div class="row align-items-start">
        <?php foreach ($newReleases as $movie) { ?>
            <div class="col-sm-3">
            <a href="./?action=moviePage&id=<?= $movie->getId() ?>">
                <li class="list-group-item">
                    <img class="card-img" src="<?= $movie->getURL() ?>" alt="<?= $movie->gettitle() ?>" style="height: 200px; width: auto;">
                    <h4><?= $movie->gettitle() ?></h4>
                    <strong>Release Date:</strong> <?= $movie->getreleaseDate("n/j/Y") ?>
                </li>
            </a>
            </div>
        <?php } ?>
        </div>
    </div>