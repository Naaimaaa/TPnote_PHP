<?php
class Reponse{
    private $intituleRep;
    private $bonneReponse;

    public function __construct(String $intitule, Boolean $bonneRep){
        $this->intituleRep = $intitule;
        $this->bonneReponse = $bonneRep;
    }

    public function getReponse(){
        return $this->intituleRep;
    }

    public function bonneReponse(){
        return $this->bonneReponse;
    }
}
?>