<?php
require '../Model/readDataFrameFunc.php';

$data = readDataFrameFunc::getData("http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G07A");

$trame = $data[1];
$t = substr($trame,0,1);
$o = substr($trame,1,4);

list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");


// $trame = $data[1];
// $t = substr($trame,0,1);
// $o = substr($trame,1,4);

// list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
// sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
// // echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");

?>