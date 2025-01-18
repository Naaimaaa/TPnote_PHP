<?php
namespace templates;

session_start();

require_once 'php/providerJSON.php';
use Classes\Question;
use Classes\Reponse;

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz</title>
        <style>
            /* Appliquer le fond avec un dégradé horizontal */
            body {
                font-family: 'Arial', sans-serif;
                background: linear-gradient(to bottom, #0d0221, #3d087b, #2768c9, #00aaff);
                color: white;
                text-align: center;
                padding: 20px;
                min-height: 100vh;
            }

            /* Conteneur principal */
            form {
                font-family: 'Arial', sans-serif;
                font-size: 16px;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 12px;
                padding: 25px;
                margin: auto;
                width: 50%;
                box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            }

            /* Titre */
            h1 {
                font-size: 4.5em;
                margin-bottom: 25px;
                color: #ffffff;

            }

            /* Labels et questions */
            label, p {
                font-size: 1.7em;
                font-weight: bold;
                margin-bottom: 10px;
            }

            /* Conteneur pour chaque question et ses réponses */
            .lesReponses {
                align-items: flex-start;
                margin-bottom: 20px;
            }
            
            /* Style des questions */
            .question {
                font-size: 1.3em;
                font-weight: bold;
                text-align: left;
                margin-bottom: 10px;
                color: white;
            }

            /* Champs de formulaire */
            input[type="number"] {
                width: 60px;
                padding: 5px;
                border-radius: 5px;
                border: none;
                font-size: 1.2em;
                text-align: center;
                margin-right: 10px;
            }

            /* Boutons */
            button {
                background: #00c9ff;
                border: none;
                padding: 10px 20px;
                font-size: 1.2em;
                font-weight: bold;
                color: white;
                border-radius: 50px;
                cursor: pointer;
                margin-top: 15px;
            }

            /* Bouton de validation */
            .submit-btn {
                background: #ff7eb3;
            }

            .submit-btn:hover {
                background: #0086c3;
            }

        </style>
    </head>
    <body>
        <?php

        function affichageQuizz(String $fichier_quizz){
            $_SESSION["fichierJSON"] = $fichier_quizz;
            $quizz = providerJSON($fichier_quizz);

            if (!isset($_SESSION['score'])) {
                $_SESSION['score'] = 0;
            }

            if (!isset($_POST['nbQuestions'])) {
                $_POST['nbQuestions'] = 5;
            }

            $titre = $quizz->getQuizz();
            echo("<h1>$titre</h1>\n");

            $lesQuestions = $quizz->getLesQuestions();
            
            echo "<form method='post'>";
                echo "<label for='nbQuestions'>Nombre de questions (5 par défaut) :</label><br>";
                echo "<input type='number' id='nbQuestions' name='nbQuestions' min='1' value='" . $_POST['nbQuestions'] . "' max='" . count($lesQuestions) . "'>";
                echo "<button type='submit' name='valider'>Valider</button>";
            echo "</form><br>";

            if (isset($_POST['nbQuestions']) && $_POST['nbQuestions'] > 0){
                $nbQuestion = $_POST['nbQuestions'];
                $quizz->setNbQuestions($nbQuestion);
            }

            $nbQuestions = $quizz->getNbQuestions();
            echo "<form name='quizzForm' action='index.php?action=resultat' method='POST'>";
            echo"<input type='hidden' name='nomForm' value='quizzForm'>";
                $index = 0;
                foreach($lesQuestions as $question){
                    if ($index == $nbQuestions){
                        break;
                    }
                    echo "<br>";
                    echo "<div class='question'>" . $question->getQuestion() . "</div>";
                    echo "<br>";
                    echo "<br>";
                    echo "<div class='lesReponses'>";
                    foreach ($question->getLesReponses() as $reponse){
                        echo "<input type='radio' name='question$index' value='" . $reponse->getReponse() . "'> ";
                        echo "<div class='reponse'>" . $reponse->getReponse() . "";
                        echo "<br>";
                    }
                        echo "</div>";
                    echo "</div>";
                    $index++;
                }
            echo "<button type='submit' class='submit-btn'>Cliquer pour voir votre résultat</button>";
            echo "<input type='hidden' name='nbQuestions' value='$nbQuestions'>";
            echo "</form>";
        }
        ?>
    </body>
</html>