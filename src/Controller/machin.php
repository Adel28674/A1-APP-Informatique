<?php
    $value = 0; 
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G07A");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    echo "Raw Data:<br />";
    echo("$data");

$data_tab = str_split($data, 33);
echo "Tabular Data:<br />";
echo "<br>". count($data_tab);
$current_date = date('YmdHis');
  

for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
    $trame = $data_tab[$i];
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    echo "la valeur du capteur ". $c." est égale à ".$v." le ".$day."/".$month."/".$year." à ".$hour.":".$min.":".$sec."<br>";
}


?>