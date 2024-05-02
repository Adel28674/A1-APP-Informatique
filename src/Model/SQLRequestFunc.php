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

    public function modifyInformations($name, $firstName, $newMail, $mail,  $connexion)
    {
        $stmt = $connexion->prepare("UPDATE `user` SET `name` = ?, `firstName` = ?, `mail` = ? WHERE `mail` = ?");
        $result = $stmt->execute([$name, $firstName, $newMail, $mail]);
        return $result;
    }

    public function deleteUser($mail,  $connexion)
    {
        $stmt = $connexion->prepare("DELETE FROM `user` WHERE `mail` = ?");
        $result = $stmt->execute([$mail]);
    }

    public function promoteUser($mail,  $connexion)
    {
        $stmt = $connexion->prepare("UPDATE `user` SET `status` = ? WHERE `mail` = ?");
        $result = $stmt->execute([1, $mail]);
    }

    public function retrogradeUser($mail,  $connexion)
    {
        $stmt = $connexion->prepare("UPDATE `user` SET `status` = ? WHERE `mail` = ?");
        $result = $stmt->execute([0, $mail]);
    }
}