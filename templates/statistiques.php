<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
require_once('php/autoloader.php');
Autoloader::register();
use utils\UserTools;
UserTools::requireLogin();
try {
    require_once 'php/utils/constantes.php';
    include('global/head.php');
    $listeQuizs = $connexion->get_participations($_SESSION['user']['email']);
}
catch (Exception $e) {
    $listeQuizs = array();
}
?>
    <style>

    </style>
    <body>
        <?php 
            include 'global/header.php';
        ?>
        <main>
            <div>
                <h1></h1>
                <p></p>
            </div>
            <section>
                <?php 
                    foreach ($listeQuizs as $quiz){
                        echo $quiz;
                    }
                ?>
            </section>
        </main>
    </body
