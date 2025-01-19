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
        <style>
            /* Styles généraux */
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(to right, #3498db, #2ecc71);
                color: #333;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            
            .container {
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 40px;
                width: 90%;
                max-width: 600px;
                text-align: center;
            }
            
            h1 {
                text-align: center;
                color: #333;
                font-size: 1.8rem;
            }
            
            /* Formulaires */
            form {
                display: flex;
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }
            
            label {
                font-size: 1rem;
                font-weight: bold;
            }
            
            input[type='number'], input[type='radio'] {
                margin-top: 5px;
            }
            
            button {
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                background: #4facfe;
                color: white;
                font-size: 1rem;
                cursor: pointer;
                transition: background 0.3s ease;
            }
            
            button:hover {
                background: #00c6fb;
            }
            
            /* Questions */
            .question {
                font-size: 1.2rem;
                font-weight: bold;
                color: #444;
                margin-bottom: 10px;
            }
            
            .lesReponses {
                margin-bottom: 20px;
            }
            
            .reponse {
                margin-left: 10px;
                font-size: 1rem;
            }
            
            /* Bouton de soumission */
            .submit-btn {
                width: 100%;
                padding: 15px;
                font-size: 1.1rem;
                background: #ff416c;
                transition: background 0.3s ease;
            }
            
            .submit-btn:hover {
                background: #ff4b2b;
            }
            
            /* Responsiveness */
            @media (max-width: 768px) {
                .container {
                    padding: 20px;
                }
                h1 {
                    font-size: 1.5rem;
                }
                .question, .reponse {
                    font-size: 1rem;
                }
            }
            

        </style>
    </head>
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
                        echo "<input type='radio' name='question$index' value='" . $reponse->getReponse() . "'> ";
                        echo "<div class='reponse'>" . $reponse->getReponse() . "";
                        echo "<br>";
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
    </body>
</html>