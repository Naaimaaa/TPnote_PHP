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
        include 'quizz.php';
        break;
    case 'resultat':
        require_once 'resultat.php';
        break;
    case 'head':
        require_once 'global/head.php';
    case 'header':
        require_once 'global/header.php';
    default:
        include '404.php';
        break;
}
?>