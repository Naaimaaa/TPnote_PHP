<?php 
session_start();
require_once 'php/Autoloader.php';
Autoloader::register();
use utils\UserTools;


if (isset($_POST['email']) && $_POST['password']) {
    $login = UserTools::login($_POST['email'], $_POST['password']);
    if ($login == true) {
        $_SESSION['user'] = $login;
        header('Location: index.php?action=accueil');
        exit();
    } else {
        header('Location: index.php?action=connexion');
        echo "Erreur lors de la connexion";
        exit();
    }
}

if (!(empty($_GET["error"]))) {
    $message ='<p id="error">%s</p>';
    switch ($_GET["error"]) {
        case 1:
            echo sprintf($message, htmlspecialchars("Login ou mot de passe incorrect"));
            break;
        case 2:
            echo sprintf($message, htmlspecialchars("Veuillez remplir tous les champs"));
            break;
        default:
            break;
    }
}
?>