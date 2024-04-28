<?php

class ConnectionFunc
{

    public function __construct(){

    }

    public function db_Connect($servor, $db_name, $uname, $password){
        try {
            $connexion = new PDO("mysql:host=$servor;dbname=$db_name)",$uname, $password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function areFieldsFilled($username, $password)
    {
        if (empty($username) || empty($password)) { // Champ(s) vide(s)
            return false;
        } else {
            return true;
        } // Champs remplis
    }

    public function isConnected($connexion)
    {
        if (!$connexion) { // Erreur de connexion
            return false;
        } else {
            return true;
        } // Connexion réussie
    }

    public function exist($state){
        if ($state->num_rows > 0) {
            return true;
        } else {return false;}
    }
}
