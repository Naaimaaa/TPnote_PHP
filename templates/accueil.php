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
            top : 70px;
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
            background-color: #CC3D6A;
            border-radius: 8px;
            border-style: none;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: 500;
            height: 40px;
            line-height: 20px;
            list-style: none;
            margin: 0;
            outline: none;
            padding: 10px 16px;
            position: relative;
            text-align: center;
            text-decoration: none;
            transition: color 100ms;
            vertical-align: baseline;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;

        }

        .liste-quiz {
            position : fixed;
            top : 75%; quizz
        }
        
        hr {
            width : 400%;
        }


        .search-button:hover,
        .search-button:focus {
            background-color: #F082AC;
        }


    </style>
    <body>
        <?php include('global/header.php'); ?>
        <title>Let's Quizz - Accueil</title>
        <main>
            <div class="bienvenue">
                <h1> Bienvenue sur Let's Quizz !</h1>
                <h3> La meilleure plateforme de quiz en ligne</h3>
            </div>
            <section class="recherche">
                <h3>Rechercher un quiz</h3>
                <form action="recherche.php" method="GET" class="search-bar">
                    <input type="text" name="query" placeholder="  voyage, disney, harry potter..." class="search-input" required>
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


        #240638
        #691076