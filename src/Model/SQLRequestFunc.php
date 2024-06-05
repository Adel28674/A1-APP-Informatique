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
    
    public function selectUserInformationFromUsername($username, $connexion)
    {
        $query = "SELECT * FROM user WHERE username = :username";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        
        return $statement;
    }

    public function selectUserInformationFromMail($mail, $connexion)
    {
        $query = "SELECT * FROM user WHERE mail = :mail";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':mail', $mail);
        $statement->execute();
        
        return $statement;
    }

    public function insertUser($username, $password, $name, $firstName, $email, $status, $connexion)
    {
        $stmt = $connexion->prepare("INSERT INTO `user` (`username`, `password`, `name`, `firstName`, `mail`, `status`) VALUES (?, ?, ?, ?, ?, 0)");
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

    public function modifyPassword($password, $email, $connexion)
    {
        $stmt = $connexion->prepare("UPDATE `user` SET `password` = ? WHERE `mail` = ?");
        $result = $stmt->execute([$password, $email]);
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

    public function selectAllTopics($connexion)
    {
        $query = "SELECT * FROM topic ORDER BY id ASC ";
        $statement = $connexion->prepare($query);
        $statement->execute();
        
        return $statement;
    }

    public function selectTopic($id_topic, $connexion)
    {
        $topic_query = $connexion->prepare('SELECT * FROM topic WHERE id = ?');
        $topic_query->execute([$id_topic]);
        $topic = $topic_query->fetch();
        
        return $topic;
    }

    public function selectAllMessagesOfTopic($id_topic, $connexion)
    {
        $post_query = $connexion->prepare('SELECT * FROM messages WHERE id_topic = ? ORDER BY date_creation ASC');
        $post_query->execute([$id_topic]);
        $messages = $post_query->fetchAll();
        
        return $messages;
    }

    public function insertMessage($contenu, $id_user, $id_topic, $author, $connexion)
    {
        $insert_query = $connexion->prepare('INSERT INTO messages (contenu, id_user, id_topic, date_creation, author) VALUES (?, ?, ?, NOW(), ?)');
        $insert_query->execute([$contenu, $id_user, $id_topic, $author]);
    }

    public function selectUser($id_user, $connexion)
    {
        $query = "SELECT * FROM user WHERE id = ?";
        $statement = $connexion->prepare($query);
        $statement->execute([$id_user]);
        
        return $statement->fetchAll();
    }
}