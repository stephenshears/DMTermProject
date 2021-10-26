<?php

if (!array_key_exists('action', $_REQUEST)) {
    $_REQUEST['action'] = 'main';
}

switch($_REQUEST['action']) {
    case 'delete_Process':
        require_once('delete_Process.php');
        break;
    case 'addPage_Process':
        require_once('addPage_Process.php');
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