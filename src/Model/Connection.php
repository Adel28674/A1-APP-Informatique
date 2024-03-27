<?php
require_once 'ConnectionFunctionsToDatabase.php';
$conn = new ConnectionFunc();

$DB_HOSTNAME = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "sevensense7database";

$connexion = $conn->db_Connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);



?>