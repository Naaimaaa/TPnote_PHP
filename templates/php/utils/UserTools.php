<?php
namespace utils;
use utils\DBConnector;
use \PDO;
session_start();


// classe donnant des outils pour la gestion des utilisateurs

class UserTools {
    
    private static function checkDB($email, $password) {
        $dbConnector = new DBConnector();
        $db = $dbConnector->getDB();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $hash = hash('sha1', $password);
        $query = $db->prepare('SELECT * FROM UTILISATEUR WHERE EMAILU = :email AND PASSWRD = :password');
        $query->execute(array('email' => $email, 'password' => $hash));
        $result = $query->fetch();
        return $result;
    }

    public static function login($email, $password) {
        $user = self::checkDB($email, $password);
        $status = false;
        if (count($user) > 0) {
            $_SESSION['user'] = array('email' => $user['EMAILU'], 'token' => self::generateToken(), 'nom' => $user['NOMU'], 'prenom' => $user['PRENOMU']);
            $status = true;
        }
        return $status;
    }
 
    public static function generateToken() {
        $token = bin2hex(random_bytes(32));
        setcookie('token', $token, time() + 3600);
        return $token;
    }

    public static function checkTokenValidity($token) {
        $validity = true;
        if (isempty($_COOKIE['token'])) {
            $validity = false;
        }else if ($token !== $_COOKIE['token']) {
            $validity = false;
        }
        return $validity;
    }

    public static function logout() {
        unset($_SESSION['user']);
    }

    public static function isLogged() {
        return isset($_SESSION['user']);
    }

    public static function requireLogin() {
        if (!self::isLogged()) {
            header('Location: index.php?action=connexion');
            exit();
        }
    }

    public static function getUserToken() {
        return $_SESSION['user']['token'];
    }

    public static function register($email, $password, $nom, $prenom) {
        $user = self::checkDB($email, $password);
        if(!$user) {
            $dbConnector = new DBConnector();
            $db = $dbConnector->getDB();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $hash = hash('sha1', $password);
            $query = $db->prepare('INSERT INTO UTILISATEUR VALUES(:email, :passwrd ,:nom, :prenom)');
            $query->execute(array('email' => $email, 'passwrd' => $hash, 'nom' => $nom, 'prenom' => $prenom));
            return true;
        }
        else {
            echo "Une erreur s'est produite lors de la tentive d'ajout d'un utilisateur, vérifiez que cet utilisateur n'existe pas déjà";
            return false;
        }
    }

}

?>