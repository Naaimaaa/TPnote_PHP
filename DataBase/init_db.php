<?php
require_once '../templates/php/utils/DBConnector.php';
use function utils\DBConnector;

try {
    $db = new PDO('sqlite:database.db');

    $sql = file_get_contents("script/scriptCreation.sql");
    $db->exec($sql);

    echo "Base de données créée";

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
