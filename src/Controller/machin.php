<?php
header('Content-Type: application/json');

$valueTemp = 0;
$valueSon = 0;

$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G07A"
);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data, 33);

for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
    $trame = $data_tab[$i];
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

    if ($c == 3) {
        $valueTemp = $v;
    } elseif ($c == 1) {
        $valueSon = $v;
    }
}

echo json_encode([
    'valueTemp' => $valueTemp,
    'valueSon' => $valueSon,
]);
?>
