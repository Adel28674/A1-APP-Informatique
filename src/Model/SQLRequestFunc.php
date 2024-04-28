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
}