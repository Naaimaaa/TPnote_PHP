<?php
namespace Classes;
class Question{
    private $intituleQuest;
    private $lesReponses;

    public function __construct(String $intitule, Array $reponse){
        $this->intituleQuest = $intitule;
        $this->lesReponses = $reponse;
    }

    public function getQuestion(){
        return $this->intituleQuest;
    }

    public function getLesReponses(){
        return $this->lesReponses;
    }

    public function addReponse(Reponse $reponse){
        $this->lesReponses[] = $reponse;
    }
}
?>