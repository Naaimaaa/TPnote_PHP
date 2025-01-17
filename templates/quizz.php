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

        $titre = $quizz->getQuizz();
        echo("<h1>$titre</h1>\n");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valider'])) {
            $_SESSION['nbQuestions'] = $_POST['nbQuestions'];
            $nbQuestions = $_SESSION['nbQuestions'];
            $quizz->setNbQuestions($nbQuestions);
        }



        $lesQuestions = $quizz->getLesQuestions();
        echo "<form method='post'>";
            echo "<label for='nbQuestions'>Nombre de questions (5 par défaut) :</label><br>";
            echo "<input type='number' id='nbQuestions' name='nbQuestions' min='1' value='" . $_POST['nbQuestions'] . "' max='" . count($lesQuestions) . "'>";
            echo "<button type='submit' name='valider'>Valider</button>";
        echo "</form><br>";


        if (isset($_SESSION['nbQuestions'])) {
        $nbQuestions = $quizz->getNbQuestions();
        echo "<form action='resultat' method='POST'>";
        echo "<input type='hidden' name='nbQuestions' value='$nbQuestions'>";
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
        echo "<button type='submit' name='voir_resultat'>Cliquer pour voir votre résultat</button>";
        echo "</form>";    
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['voir_resultat'])) {
            header("Location: resultat.php");
        }

        ?>

    </body>
</html>