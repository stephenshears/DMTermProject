<?php

    $query = "INSERT INTO userlist VALUES (" . $_SESSION['id'] . "," . $_REQUEST['id'] . ");";
    $result = $db->query($query);
    if (!$result) {
        print "Error - the query could not be executed";
        $error = mysqli_error($db);
        print "<p>" . $error . "</p>";
        exit;
    }
    
    $_SESSION['movieList'][] = $_REQUEST['id'];

    header("Location: ./?action=main.php");
?>