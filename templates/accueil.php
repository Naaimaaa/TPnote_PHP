<?php
session_start();
//require_once 'php/autoloader.php';
//Autoloader::register();
?>

<!DOCTYPE html>
<html lang="fr">
<?php
    include 'global/head.php';
?>
    <style>
        .bienvenue {
            text-align: center;
            background-color: aliceblue;
        }

        .bienvenue h1 {
            font-size: 80px ;
            margin : 0;
        }

        .bienvenue h3 {
            font-size: 30px ;
            margin : 0;
        }

    </style>
    <body>
        <?php include('global/header.php'); ?>
        <main>
            <div class="bienvenue">
                <h1> Bienvenue sur Let's Quiz !</h1>
                <h3> La meilleure plateforme de quiz en ligne</h3>
            </div>
            <section class="nouveautes">
                <div>
                    
                </div>
            </section>
            
        </main>