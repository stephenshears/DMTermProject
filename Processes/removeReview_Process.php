<?php
    if (!array_key_exists('id', $_REQUEST) || !is_numeric($_REQUEST['id'])) {
        echo '<div class="alert alert-danger">Error - No user ID found</div>';
        return;
    }

    $userID = $_SESSION['id'];
    $movieID = $_REQUEST['id'];

    $statement = $db->prepare("DELETE FROM userratings WHERE (userID = ? AND movieID = ?);");
    $statement->bind_param("ii", $userID, $movieID);
    $result = $statement->execute();

    if (!$result) {
        print "Error - the query could not be executed";
        $error = mysqli_error($db);
        print "<p>" . $error . "</p>";
        exit;
    }

    header("Location: ./?action=main.php");
?>