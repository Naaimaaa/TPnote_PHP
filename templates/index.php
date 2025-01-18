<?php
require_once 'php/autoloader.php';
Autoloader::register();


$action = $_REQUEST['action'] ?? 'bienvenue';

switch ($action) {
    case 'bienvenue':
        require_once 'bienvenue.php';
        break;
    case 'accueil':
        require_once 'accueil.php';
        break;
    case 'quizz':
        require_once 'quizz.php';
        break;
    case 'resultat':
        require_once 'resultat.php';
        break;
    case 'head':
        require_once 'global/head.php';
        break;
    case 'header':
        require_once 'global/header.php';
        break;
    default:
        require_once '404.php';
        break;
}
?>