<?php
session_start();
//require_once 'templates/php/autoloader.php';
//Autoloader::register();

// index.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Let's Quizz</title>

    <!-- CCS inspiré de Chat GPT -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow : hidden;
        }

        h1 {
            color: white;
            padding: 1rem 2rem;
            text-align: center;
            margin: 0;
            font-size: 4rem;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1rem;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .container h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .container p {
            font-size: 1.2rem;
            line-height: 1.6;
            text-align: center;
        }

        .start-btn {
            display: block;
            width: 200px;
            margin: 2rem auto;
            padding: 0.8rem 1rem;
            font-size: 1.2rem;
            text-align: center;
            background: #6200ea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .start-btn:hover {
            background: #4500b5;
        }

        .video {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover; /* Évite que la vidéo soit déformée */
            overflow: hidden;
            background-color: #43319D; /* Fond violet si la vidéo ne se charge pas */
        }
      
    </style>
</head>
<body>
    <video autoplay loop muted playsinline class="video">
        <source src="img/video/bubbles.mov" type="video/quicktime">
    </video>
    <main>
        <h1> Let's QUIZZ !</h1>
        <section class="container">
            <h2>Testez vos connaissances !</h2>
            <p>Êtes-vous prêt à relever le défi ? Cliquez sur le bouton ci-dessous pour démarrer l'aventure.</p>
            <a href="index.php?action=accueil" class="start-btn">Rejoindre une aventure</a>
        </section>
    </main>
</body>
</html>