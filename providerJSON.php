<?php
require_once 'Classes/Question.php';
require_once 'Classes/Reponse.php';

function providerJSON(String $fichier){
    $donnee = file_get_contents($fichier);

    $tableau = json_decode($donnee, true);

    $resultat = array();

    foreach($tableau['questions'] as $question){
        $reponses = array();
        foreach($question['reponses'] as $rep){
            $r = new Reponse($rep['proposition'],$rep['solution']);
            $reponses[] = $r;
        }
        $quest = new Question($question['question'],$reponses);
        $resultat[] = $quest;
    }
    return $resultat;
}

print_r(providerJSON("Data/QuestionReponse.json"));
?>