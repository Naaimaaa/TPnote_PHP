<?php
session_start();
require_once 'php/Autoloader.php';
Autoloader::register();
use utils\UserTools;
use utils\DBConnector;
if (isset($_GET['function']) && $_GET['function'] === 'logout') {
    UserTools::logout();
}

// Décommenter la ligne suivante si connexion à BD fonctionne
//$listeQuizs = $connexion->get_participations($_SESSION['user']['email']);

?>

<!DOCTYPE html>
<html lang="fr">
<?php
    include 'global/head.php';
?>
    <style>

        .bienvenue {
            text-align: center;
            background-color: #392989;
            color : white;
            width : 100%;
            padding: 20px 0;
            margin-top : 40px;
            position : relative;
            
        }

        .bienvenue h1 {
            font-size: 80px ;
            margin : 0;
        }
        
        .bienvenue h3, 
        .recherche h3,
        .liste-quiz h3 {
            font-size: 30px;
            margin : 10px 0;
        }

        .recherche {
            margin : 20px, auto;
            width: 90%; /* Largeur relative */
            max-width: 1000px; /* Limite maximale */
            margin-left : 6rem;
            margin-top : 20px;
        }


        .search-bar input {
            border-radius : 5px;
            width: 70%; /* Largeur relative */
            max-width: 700px; /* Limite maximale */
            height: 20px;
            padding: 8px;
            font-size: 16px;

        }

        .search-button {
            margin-left: 10px;
            background-color: #CC3D6A;
            border-radius: 8px;
            border-style: none;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 16px;
            font-weight: 500;
            height: 40px;
            line-height: 20px;
            list-style: none;
            margin: 0;
            outline: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            transition: color 100ms;
            vertical-align: baseline;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;

        }

        .liste-quiz {
            margin-left: 95px;
            margin-top : 100px;
        }
        
        hr {
            width : 70%;
            position : fixed;
        }


        .search-button:hover,
        .search-button:focus {
            background-color: #F082AC;
        }

        @media (max-width: 768px) {
            .search-bar input {
                width: 60%; /* Réduction pour écrans moyens */
                font-size: 14px;
            }

            .search-button {
                padding: 8px 16px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .search-bar input {
                width: 80%; /* Réduction pour petits écrans */
                font-size: 12px;
            }

            .search-button {
                padding: 6px 12px;
                font-size: 12px;
            }
        }


    </style>
    <body>

        <?php
            //Affichage du header différent selon connexion ou non 
            if (UserTools::isLogged()) {
                include 'global/headerCo.php';
            }
            else {
                include 'global/header.php';
            }

         ?>
        <title>Let's Quizz - Accueil</title>

        <main>
            <div class="bienvenue">
                <h1> Bienvenue sur Let's Quizz !</h1>
                <h3> La meilleure plateforme de quiz en ligne</h3>
                <a href="index.php?action=quizz" class="start-btn">jouer test</a>
            </div>
            <section class="recherche">
                <h3>Rechercher un quiz</h3>
                <form action="recherche.php" method="GET" class="search-bar">
                    <input type="text" name="query" placeholder=" voyage, disney, harry potter..." class="search-input" required>
                    <button type="submit" class="search-button">OK</button>
                </form>
            </section>
            <section class="liste-quiz">
                <h3> Nos derniers quiz </h3>
                <button type="submit" class="search-button">Importez votre propre quizz ici</button>

            </section>  
        </main>
    </body>


