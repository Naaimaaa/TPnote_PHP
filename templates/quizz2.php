<?php
require_once 'affichageQuizz.php';
use function templates\affichageQuizz;
        
$_SESSION["fichierJSON"] = "../Data/Informatique.json";
affichageQuizz($_SESSION["fichierJSON"]);
?>
