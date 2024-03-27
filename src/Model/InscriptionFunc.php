<?php

class InscriptionFunc
{

    public function captchaValide($valeur_exact_captcha,$reponse_captcha){
        if($valeur_exact_captcha==$reponse_captcha){
            return true;
        }else{
            return false;
        }

    }

    /**
     * Vérifie si les champs "username" et "password" sont remplis
     *
     * @param string $username Nom d'utilisateur
     * @param string $password Mot de Passe
     * @return bool Retourne true si les champs sont remplis, sinon false
     */
    public function fieldsFilled($username, $password){
        if (empty($username) || empty($password)){ // Champ(s) vide(s)
            return false;
        }
        else {return true;} // Champs remplis
    }


    /**
     * Vérifie si l'utilisateur n'est pas inscrit.
     *
     * @param object $state L'état de l'utilisateur.
     * @return bool Retourne true si l'utilisateur n'est pas inscrit, sinon false.
     */
    public function utilisateurNonInscrit($state){
        if ($state->num_rows > 0) {
            return false;
        } else {return true;}
    }

    public function isConnected($connexion)
    {
        if ($connexion->connect_error) { // Erreur de connexion
            return false;
        } else {
            return true;
        } // Connexion réussie
    }

}
