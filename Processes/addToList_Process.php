<?php
    if (!array_key_exists('id', $_REQUEST) || !is_numeric($_REQUEST['id'])) {
        echo '<div class="alert alert-danger">Error - No movie ID found</div>';
        return;
    }
    if(isset($_POST))
    {
        $query = "INSERT INTO userlist VALUES (" . $_SESSION['id'] . "," . $_REQUEST['id'] . ");";
        $result = $db->query($query);
        if (!$result) {
            print "Error - the query could not be executed";
            $error = mysqli_error($db);
            print "<p>" . $error . "</p>";
            exit;
        }
        
        $_SESSION['movieList'][] = $_REQUEST['id'];

        header("Location: ./?action=moviePage&id=" . $_REQUEST['id']);
    }
    else
    {   
        print("Error: Access Denied");
        exit();
    }
?>