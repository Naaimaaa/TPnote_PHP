<?php
require_once '../templates/php/utils/DBConnector.php';
use utils\DBConnector;

try {
    $dbConnector = new DBConnector();
    $db = $dbConnector->getDB();

    $sql = file_get_contents("script/scriptCreation.sql");
    $db->exec($sql);

    echo "Base de données créée";

} catch (PDOException $e) {
    echo $e->getMessage();
}

try {
    $sql = file_get_contents("script/insertions.sql");
    $queries = explode(";", $sql);
    foreach ($queries as $query) {
        $db->exec($query);
    }    
    echo "Données ajoutées";

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
