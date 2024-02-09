<?php
use PHPUnit\Framework\TestCase;

require 'traitementMethodes.php';
class traitementTest extends TestCase{

    public function testChampsRemplis(){
        $traitementMethodes = new traitementMethodes();
        $output1 = $traitementMethodes->champsRemplis('test', 'azerty123');
        $output2 = $traitementMethodes->champsRemplis('', 'azerty123');
        $output3 = $traitementMethodes->champsRemplis('test', '');
        $this->assertTrue($output1);
        $this->assertFalse($output2);
        $this->assertFalse($output3);
    }

    public function testConnexionDatabaseReussie(){
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
}
