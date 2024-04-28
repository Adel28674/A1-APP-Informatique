<?php
require_once 'ConnectionFunctionsToDatabase.php';
$conn = new ConnectionFunc();

$DB_HOSTNAME = "localhost";
$DB_NAME = "sevensense";
$DB_USERNAME = "root";
$DB_PASSWORD = "";


$connexion = $conn->db_Connect($DB_HOSTNAME, $DB_NAME, $DB_USERNAME, $DB_PASSWORD);

?>