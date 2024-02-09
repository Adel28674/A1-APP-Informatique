<?php
use PHPUnit\Framework\TestCase;
require 'traitementMethodes.php';

/**
 * Class traitementTest
 *
 * Classe de test pour les méthodes de traitement d'une inscription utilisateur
 *
 * @author Yanis Bouchaib
 * @author Adel Hammiche
 * @author Paul Montagnac
 * @author Esteban Pagis
 *
 *
 */
class traitementTest extends TestCase{
    /**
     * @test
     * Effectue un test de validation du CAPTCHA
     *
     * @return void
     */

    /**
     * @test
     * Effectue un test de validation des champs
     *
     * @return void
     */
    public function testChampsRemplis(){
        $traitementMethodes = new traitementMethodes();
        $output1 = $traitementMethodes->champsRemplis('test', 'azerty123');
        $output2 = $traitementMethodes->champsRemplis('', 'azerty123');
        $output3 = $traitementMethodes->champsRemplis('test', '');
        $this->assertTrue($output1);
        $this->assertFalse($output2);
        $this->assertFalse($output3);

    }

    /**
     * @test
     * Effectue un test de la connexion à la base de données
     *
     * @return void
     */
    public function testConnexionDatabaseReussie()
    {
        $traitementMethodes = new traitementMethodes();
        try {
            $output1 = $traitementMethodes->connexionDatabaseReussie(mysqli_connect('localhost', 'root', '@root123', 'PLANETCALCULATOR'));
            $output2 = $traitementMethodes->connexionDatabaseReussie(mysqli_connect('localhost', 'dummy', '@root123', 'PLANETCALCULATOR'));
            $this->assertTrue($output1);
        } catch (Exception $e) {
            $output2 = false;
            $this->assertFalse($output2);
        }
    }

    /**
     * @test
     * Effectue un test de vérification si un utilisateur n'est pas inscrit
     *
     * @return void
     */
    public function testUtilisateurNonInscrit()
    {
        $traitementMethodes = new traitementMethodes();
        $connexion = mysqli_connect('localhost', 'root', '@root123', 'PLANETCALCULATOR');
        // PREMIER TEST: UTILISATEUR NON-INSCRIT
        $deleteUser = $connexion->prepare("DELETE FROM User WHERE username='test1231231234'");
        $deleteUser->execute();
        $state = $connexion->prepare("SELECT id_user, password FROM User WHERE username='test1231231234'");
        $state->execute();
        $state->store_result();

        $output1 = $traitementMethodes->utilisateurNonInscrit($state);
        $this->assertTrue($output1);

        // DEUXIEME TEST: UTILISATEUR DEJA INSCRIT:
        $deleteUser = $connexion->prepare("DELETE FROM User WHERE username='test1231231234'");
        $deleteUser->execute();
        $insertUser = $connexion->prepare("INSERT INTO User (username,password) VALUES ('test1231231234', 'azertyTest1231234')");
        $insertUser->execute();
        $state = $connexion->prepare("SELECT id_user, password FROM User WHERE username='test1231231234'");
        $state->execute();
        $state->store_result();

        $output2 = $traitementMethodes->utilisateurNonInscrit($state);
        $this->assertFalse($output2);
    }
}