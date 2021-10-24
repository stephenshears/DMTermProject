<?php

if (!array_key_exists('action', $_REQUEST)) {
    $_REQUEST['action'] = 'main';
}

switch($_REQUEST['action']) {
    case 'addPage':
        require_once('addPage.php');
        break;
    case 'moviePage':
        require_once('moviePage.php');
        break;
    case 'main':
    default:
        require_once('main.php');
}

?>