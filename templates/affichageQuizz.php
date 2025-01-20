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
    </head>
    <style>
        main{
            margin-left : 550px;
        }
        h1 {
            text-align: center;
        }
        
        form {
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 850px;
            padding-bottom : 10px;
        }
        
        .question {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-left : 20px;
        }
        
        .reponse {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            margin-left : 45px;
        }

        label {
            font-size: 14px;
            margin-right: 10px;
        }
        
        button[type="submit"] {
            background-color: #43319D;
            color: white;
            padding: 5px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin-top: 20px;
            margin: 10px auto;  /* Centrer horizontalement avec marge automatique */
        }
    </style>
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
            echo "<main>";
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
                        echo "<div class='reponse'>";
                        echo "<input type='radio' name='question$index' value='" . $reponse->getReponse() . "'> ";
                        echo "<div>" . $reponse->getReponse() . "</div>";
                        echo "</div>";
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
        </main>
    </body>
</html>