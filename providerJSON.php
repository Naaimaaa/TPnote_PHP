<?php
require_once 'Classes/Question.php';
require_once 'Classes/Reponse.php';

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

