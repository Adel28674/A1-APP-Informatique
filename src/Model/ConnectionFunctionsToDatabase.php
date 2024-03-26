<?php

class ConnectionFunc
{

    public function db_Connect($servor, $uname, $password, $db_name){
        return mysqli_connect($servor, $uname, $password, $db_name);
    }

    public function areFieldsFilled($username, $password)
    {
        if (empty($username) || empty($password)) { // Champ(s) vide(s)
            return false;
        } else {
            return true;
        } // Champs remplis
    }

    public function connexionDatabaseReussie($connexion)
    {
        if ($connexion->connect_error) { // Erreur de connexion
            return false;
        } else {
            return true;
        } // Connexion réussie
    }

    public function utilisateurInscrit($state){
        if ($state->num_rows == 1) {
            return true;
        } else {return false;}
    }
}
