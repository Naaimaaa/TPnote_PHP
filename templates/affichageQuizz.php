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
            /* Appliquer le fond avec un dégradé linéaire agréable */
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to bottom, #2c3e50, #34495e, #2980b9, #6dd5fa);
    color: white;
    text-align: center;
    padding: 40px 20px;
    min-height: 100vh;
    margin: 0;
}

/* Conteneur principal du formulaire */
form {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px;
    width: 60%;
    margin: auto;
    box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(10px);
    text-align: left;
}

/* Titre */
h1 {
    font-size: 3em;
    margin-bottom: 20px;
    color: #f1c40f;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
}

/* Style des labels et questions */
label, p {
    font-size: 1.5em;
    font-weight: bold;
    color: #ecf0f1;
    margin-bottom: 10px;
}

/* Conteneur des questions */
.question {
    font-size: 1.3em;
    font-weight: bold;
    color: #ecf0f1;
    margin-bottom: 10px;
}

/* Conteneur pour chaque question et ses réponses */
.lesReponses {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 15px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    margin-bottom: 25px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
}

/* Champs de formulaire (input) */
input[type="number"], input[type="radio"] {
    accent-color: #f1c40f;
    font-size: 1.2em;
    padding: 10px;
    border-radius: 8px;
    border: none;
    text-align: center;
    outline: none;
}

input[type="number"] {
    width: 80px;
}

/* Style des réponses */
.reponse {
    font-size: 1.2em;
    margin-left: 10px;
    display: inline-block;
}

/* Boutons */
button {
    background: linear-gradient(to right, #f1c40f, #e67e22);
    border: none;
    padding: 15px 30px;
    font-size: 1.3em;
    font-weight: bold;
    color: white;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
}

/* Effet au survol du bouton */
button:hover {
    background: linear-gradient(to right, #e67e22, #f1c40f);
    transform: scale(1.05);
}

/* Style du bouton de validation */
.submit-btn {
    background: linear-gradient(to right, #2ecc71, #27ae60);
}

.submit-btn:hover {
    background: linear-gradient(to right, #27ae60, #2ecc71);
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
            
            if ($_SERVER['REQUEST_URI'] != '/index.php?action=importJSON'){
                echo "<form method='post'>";
                    echo "<label for='nbQuestions'>Nombre de questions (5 par défaut) :</label><br>";
                    echo "<input type='number' id='nbQuestions' name='nbQuestions' min='1' value='" . $_POST['nbQuestions'] . "' max='" . count($lesQuestions) . "'>";
                    echo "<button type='submit' name='valider'>Valider</button>";
                echo "</form><br>";
            } 

            if (isset($_POST['nbQuestions']) && $_POST['nbQuestions'] > 0){
                $nbQuestion = $_POST['nbQuestions'];
                $quizz->setNbQuestions($nbQuestion);
            }

            if (($_SERVER['REQUEST_URI'] == '/index.php?action=importJSON')){
                $_POST['nbQuestions'] = count($lesQuestions);
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