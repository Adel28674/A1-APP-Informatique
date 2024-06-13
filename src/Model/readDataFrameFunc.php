<?php

class readDataFrameFunc{

    public static function getData($link)
    {
        $ch = curl_init();
        curl_setopt(
            $ch,
            CURLOPT_URL,
            $link
        );
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public static function decodeData($data){
        $trame = $data[1];
        $t = substr($trame,0,1);
        $o = substr($trame,1,4);

        list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");
    }
}
?>
