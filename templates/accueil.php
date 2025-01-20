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
        <!-- CSS fait à l'aide de chatgpt -->
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
        

        .liste-quiz {
            margin: 50px auto;
            padding: 20px;
            width: 90%;
            max-width: 800px;
            background: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .liste-quiz h3 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #392989;
            padding-bottom: 10px;
        }
        
        .liste-quiz form {
            margin-bottom: 20px;
        }
        
        .liste-quiz label {
            font-size: 18px;
            color: #555;
        }
        
        .liste-quiz input[type='file'] {
            margin-top: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .liste-quiz button {
            margin-top: 10px;
            background-color: #CC3D6A;
            border: none;
            border-radius: 5px;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .liste-quiz button:hover {
            background-color: #F082AC;
        }
        
        .liste-quiz .start-btn {
            display: block;
            background: #2575fc;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 18px;
            margin: 10px 0;
            transition: background 0.3s ease;
        }
        
        .liste-quiz .start-btn:hover {
            background: #6a11cb;
        }
        
        @media (max-width: 768px) {
            .liste-quiz h3 {
                font-size: 24px;
            }
            .liste-quiz button {
                font-size: 14px;
            }
        }
        
        @media (max-width: 480px) {
            .liste-quiz h3 {
                font-size: 20px;
            }
            .liste-quiz button {
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


