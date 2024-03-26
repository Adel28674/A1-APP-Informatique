<?php
session_start();
//Verification de la connexion user


class SessionFunc
{

    public function doSessionExist(){
        return empty($_SESSION["id_user"]) ;
    }
    
}
?>
