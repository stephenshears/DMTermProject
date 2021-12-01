<?php
    if (!array_key_exists('id', $_REQUEST) || !is_numeric($_REQUEST['id'])) {
        echo '<div class="alert alert-danger">Error - No access allowed</div>';
        return;
    }
        session_destroy();

        header("Location: ./?action=main");
?>