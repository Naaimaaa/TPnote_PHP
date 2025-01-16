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

    public function getBonneReponse(){
        foreach($this->lesReponses as $rep){
            if($rep->bonneReponse()){
                return $rep;
            }
        }
        return null;
    }

    public function addReponse(Reponse $reponse){
        $this->lesReponses[] = $reponse;
    }
}
?>