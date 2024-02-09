<?php
use PHPUnit\Framework\TestCase;
require 'probaMethodes.php';

class moduleprobaTest extends TestCase{
    public function testProbaValeurValide(){
        // Cas d'utilisation: L'utilisateur rentre des valeurs valides
        $proba = new probaMethodes();
        $output1 = $proba->probaRectangleGauche(1, 2, 3);
        $output2 = $proba->probaTrapeze(1, 2, 3);
        $output3 = $proba->probaSimpson(1, 2, 3);
        $this->assertEquals(0.83995, $output1);
        $this->assertEquals(0.83999, $output2);
        $this->assertEquals(0.83999, $output3);
    }

    public function testProbaValeurInvalide(){
        // Cas d'utilisation: L'utilisateur rentre des valeurs invalides
        $proba = new probaMethodes();
        // Méthode Rectangle Gauche
        $output1 = $proba->probaRectangleGauche(1,2,'char');
        $output2 = $proba->probaRectangleGauche(1,'char', 3);
        $output3 = $proba->probaRectangleGauche('char', 2, 3);
        $this->assertStringContainsString("Les valeurs doivent être des nombres entiers ou décimaux.", $output1);
        $this->assertStringContainsString("Les valeurs doivent être des nombres entiers ou décimaux.", $output2);
        $this->assertStringContainsString("Les valeurs doivent être des nombres entiers ou décimaux.", $output3);
        // Méthode Trapeze
        $output1 = $proba->probaTrapeze(1,2,'char');
        $output2 = $proba->probaTrapeze(1,'char', 3);
        $output3 = $proba->probaTrapeze('char', 2, 3);
        $this->assertStringContainsString("Les valeurs doivent être des nombres entiers ou décimaux.", $output1);
        $this->assertStringContainsString("Les valeurs doivent être des nombres entiers ou décimaux.", $output2);
        $this->assertStringContainsString("Les valeurs doivent être des nombres entiers ou décimaux.", $output3);
        // Méthode Simpson
        $output1 = $proba->probaSimpson(1,2,'char');
        $output2 = $proba->probaSimpson(1,'char', 3);
        $output3 = $proba->probaSimpson('char', 2, 3);
        $this->assertStringContainsString("Les valeurs doivent être des nombres entiers ou décimaux.", $output1);
        $this->assertStringContainsString("Les valeurs doivent être des nombres entiers ou décimaux.", $output2);
        $this->assertStringContainsString("Les valeurs doivent être des nombres entiers ou décimaux.", $output3);
    }

    public function testProbaSameResult(){
        //Cas d'utilisation: Les trois méthodes retournent le même résultat (au 10^3 près)
        $proba = new probaMethodes();
        $output1 = round($proba->probaRectangleGauche(1,2,3),3);
        $output2 = round($proba->probaTrapeze(1,2,3),3);
        $output3 = round($proba->probaSimpson(1,2,3),3);
        $this->assertEquals($output1,$output2);
        $this->assertEquals($output2,$output3);
        $this->assertEquals($output1,$output3);
    }

    public function testProbaChampVite(){
        //Cas d'utilisation: L'un ou plusieurs des champs sont vides
        $proba = new probaMethodes();
        $output1 = $proba->probaRectangleGauche(1,2, "");
        $output2 = $proba->probaTrapeze(1,2,"");
        $output3 = $proba->probaSimpson(1,2,"");
        $this->assertStringContainsString("Veuillez tous remplir les champs.", $output1);
        $this->assertStringContainsString("Veuillez tous remplir les champs.", $output2);
        $this->assertStringContainsString("Veuillez tous remplir les champs.", $output3);
    }
}