<?php
class probaMethodes {
    public function probaRectangleGauche($variance, $ecart_type, $seuil){
        if (empty($variance) || empty($ecart_type) || empty($seuil)) {
            return "Veuillez tous remplir les champs.";
        } else {
            $output = exec('python3 $(pwd)/probaRectangleGauche.py '.$variance." ".$ecart_type." ".$seuil);
            return $output;
        }
    }
    public function probaTrapeze($variance, $ecart_type, $seuil){
        if (empty($variance) || empty($ecart_type) || empty($seuil)) {
            return "Veuillez tous remplir les champs.";
        } else {
            $output = exec('python3 $(pwd)/probaTrapeze.py ' . $variance . " " . $ecart_type . " " . $seuil);
            return $output;
        }
    }
    public function probaSimpson($variance, $ecart_type, $seuil){
        if (empty($variance) || empty($ecart_type) || empty($seuil)) {
            return "Veuillez tous remplir les champs.";
        } else {
            $output = exec('python3 $(pwd)/probaSimpson.py ' . $variance . " " . $ecart_type . " " . $seuil);
            return $output;
        }
    }
}