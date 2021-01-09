<br> <div class="panel-heading">Defuzzifikasi</div> 
<img src="<?=base_url('file/grafik/5.png');?>" height=400px><br>
<table width="50%">
    

<?php

$r = 0;
$atas = 0;
$bawah = 0;
foreach ($zet as $z) {
echo "<tr>";
    if ($z["keputusan"] == "TIDAK") {
        $ZZ[$r] = 25 * $z["min"]*(-1) + 50;
        echo "<td>[".$z["keputusan"]."]";
        echo "<td>".$z["min"] . "= (50 - Z) / (50 - 25) => Z<sub>" . $z["no"] . "</sub> = " . $ZZ[$r] . "<br>";
    } elseif ($z["keputusan"] == "TUNDA") {
        $ZZ[$r] = 25 * $z["min"]*(-1) + 75;
        echo "<td>[".$z["keputusan"]."]";
        echo "<td>".$z["min"] . "= (75 - Z) / (75 - 50) => Z<sub>" . $z["no"] . "</sub>= " . $ZZ[$r] . "<br>";
    } elseif ($z["keputusan"] == "YA") {
        $ZZ[$r] = 25 * $z["min"] + 50;
        echo "<td>[".$z["keputusan"]."]";
        echo "<td>".$z["min"] . "= (Z - 50) / (75 - 50) => Z<sub>" . $z["no"] . "</sub>= " . $ZZ[$r] . "<br>";
    }
    $atas = $atas + ($ZZ[$r] * $z["min"]);
    $bawah = $bawah + $z["min"];
    $r++;
    echo "</tr>";
}
$Znilai = $atas / $bawah;
echo "</table><br>Z = ".$Znilai."<br>";

if (ceil($Znilai) <= 37.5) {
    $keputusan[] = "TIDAK";
} elseif (ceil($Znilai) > 37.5 and ceil($Znilai) <= 62.5) {
    $keputusan[] = "TUNDA";
} else {
    $keputusan[] = "YA";
}

echo "<h3><br><br>Keputusan : " . $keputusan[0];
echo "</h3><br><br>";
?>