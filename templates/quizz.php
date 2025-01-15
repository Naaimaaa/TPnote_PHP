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

        $titre = $quizz->getQuizz();
        $lesQuestions = $quizz->getLesQuestions();

        echo("<h1>$titre</h1>\n");

        $index = 0;

        foreach($lesQuestions as $question){
            echo "<br>";
            echo($question->getQuestion());
            echo "<br>";
            echo "<br>";
            foreach ($question->getLesReponses() as $reponse){
                echo "<input type='radio' name='question'" . $index . "'value='" . $reponse->getReponse() ." '> ";
                echo("   " . $reponse->getReponse());
                echo "<br>";
            }
            $index++;
        }
        ?>
    </body>
</html>