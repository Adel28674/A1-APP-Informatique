<?php

class SQLRequestFunc{
    public function __construct(){

    }

    public function selectUserInformation($username, $password, $connexion)
    {
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->execute();
        
        return $statement;
    }
    
    public function selectUserInformationFromMail($username, $connexion)
    {
        $query = "SELECT * FROM user WHERE username = :username";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        
        return $statement;
    }

    public function insertUser($username, $password, $name, $firstName, $email, $status, $connexion)
    {
        $stmt = $connexion->prepare("INSERT INTO `user` (`username`, `password`, `name`, `firstName`, `mail`, `status`) VALUES (?, ?, ?, ?, ?, 1)");
        $stmt->execute([$username, $password, $name, $firstName, $email]);
        return $stmt;
    }

    public function selectAllUsers($connexion)
    {
        $query = "SELECT * FROM user";
        $statement = $connexion->prepare($query);
        $statement->execute();
        
        return $statement;
    }
}