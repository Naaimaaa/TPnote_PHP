<?php
namespace utils\constantes;
require_once 'php/autoloader.php'; 
Autoloader::register();
use utils\DBConnector;
$connexion = new DBConnector('DBvalin', 'valin', 'valin');

?>