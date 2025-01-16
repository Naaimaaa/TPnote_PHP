<?php
namespace utils;
use utils\DBConnector;
use \PDO;

// classe donnant des outils pour la gestion des utilisateurs

class UserTools {
    
    private static function checkDB($email, $password) {
        $db = new PDO('mysql:host=servinfo-maria;dbname=DBvalin', 'valin', 'valin');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $hash = hash('sha1', $password);
        $query = $db->prepare('SELECT EMAILU FROM UTILISATEUR WHERE EMAILU = :email AND PASSWORD = :password');
        $query->execute(array('email' => $email, 'password' => $hash));
        $result = $query->fetch();
        return $result;
    }

    public static function login($email, $password) {
        $user = self::checkDB($email, $password);
        $status = false;
        if ($user) {
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
            header('Location: connexion.php');
            exit();
        }
    }

    public static function getUserToken() {
        return $_SESSION['user']['token'];
    }
}


?>