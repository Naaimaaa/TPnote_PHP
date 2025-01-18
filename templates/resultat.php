<?php

require_once 'affichageResultat.php';
use function templates\affichageResultat;
        
affichageResultat($_SESSION["fichierJSON"]);
?>
    