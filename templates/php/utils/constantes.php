<?php
namespace utils\constantes;
try { require_once 'php/autoloader.php'; 
}
catch (Exception $e){
    require_once '../constantes.php';
}
Autoloader::register();
use utils\DBConnector;
$connexion = new DBConnector('DBvalin', 'valin', 'valin');

?>