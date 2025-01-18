<?php
require_once 'quizz.php';
use function templates\affichageQuizz;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["quizz"])) {
        $dossier = "../Data/import/"; 
        $nomFichier = basename($_FILES["quizz"]["name"]);
        $fic = $dossier . $nomFichier;

        if (move_uploaded_file($_FILES["quizz"]["tmp_name"], $fic)) {
            affichageQuizz($fic);
        } else {
            echo "Erreur lors du téléchargement.";
        }
    } else {
        echo "Aucun fichier.";
    }
}
?>

