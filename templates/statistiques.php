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

body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to right, #6a11cb, #2575fc);
    color: #fff;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

main {
    background: rgba(0, 0, 0, 0.8);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    max-width: 600px;
    width: 100%;
    text-align: center;
}


h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
    color: #f39c12;
}


section {
    text-align: left;
}

h2 {
    font-size: 1.8em;
    margin-bottom: 15px;
    border-bottom: 2px solid #f39c12;
    padding-bottom: 5px;
}


li {
    list-style: none;
    background: #34495e;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.score-info {
    font-size: 1.1em;
    line-height: 1.6;
}

strong {
    color: #f1c40f;
}

label {
    color: #2ecc71;
}

/* Media Queries pour la responsivité */
@media (max-width: 768px) {
    main {
        max-width: 90%;
    }
    h1 {
        font-size: 2em;
    }
    h2 {
        font-size: 1.5em;
    }
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
