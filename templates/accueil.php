<?php
session_start();
require_once 'php/Autoloader.php';
Autoloader::register();
use utils\UserTools;
use utils\DBConnector;


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
        
        .bienvenue h3, .recherche h3, .liste-quiz h3 {
            font-size: 30px;
            margin : 10px 0;
        }

        .liste-quiz {
            margin: 50px auto; 
            max-width: 900px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .liste-quiz a {
            display: inline-block;
            width: 250px;
            margin: 15px;
            padding: 15px;
            text-align: center;
            background-color: #392989;
            color: white;
            font-size: 18px;
            text-decoration: none;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 80%;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            </div>
            <section class="liste-quiz">
                <h3> Nos derniers quiz </h3>
                <?php
                echo "<form action='index.php?action=importJSON' method='post' enctype='multipart/form-data'>";
                    echo "<label for='quizzJSON'>Importez votre propre quizz ici</label>";
                    echo "<input type='file' id='quizzJSON' name='quizzJSON' accept='application/json'/>";
                    echo "<button type='submit' name='importQuizz'>Importer</button>";
                echo "</form>";
                echo "<br/>";
                echo "<a href='index.php?action=quizz' class='start-btn'>Quizz sur le php</a>";
                echo "<br/>";
                echo "<a href='index.php?action=quizz2' class='start-btn'>Quizz sur l'informatique</a>";
                echo "<br/>";
                echo "<a href='index.php?action=quizz3' class='start-btn'>Quizz sur la culture génerale</a>";
                echo "<br/>";
                ?>
            </section>  
        </main>
    </body>


