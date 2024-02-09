<?php

/**
 * Class traitementMethodes
 *
 * Comporte un ensemble de méthodes destinées au traitement d'une inscription utilisateur
 *
 *
 * @author Yanis Bouchaib
 * @author Adel Hammiche
 * @author Paul Montagnac
 * @author Esteban Pagis
 */
class traitementMethodes{
    /**
     * Vérifie si le Google reCAPTCHA est valide
     *
     * @param object $response Réponse du CAPTCHA
     * @return bool Retourne true si le CAPTCHA est valide, sinon false
     */
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
    public function champsRemplis($username, $password){
        if (empty($username) || empty($password)){ // Champ(s) vide(s)
            return false;
        }
        else {return true;} // Champs remplis
    }

    /**
     * Vérifie si la connexion avec la Base de Données est réussie
     *
     * @param object $connexion L'objet de connexion MySQL
     * @return bool Retourne true si la connexion est réussie, sinon false
     */
    public function connexionDatabaseReussie($connexion){
        if ($connexion->connect_error) { // Erreur de connexion
            return false;
        } else {return true;} // Connexion réussie
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
}