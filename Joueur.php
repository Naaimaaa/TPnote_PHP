<?php
class Joueur{
    private $nom;
    private $prenom;

    public function __construct(String $nom, String $prenom){
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }
}
?>