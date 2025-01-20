<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
require_once 'php/Autoloader.php';
Autoloader::register();

require_once 'php/utils/DBConnector.php';
use utils\DBConnector;
?>
    <style>
        main {
            padding: 30px;
            max-width: 900px;
            margin: 60px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        section {
            padding: 30px;
            border-radius: 10px;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
            padding: 20px;
            border-radius: 8px;
        }

        li:last-child {
            margin-bottom: 0;
        }

        .score-info {
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
    <body>
    <?php 
        include 'global/headerCo.php';
    ?>
    <main>
        <div>
            <h1></h1>
            <p></p>
        </div>
        <section>
            <?php 
            $connexion = new DBConnector();
            $email = $_SESSION['mail'];
            $lesScores = $connexion->getScores($email);
            echo "<h2>Voici vos scores</h2>";
            if (!is_array($lesScores) || empty($lesScores)) {
                echo "Aucun score trouvé.";
            } else { 
                foreach ($lesScores as $score) { ?>
                    <li>
                        <div class="score-info">
                            <strong>Nom du quizz :</strong> <?= htmlspecialchars($score['NOMQUIZ']) ?> 
                            <strong>Score  :</strong> <?= htmlspecialchars($score['POINTS'])?> <label>%</label>
                            <strong>Date :</strong> <?= htmlspecialchars($score['DATEPART']) ?> <br>
                        </div>
                    </li> <?php
                }
            }
            ?>
        </section>
        </main>
    </body>
</html>
