<?php
require_once 'affichageQuizz.php';
use function templates\affichageQuizz;
        
$_SESSION["fichierJSON"] = "../Data/CultureGeneral.json";
affichageQuizz($_SESSION["fichierJSON"]);
?>
