<?php
namespace Classes;
class Quizz{
    private String $intitule;
    private $nbQuestion;
    private $score;
    private $lesQuestions;
    private $leJoueur;

    public function __construct(String $intitule){
        $this->intitule = $intitule;
        $this->nbQuestion = 5;
        $this->score = 0;
        $this->lesQuestions = array();
        $this->leJoueur = $joueur;
    }

    public function getQuizz(){
        return $this->intitule;
    }

    public function getNbQuestions(){
        return $this->nbQuestion;
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

    public function addQuestion(Question $question){
        $this->lesQuestions[] = $question;

    }

    public function getJoueur(){
        return $this->leJoueur;
    }
}
?>