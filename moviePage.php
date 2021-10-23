<?php


//Connect to DB
$db = new mysqli("localhost:3306", "root", "", "movieblock");
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " .
    $db->connect_error;
    return;
}

require_once('classes/Movie.php');

$movie = new Movie(1);
$db->set_charset("utf8");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="stylesheetdb.css">

    <title>MovieBlock</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div id="toast-container"></div>

    <nav class="navbar navbar-expand-lg navbar-light" id="site_nav">
        <a href="main.php"><img src="images/Title.jpg" alt="logo" width=376 height = 98></a>

        <div class="text-right" id="addNew">Can't find the movie you want? <a href="addPage.php">Add here</a></div>
    </nav>

    <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h1><?= $movie->gettitle() ?></h1>
                <p class="mb-0">
                    <strong>Release Date:</strong> <?= $movie->getreleaseDate("n/j/Y") ?>
                </p>
                <hr>
                <img src="<?= $movie->getURL() ?>" alt="<?= $movie->gettitle() ?>" class="img-thumbnail" style="width: 50%; height: auto;">
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
            </div>
        </div>
    </div>
</div>

    <footer id="site-footer" class="mt-auto">
        Copyright&copy; Adam Holl, Jacob Goodin, Stephen Shears 2021
        <br>
    </footer>

    <!-- Bootstrap Dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/9101481b66.js" crossorigin="anonymous"></script>
</body>
</html>