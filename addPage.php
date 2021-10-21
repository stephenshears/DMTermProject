<?php

/*
// Connect to DB
$db = new mysqli("localhost:3306", "root", "", "DBManagement");
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " .
    $db->connect_error;
    return;
}
$db->set_charset("utf8");
*/

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
    </nav>

    <div class="container" id="wrapper">
        <h1 class="display-4"> Add a Film here </h1>
        <br>

        <form action="./" method="post">
            <input type="hidden" name="action" value="signup_process">
            <li class="list-group-item">
                <div class="form-group">
                    <input type="text" name="title" placeholder="Film Title" class="form-control" required>
                </div>
                <p class="lead">Release Date:</p>
                <div class="form-group">
                    <input type="date" name="release_date" placeholder="Release Date" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="budget" placeholder="Film Budget" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="runtime" placeholder="Film Runtime in Minutes" min="90" max="300" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="description" placeholder="Film Description" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="embargo" placeholder="Film's Embargo if it has one" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="URL" placeholder="Film Cover Art URL" class="form-control">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-brand btn-block">Next</button>
                </div>
            </li>
        </form>
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