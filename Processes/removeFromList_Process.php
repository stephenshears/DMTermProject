<?php

if(isset($_POST)){
    $query = "DELETE FROM userlist WHERE movieID =" . $_REQUEST['id'] . " AND userID=" . $_SESSION['id'] . ";";
        $result = $db->query($query);
        if (!$result) {
            print "Error - the query could not be executed";
            $error = mysqli_error($db);
            print "<p>" . $error . "</p>";
            exit;
        }

        $_SESSION['movieList'] = array_diff( $_SESSION['movieList'], [$_REQUEST['id']] );

        header("Location: ./?action=moviePage&id=" . $_REQUEST['id']);
}
else
{
    print("Error: Access Denied");
    exit();
}
?>