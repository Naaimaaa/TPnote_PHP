<?php
session_start();
//require_once 'php/autoloader.php';
//Autoloader::register();
?>

<!DOCTYPE html>
<html lang="fr">
<?php
    include '../global/head.php';
?>
    <style>
        .bienvenue {
            text-align: center;
            background-color: #392989;
            color : white;
            width : 100%;
            position : fixed;
            top : 52px;
            left: 0;
        }

        .bienvenue h1 {
            font-size: 80px ;
            margin : 0;
        }

        .bienvenue h3, 
        .recherche h3,
        .liste-quiz h3 {
            font-size: 30px ;
            margin : 0;
        }

        .recherche {
            position : fixed;
            top : 50%;
            left : 490px;
        }


        .search-bar input {
            border-radius : 5px;
            width : 1000px;
            height : 30px;

        }

        .search-button {
            width : 50px;
            height : 36px;
            background-color : #CC3D6A;
            color : white;
            font-weight : bold;

        }

        .liste-quiz {
            position : fixed;
            top : 70%;
            left : 10%;
        }

        hr {
            width : 400%;
        }


    </style>
    <body>
        <?php include('../global/header.php'); ?>
        <main>
            <div class="bienvenue">
                <h1> Bienvenue sur Let's Quiz !</h1>
                <h3> La meilleure plateforme de quiz en ligne</h3>
            </div>
            <section class="recherche">
                <h3>Rechercher un quiz</h3>
                <form action="recherche.php" method="GET" class="search-bar">
                    <input type="text" name="query" placeholder="voyage, disney, harry potter..." class="search-input" required>
                    <button type="submit" class="search-button">OK</button>
                </form>
                    
                
            </section>
            <section class="liste-quiz">
                <h3> Nos derniers quizz </h3>
                <hr/>
                <?php 
                $i = 0;
                foreach($quizs as $quiz){
                    ?>
                <div class="bloc">
                    <div class="quiz">
                <?php
                    $quiz[$i][1];
                    echo $quiz[$i][1];
                    $i = $i + 1;
                }?>
            </div>
                
            </section>
            
        </main>