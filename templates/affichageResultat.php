<?php
namespace templates;
session_start();
require_once 'php/providerJSON.php';

use utils\UserTools;

require_once 'php/utils/DBConnector.php';
use utils\DBConnector;

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

        function affichageResultat(String $fichier){
            $quizz = providerJSON($fichier);

            $lesQuestions = $quizz->getLesQuestions();

            if (isset($_POST['nbQuestions'])){
                $nbQuestions = $_POST['nbQuestions'];
            } else {
                $nbQuestions = 5;
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

            
            if (UserTools::isLogged()) {
                $connexion = new DBConnector();
                $reussite = (int)(($_SESSION['score'] / $nbQuestions)*100);
                $connexion->addScore(strval($_SESSION['mail']),$reussite,$quizz->getQuizz());
            }

            if ($_SESSION['score'] == $nbQuestions){
                echo "Incroyable ! Tu es un véritable expert !";
            }
            else if ($nbQuestions > $_SESSION['score'] &&  $_SESSION['score'] >= $nbQuestions*0.8){
                echo "Presque parfait ! Plus que quelques détails pour atteindre la perfection !";
            } 
            else if ($nbQuestions*0.8 > $_SESSION['score'] &&  $_SESSION['score'] >= $nbQuestions*0.5){
                echo "Bien joué ! Continue tes efforts !";
            }
            else if ($nbQuestions*0.5 > $_SESSION['score'] &&  $_SESSION['score'] >= $nbQuestions*0.2){
                echo "Ne te décourage pas, l'important c'est d'apprendre !";
            }
            else {
                echo "Oups… On dirait que c'était difficile !";
            }

            echo "<br>";
            echo "<h2>Correction des questions:</h2>";
            echo "<br>";
            $i = 0;
            foreach($lesQuestions as $question){
                if ($i >= $nbQuestions){
                    break;
                }
                echo "<h3>Question ".($i+1).": ".$question->getQuestion()."</h3>";
                echo "<br>";
                echo "Réponse attendue : ";
                foreach ($question->getLesReponses() as $reponse){
                    if ($reponse->bonneReponse()){
                        echo $reponse->getReponse();
                        if(isset($_POST["question$i"])){
                            $repJoueur = $_POST["question$i"];
                            if ($repJoueur == $reponse->getReponse()){
                                echo "<br>";
                                echo "&#9989; Votre réponse : $repJoueur";
                                $i++;
                            }
                            else{
                                echo "<br>";
                                echo "&#10060; Votre réponse : $repJoueur";
                                $i++;
                            }
                        } else {
                            echo "<br>";
                            echo "&#10060; Aucune réponse sélectionnée.";
                            $i++;
                        }
                    }
                }
                echo "<br>";
            }

            echo "<br>";
            if ($_SERVER['HTTP_REFERER'] == 'http://localhost:8000/index.php?action=quizz'){
                echo "<a href='index.php?action=quizz'>Rejouer</a>";
            } 
            if ($_SERVER['HTTP_REFERER'] == 'http://localhost:8000/index.php?action=quizz2'){
                echo "<a href='index.php?action=quizz2'>Rejouer</a>";
            } 
            if ($_SERVER['HTTP_REFERER'] == 'http://localhost:8000/index.php?action=quizz3'){
                echo "<a href='index.php?action=quizz3'>Rejouer</a>";
            } 
            echo "<br>";
            echo "<a href='index.php?action=accueil'>Retour à l'accueil</a>";
        }
        ?>
    </body>
</html>      