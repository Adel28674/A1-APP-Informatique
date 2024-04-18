<?php
session_start();
//Verification de la connexion user


class SessionFunc
{

    public function doSessionExist(){
        return empty($_SESSION["id_user"]) ;
    }

    public function createSession($user){
	    $_SESSION["id"] = $user;
    }

    public function getSession(){
        return $_SESSION["id"];
    }
    
}
?>
