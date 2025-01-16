<?php

require_once 'php/providerJSON.php';
use Classes\Question;
use Classes\Reponse;
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz</title>
        <style>
        </style>
    </head>
    <body>
        <?php
        $quizz = providerJSON("../Data/QuestionReponse.json");

        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = 0;
        }

        if (!isset($_POST['nbQuestions'])) {
            $_POST['nbQuestions'] = 5;
        }

        $titre = $quizz->getQuizz();
        echo("<h1>$titre</h1>\n");

        if (isset($_POST['nbQuestions']) && $_POST['nbQuestions'] > 0){
            $nbQuestion = $_POST['nbQuestions'];
            $quizz->setNbQuestions($nbQuestion);
        }
        
        $lesQuestions = $quizz->getLesQuestions();
        echo "<form method='post'>";
            echo "<label for='nbQuestions'>Nombre de questions (5 par défaut) :</label><br>";
            echo "<input type='number' id='nbQuestions' name='nbQuestions' min='1' value='" . $_POST['nbQuestions'] . "' max='" . count($lesQuestions) . "'>";
            echo "<button type='submit'>Valider</button>";
        echo "</form><br>";


        $nbQuestion = $quizz->getNbQuestions();

        echo "<form method='POST' action='resultat.php'>";
            $index = 0;
            foreach($lesQuestions as $question){
                if ($index == $nbQuestion){
                    break;
                }
                echo "<br>";
                echo($question->getQuestion());
                echo "<br>";
                echo "<br>";
                foreach ($question->getLesReponses() as $reponse){
                    echo "<input type='radio' name='question$index' value='" . $reponse->getReponse() . "'> ";
                    echo("   " . $reponse->getReponse());
                    echo "<br>";
                }
                $index++;
            }
            echo "<input type='submit' value='Cliquez pour voir votre résultat'/>";
        echo "</form>";
        ?>
    </body>
</html>