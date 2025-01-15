<?php 
session_start();
require_once 'php/autoloader.php';
Autoloader::register();
use utils\UserTools;
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $login = UserTools::login($_POST['email'], $_POST['password']);
    if ($login == true) {
        header('Location : ../accueil_connexion.php');
        } else {
        header('Location : accueil.php?error=1');
        }

} 

else if (!empty($_POST['login']) || !empty($_POST['password'])) {
    header('Location: connexion.php?error=2');
}

?>

<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php include('global/header.php'); ?>

        <main>
            <section class="login">
                <form action="connexion.php" method="POST">
                    <label for="email"> Email </label>
                    <input type="email" id="email" name="email" placeholder="Votre email" required>

                    <label for="password"> Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>

                    <input tye="submit" id="login-submit" value="Se connecter">

                <?php 
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
                </form>
                <p class="inscrire"> Pas encore de compte ? <a href="#"> Inscrivez-vous dès maintenant !</a></p>   
            </section>

        </main>
    </body>
</html>

