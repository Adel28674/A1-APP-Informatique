<?php

class User {
    private $id;
    private $username;
    private $password;
    private $name;
    private $firstName;
    private $email;
    private $status;
    
    public function __construct($id, $username, $password, $name, $firstName, $email, $status) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }


    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setNom($name) {
        $this->name = $name;
    }

    public function setPrenom($firstName) {
        $this->firstName = $firstName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function isAdmin() {
        return $this->status;
    }

    public function toString(){
        return $this->getUsername() . "  " . $this->getPassword() . "   " . $this->getEmail();
    }
}
?>
