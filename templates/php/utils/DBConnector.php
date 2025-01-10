<?php
declare(strict_types=1);
namespace utils;
use \PDO;

class DBConnector {
    private $pdo;
    public function __construct($nombase, $dbuser, $dbpass){
        // $this->pdo= new PDO('mysql:host=servinfo-maria;dbname='.$nombase.'', $dbuser, $dbpass);
        $this->pdo= new PDO('mysql:host=localhost;dbname='.$nombase.'', $dbuser, $dbpass);
    }
    
    /**
     * get_utilisateurs, get l'ensemble des utlisateurs de la BD
     *
     * @return array la liste des utilisateurs
     */
    public function get_utilisateurs():array{
        $sql = "SELECT * FROM UTILISATEUR;";
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }


}

?>