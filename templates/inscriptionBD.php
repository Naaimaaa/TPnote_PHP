<?php 
session_start();
require_once 'php/Autoloader.php';
Autoloader::register();
use utils\UserTools;

if (isset($_POST['email']) && $_POST['password']) {
    $register = UserTools::register($_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prenom']);
    if ($register == true) {
        header('Location: index.php?action=connexion');
        exit();
    } else {
        header('Location:  index.php?action=inscription');
        echo "Erreur lors de l'inscription";
        exit();
    }
}
?>