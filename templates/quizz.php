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
    </head>
    <body>
        <?php
        $quizz = providerJSON("../Data/QuestionReponse.json");
        foreach($quizz as $question){
            echo "<br>";
            echo($question->getQuestion());
            echo "<br>";
            echo "<br>";
            foreach ($question->getLesReponses() as $reponse){
                echo("   " . $reponse->getReponse());
                echo "<br>";
            }
        }
        ?>
    </body>
</html>