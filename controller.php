<?php

if (!array_key_exists('action', $_REQUEST)) {
    $_REQUEST['action'] = 'main';
}

switch($_REQUEST['action']) {
    case 'updateMovie':
        require_once('updateMovie.php');
        break;
    case 'updateMovie_Process':
        require_once('Processes/updateMovie_Process.php');
        break;
    case 'delete_Process':
        require_once('Processes/delete_Process.php');
        break;
    case 'addPage_Process':
        require_once('Processes/addPage_Process.php');
    case 'addPage':
        require_once('addPage.php');
        break;
    case 'addToList_Process':
        require_once('Processes/addToList_Process.php');
        break;
    case 'removeFromList_Process':
        require_once('Processes/removeFromList_Process.php');
        break;
    case 'moviePage':
        require_once('moviePage.php');
        break;
    case 'searchPage':
        require_once('searchPage.php');
        break;
    case 'loginUser':
        require_once('loginUser.php');
        break;
    case 'loginUser_Process':
        require_once('Processes/loginUser_Process.php');
        break;    
    case 'addUser':
        require_once('addUser.php');
        break;
    case 'addUser_Process':
        require_once('Processes/addUser_Process.php');
        break;
    case 'logoutUser_Process':
        require_once('Processes/logoutUser_Process.php');
        break;
    case 'userPage':
        require_once('userPage.php');
        break;
    case 'addReview':
        require_once('Processes/addReview_Process.php');
        break;
    case 'removeReview':
        require_once('Processes/removeReview_Process.php');
        break;
    case 'main':
    default:
        require_once('main.php');
}

?>