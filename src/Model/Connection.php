<?php
require_once 'ConnectionFunctionsToDatabase.php';
$conn = new ConnectionFunc();

$DB_HOSTNAME = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "sevensense";

// $connexion = $conn->db_Connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

try {

    $connexion = new PDO("mysql:host=$DB_HOSTNAME;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>