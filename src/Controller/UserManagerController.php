<?php
require '../Model/Connection.php';
require '../Model/SQLRequestFunc.php';
$lines = new SQLRequestFunc();
$lines = $lines->selectAllUsers($connexion);   
?>