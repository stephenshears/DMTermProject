<?php
require_once('classes/Movie.php');

$movieIndex = array();

foreach($_SESSION['movieList'] as $userPick)
{
    $movieIndex[] = new Movie((int)$userPick);
}
?>

    <div class="container" id="wrapper">
        <br>
        <?php print('<h1>' . $_SESSION['user'] . '</h1>'); ?>
        <hr>
        <br>
        <div class="row align-items-start">
        <?php foreach ($movieIndex as $movie) { ?>
            <div class="col-sm-3" style="height: 330px; width: auto;">
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