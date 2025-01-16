<?php

require_once 'autoloader.php';
Autoloader::register();

if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'bienvenue';
}

switch ($action) {
    case 'bienvenue':
        include 'bienvenue.php';
        break;
    case 'accueil':
        include 'accueil.php';
        break;
    case 'quizz':
        include 'quizz.php';
        break;
    case 'resultat':
        include 'resultat.php';
        break;
    default:
        include '404.php';
        break;
}
?>