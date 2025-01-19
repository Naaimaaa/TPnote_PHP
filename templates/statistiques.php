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
