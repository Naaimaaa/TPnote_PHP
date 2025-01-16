<?php 
session_start();
require_once 'php/autoloader.php';
Autoloader::register();
use utils\UserTools;


if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $login = UserTools::login($_POST['email'], $_POST['password']);
    if ($login == true) {
        header('Location: accueil.php');
    } else {
        header('Location: connexion.php?error=1');
    }

}

else if (!empty($_POST['login']) || !empty($_POST['password'])) {
    header('Location: connexion.php?error=2');
}

?>

<!DOCTYPE html>
<html lang="fr">
    <style>

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5%;
    }

    h1 {
        text-align : center;
    }

    .login {
        margin-top : 100px;
        padding: 20px;
        background-color: #fff;
        border: 1px solid lightgray;
        border-radius: 8px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-section h1 {
        font-size: 32px;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    form label {
        margin-bottom: 5px;
        font-size: 14px;
    }

    form input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid lightgray;
        border-radius: 4px;
        font-size: 14px;
    }

    #login-submit {
        background-color: #333;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    .inscrire {
        margin-top: 10px;
        font-size: 14px;
        text-align: center;
    }

    .inscrire a {
        color: #007BFF;
        text-decoration: none;
    }


    </style>

    <body>
        <?php include('global/header.php'); ?>

        <main>
            <section class="login">
                <h1> Connexion </h1>
                <form action="" method="POST">
                    <label for="email"> Email </label>
                    <input type="email" id="email" name="email" placeholder="Votre email" required>

                    <label for="password"> Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>

                    <input type="submit" id="login-submit" value="Se connecter">

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
                <p class="inscrire"> Pas encore de compte ? <a href="inscription.php"> Inscrivez-vous dès maintenant !</a></p>   
            </section>

        </main>
    </body>
</html>

