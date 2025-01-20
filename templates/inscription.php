<?php 
session_start();
require_once 'php/Autoloader.php';
Autoloader::register();
use utils\UserTools;


?>
<!DOCTYPE html>
<html lang="fr">
<?php include('global/head.php'); ?>
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

    .inscription {
        margin-top : 100px;
        padding: 40px;
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
        width : 350px;
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

    #subscribe-submit {
        background-color: #333;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }
</style>
<body>
    <?php include('global/header.php'); ?>
    <main>
        <section class="inscription">
            <div class="form-container">
                <h1>Inscription</h1>
                <form action="index.php?action=inscriptionBD" method="POST">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre nom" required>

                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name = "prenom" placeholder="Votre prénom" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Votre email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>

                    <input type="submit" id="subscribe-submit" value="S'inscrire" >
                </form>
            </div>
        </section>
    </main>
</body>
</html>