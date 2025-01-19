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
            /* Styles généraux */
body {
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #f5f5f5;
}

.container {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 100%;
    max-width: 800px;
}

h1 {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 20px;
    border-bottom: 2px solid #ccc;
    padding-bottom: 10px;
}

/* Formulaires */
form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

label {
    font-size: 1.1rem;
    font-weight: bold;
}

input[type='text'], input[type='email'], input[type='tel'], textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
}

textarea {
    height: 100px;
}

button {
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    background: #4caf50;
    color: white;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background: #45a049;
}

/* Champs obligatoires */
label.required::after {
    content: ' *';
    color: red;
}

/* Responsiveness */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 1.5rem;
    }

    label, input, textarea, button {
        font-size: 1rem;
    }
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