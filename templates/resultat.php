<?php
use Classes\Question;
use Classes\Reponse;
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Résulat</title>
        <style>
        </style>
    </head>
    <body>
        <?php
        $page = 'resultat.php';
        $quizz = providerJSON("../Data/QuestionReponse.json");
        $lesQuestions = $quizz->getLesQuestions();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $index = 0;
            foreach ($lesQuestions as $question){
                if ($index >= $nbQuestion){
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

        echo "<h2>Votre score : <br>"; 
        echo ($_SESSION['score']);
        $_SESSION['score'] = 0;
        ?>
    </body>
</html>      