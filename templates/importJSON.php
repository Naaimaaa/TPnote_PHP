<?php
session_start();
require_once 'affichageQuizz.php';
use function templates\affichageQuizz;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['importQuizz'])) {
    if (isset($_FILES["quizzJSON"])) {
        $dossier = "../Data/import/"; 
        $nomFichier = basename($_FILES["quizzJSON"]["name"]);
        $fic = $dossier . $nomFichier;
        if (move_uploaded_file($_FILES["quizzJSON"]["tmp_name"], $fic)) {
            affichageQuizz($fic);
        } else {
            echo "Erreur lors du téléchargement.";
        }
    } else {
        echo "Aucun fichier sélectionné.";
    }
    phpinfo();
}
?>

