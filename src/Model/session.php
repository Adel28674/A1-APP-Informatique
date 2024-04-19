<?php
session_start();
//Verification de la connexion user
require_once 'User.php';



class SessionFunc
{

    public function doSessionExist(){
        return empty($_SESSION["id_user"]) ;
    }

    public function createSession($user){
	    $_SESSION["id"] = $user;
    }

    public function createUserSession($user){
	    $_SESSION["user"] = $user;
    }

    public function getSession(){
        return $_SESSION["id"];
    }
    
}
?>
