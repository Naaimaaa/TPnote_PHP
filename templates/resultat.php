<?php
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
        <title>Resultat</title>
        <style>
        </style>
    </head>
    <body>
        <?php

        $quizz = providerJSON("../Data/QuestionReponse.json");

        $lesQuestions = $quizz->getLesQuestions();

        if (!isset($_POST['nbQuestions'])){
            $nbQuestions = 5;
        }else{
            $nbQuestions = $_POST['nbQuestions'];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['nomForm'] === 'quizzForm') {
                $_SESSION['score'] = 0;
                $index = 0;
                foreach ($lesQuestions as $question){
                    if ($index >= $nbQuestions){
                        break;
                    }
                    if(isset($_POST["question$index"])){
                        $repJoueur = $_POST["question$index"];
                        foreach ($question->getLesReponses() as $reponse){
                            if ($repJoueur == $reponse->getReponse() && $reponse->bonneReponse()){
                                $_SESSION['score']++;
                                $quizz->setScore($_SESSION['score']);
                            }
                        }
                    }
                    $index++;
                }   
            }
        }  
        echo "<h2>Votre score :</h2>";
        echo $_SESSION['score'] . '/' . $nbQuestions;
        echo "<br>";
        echo "CORRECTION A IMPLEMENTER";
        ?>
    </body>
</html>      