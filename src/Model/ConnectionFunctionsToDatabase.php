<?php

class ConnectionFunc
{

    public function __construct(){

    }

    public function db_Connect($servor, $db_name, $uname, $password){
        try {
            $connexion = new PDO("mysql:host=$servor;dbname=$db_name",$uname, $password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connexion;
        } catch(PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function areFieldsFilled($username, $password)
    {
        if (empty($username) || empty($password)) { 
            return false;
        } else {
            return true;
        } 
    }

    public function isConnected($connexion)
    {
        if (!$connexion) { 
            return false;
        } else {
            return true;
        } 
    }

    public function exist($state){
        if ($state->num_rows > 0) {
            return true;
        } else {return false;}
    }
}
