<?php
    if (!array_key_exists('id', $_REQUEST) || !is_numeric($_REQUEST['id'])) {
        echo '<div class="alert alert-danger">Error - No movie ID found</div>';
        return;
    }

    $userID = $_SESSION['id'];
    $movieID = $_REQUEST['id'];
    $username =  $_SESSION['user'];
    $review = $_POST['review'];
    $rating = (int)$_POST['rate'] * 2;

    $statement = $db->prepare("INSERT INTO userratings VALUES (?,?,?,?,?);");
    $statement->bind_param("iissi", $userID, $movieID, $username, $review, $rating);
    $result = $statement->execute();

    if (!$result) {
        print "Error - the query could not be executed";
        $error = mysqli_error($db);
        print "<p>" . $error . "</p>";
        exit;
    }

    header("Location: ./?action=main.php");
?>