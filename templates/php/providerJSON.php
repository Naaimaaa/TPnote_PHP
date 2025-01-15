<?php
require_once 'autoloader.php';
Autoloader::register();
use Classes\Question;
use Classes\Reponse;

function providerJSON(String $fichier){
    $donnee = file_get_contents($fichier);

    $tableau = json_decode($donnee, true);

    $quizz = array();

    foreach($tableau['QUIZZ'] as $question){
        $questionTexte = $question['question'];
        $reponses = array();
        foreach($question['reponses'] as $rep){
            $r = new Reponse($rep['proposition'],(bool)$rep['solution']);
            $reponses[] = $r;
        }
        $qst = new Question($questionTexte,$reponses);
        $quizz[] = $qst;
    }
    return $quizz;
}
?>

