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
        <title>Quiz</title>
        <style>
        </style>
    </head>
    <body>
        <?php
        $quizz = providerJSON("../Data/QuestionReponse.json");

        if (!isset($_POST['nbQuestions'])) {
            $_POST['nbQuestions'] = 5;
        }

        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = 0;
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
            echo "<button type='submit' name='valider'>Valider</button>";
        echo "</form><br>";

        $nbQuestions = $quizz->getNbQuestions();
        echo "<form name='quizzForm' action='index.php?action=resultat' method='POST'>";
        echo"<input type='hidden' name='nomForm' value='quizzForm'>";
            $index = 0;
            foreach($lesQuestions as $question){
                if ($index == $nbQuestions){
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
        echo "<button type='submit' class='submit-btn'>Cliquer pour voir votre résultat</button>";
        echo "</form>";

        ?>
    </body>
</html>