<?php
class Quizz{
    private $nbQuestion;
    private $score;
    private $lesQuestions;
    private $leJoueur;

    public function __construct(Joueur $joueur){
        $this->nbQuestion = 5;
        $this->score = 0;
        $this->lesQuestions = array();
        $this->leJoueur = $joueur;
    }

    public function getNbQuestions(){
        return $this->getNbQuestions;
    }

    public function setNbQuestions(int $nb){
        $this->nbQuestion = $nb;
    }

    public function getScore(){
        return $this->score;
    }

    public function setScore(){
        $this->score += 1;
    }

    public function getLesQuestions(){
        return $this->lesQuestions;
    }


}

?>