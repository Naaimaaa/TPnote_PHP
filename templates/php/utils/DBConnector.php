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

   /**
     * get_quiz, get l'ensemble des quiz de la BD
     *
     * @return array la liste des quiz
     */
    public function get_quiz():array{
        $sql = "SELECT * FROM QUIZ;";
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    /**
     * get_questions, get l'ensemble des questions d'un quiz de la BD
     *
     * @return array la liste des questions
     */
    public function get_questions_quiz(int $idQ):array{
        $sql = "SELECT NUMQ, INTITULE FROM COMPOSER NATURAL JOIN QUESTION WHERE IDQUIZ= ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$idQ]);
        $questions = $stmt->fetchAll();
        return $questions;
    }

    /**
     * get_reponses, get l'ensemble des réponses à une question de la BD
     *
     * @return array la liste des réponses
     */
    public function get_reponses_question(int $numQ):array{
        $sql = "SELECT NUMR, LIBELLE, CORRECTE FROM ASSOCIER NATURAL JOIN REPONSE WHERE NUMQ= ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$numQ]);
        $questions = $stmt->fetchAll();
        return $questions;
    }

    

}

?>