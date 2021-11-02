<?php

if (!array_key_exists('action', $_REQUEST)) {
    $_REQUEST['action'] = 'main';
}

switch($_REQUEST['action']) {
    case 'test':
        require_once('addPage_Process.php');
        break;
    case 'updateMovie':
        require_once('updateMovie.php');
        break;
    case 'updateMovie_Process':
        require_once('updateMovie_Process.php');
        break;
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
    case 'searchPage':
        require_once('searchPage.php');
        break;
    case 'main':
    default:
        require_once('main.php');
}

?>