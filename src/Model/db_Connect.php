<?php

$servor = "localhost";
$uname="root";
$password="";

$db_name = "sevensense7database";

$conn = mysqli_connect($servor, $uname, $password, $db_name);
if(!$conn){
    echo "connection failed";
}


?>