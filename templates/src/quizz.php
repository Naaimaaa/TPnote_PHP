<?php

require_once 'templates/php/providerJSON.php';

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

        foreach ($quizz as $question){
            echo $question;
            foreach ($question as $reponse){
                echo $reponse;
            }
        }
        ?>
    </body>
</html>