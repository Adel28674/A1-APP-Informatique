<?php
class EncryptionFunc{
 
    public function __construct(){

    }

    public function hashPassword($password) {
        return hash('sha256', $password);
    }

    public function verifyPasswordSimple($password, $storedHash) {
        $hash = hash('sha256', $password);
        return hash_equals($storedHash, $hash);
    }
}

?>