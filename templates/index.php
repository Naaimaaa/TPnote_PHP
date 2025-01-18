<?php
require_once 'php/Autoloader.php';
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
    case 'affichageQuizz':
        require_once 'affichageQuizz.php';
        break;
    case 'resultat':
        require_once 'resultat.php';
        break;
    case 'connexion':
        require_once 'connexion.php';
        break;
    case 'inscription':
        require_once 'inscription.php';
        break;
    case 'importJSON':
        require_once 'importJSON.php';
        echo "Fichier importJSON.php chargé !<br>";
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