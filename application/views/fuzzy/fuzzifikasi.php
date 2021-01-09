<?php

echo "<h1 class='text-center'>" . $mentah['NamaUkm'] . "</h1><hr>";
echo "<h3>Lama Usaha = " . $mentah['LamaUsaha'] . "<br>Jumlah Pekerja   = " . $mentah['JumlahPekerja'] . "<br>Omzet    = " . $mentah['Omzet'] . "<br>Jumlah Aset = " . $mentah['JumlahAset'] . "</h3>";
echo "<br> <div class='panel-heading'>Fuzzifikasi</div> <br>";

//lama usaha
if ($mentah['LamaUsaha'] <= 3 and $mentah['LamaUsaha'] >= 0) {
    $Mbaru[] = 1;
    $Mmenengah[] = 0;
    $Mlama[] = 0;
} elseif ($mentah['LamaUsaha'] <7 and $mentah['LamaUsaha'] > 3) {
    $Mbaru[] = (7 - $mentah['LamaUsaha']) / 4;
    $Mmenengah[] = ($mentah['LamaUsaha']- 3) / 4;
    $Mlama[] = 0;
} elseif ($mentah['LamaUsaha'] <10 and $mentah['LamaUsaha'] >= 7) {
    $Mbaru[] = 0;
    $Mmenengah[] = (10 - $mentah['LamaUsaha']) / 3;
    $Mlama[] = ($mentah['LamaUsaha'] - 7) / 3;
}else{
    $Mbaru[] = 0;
    $Mmenengah[] = 0;
    $Mlama[] = 1; 
}


//jumlah pekerja
if ($mentah['JumlahPekerja'] <= 10 and $mentah['JumlahPekerja'] >= 0) {
    $MsedikitPkj[] = 1;
    $MsedangPkj[] = 0;
    $MbanyakPkj[] = 0;
} elseif ($mentah['JumlahPekerja'] < 20 and $mentah['JumlahPekerja'] > 10) {
    $MsedikitPkj[] = (20 - $mentah['JumlahPekerja']) / 10;
    $MsedangPkj[] = ($mentah['JumlahPekerja'] - 10) / 10;
    $MbanyakPkj[] = 0;
} elseif ($mentah['JumlahPekerja'] < 30 and $mentah['JumlahPekerja'] >= 20) {
    $MsedikitPkj[] = 0;
    $MsedangPkj[] = (30 - $mentah['JumlahPekerja']) / 10;
    $MbanyakPkj[] = ($mentah['JumlahPekerja'] - 20) / 10;
}else{
    $MsedikitPkj[] = 0;
    $MsedangPkj[] = 0;
    $MbanyakPkj[] = 1;
}

//Omzet
if ($mentah['Omzet'] <= 1 and $mentah['Omzet'] >= 0) {
    $Mkecil[] = 1;
    $MsedangOmz[] = 0;
    $Mbesar[] = 0;
} elseif ($mentah['Omzet'] < 3 and $mentah['Omzet'] > 1) {
    $Mkecil[] = (3 - $mentah['Omzet']) / 2;
    $MsedangOmz[] = ($mentah['Omzet'] - 1) / 2;
    $Mbesar[] = 0;
} elseif ($mentah['Omzet'] < 5 and $mentah['Omzet'] >= 3) {
    $Mkecil[] = 0;
    $MsedangOmz[] = (5 - $mentah['Omzet']) / 2;
    $Mbesar[] = ($mentah['Omzet'] - 3) / 2;
}else{
    $Mkecil[] = 0;
    $MsedangOmz[] = 0;
    $Mbesar[] = 1;
}

//Aset
if ($mentah['JumlahAset'] <= 5 and $mentah['JumlahAset'] >= 0) {
    $MsedikitAst[] = 1;
    $MsedangAst[] = 0;
    $MbanyakAst[] = 0;
} elseif ($mentah['JumlahAset'] < 7 and $mentah['JumlahAset'] > 5) {
    $MsedikitAst[] = (7 - $mentah['JumlahAset']) / 2;
    $MsedangAst[] = ($mentah['JumlahAset'] - 5) / 2;
    $MbanyakAst[] = 0;
} elseif ($mentah['JumlahAset'] < 10 and $mentah['JumlahAset'] >= 7) {
    $MsedikitAst[] = 0;
    $MsedangAst[] = (10 - $mentah['JumlahAset']) / 3;;
    $MbanyakAst[] = ($mentah['JumlahAset'] - 7) / 3;
}else{
    $MsedikitAst[] = 0;
    $MsedangAst[] = 0;
    $MbanyakAst[] = 1;
}


?>

<h3>Fungsi Keanggotaan Lama Usaha [<?=$mentah['LamaUsaha'];?>]</h3>

<img src="<?=base_url('file/grafik/1.png');?>" height=400px>

<table>
    <tr>
        <td>M Baru (µ)</td>
        <td>=</td>
        <td><?= $Mbaru[0]; ?></td>
    <tr>
        <td>M Menengah (µ)</td>
        <td>=</td>
        <td><?= $Mmenengah[0]; ?></td>
    <tr>
        <td>M Lama (µ)</td>
        <td>=</td>
        <td><?= $Mlama[0]; ?></td>
    </tr>
</table>

<h3>Fungsi Jumlah Pekerja [<?=$mentah['JumlahPekerja'];?>]</h3>
<img src="<?=base_url('file/grafik/2.png');?>" height=400px>

<table>
    <tr>
        <td>M Sedikit (µ)</td>
        <td>=</td>
        <td><?= $MsedikitPkj[0]; ?></td>
    <tr>
        <td>M Sedang (µ)</td>
        <td>=</td>
        <td><?= $MsedangPkj[0]; ?></td>
    <tr>
        <td>M Banyak (µ)</td>
        <td>=</td>
        <td><?= $MbanyakPkj[0]; ?></td>
    </tr>
</table>

<h3>Fungsi Keanggotaan Omzet [<?=$mentah['Omzet'];?>]</h3>
<img src="<?=base_url('file/grafik/3.png');?>" height=400px>

<table>
    <tr>
        <td>M Kecil (µ)</td>
        <td>=</td>
        <td><?= $Mkecil[0]; ?></td>
    <tr>
        <td>M Sedang (µ)</td>
        <td> =</td>
        <td><?= $MsedangOmz[0]; ?></td>
    <tr>
        <td>M Besar (µ)</td>
        <td>=</td>
        <td><?= $Mbesar[0]; ?></td>
    </tr>
</table>

<h3>Fungsi Keanggotaan Jumlah Aset [<?=$mentah['JumlahAset'];?>]</h3>
<img src="<?=base_url('file/grafik/4.png');?>" height=400px>
<table>
    <tr>
        <td>M Sedikit (µ)</td>
        <td>=</td>
        <td><?= $MsedikitAst[0]; ?></td>
    <tr>
        <td>M Sedang (µ)</td>
        <td>=</td>
        <td><?= $MsedangAst[0]; ?></td>
    <tr>
        <td>M Banyak (µ)</td>
        <td>=</td>
        <td><?= $MbanyakAst[0]; ?></td>
    </tr>
</table>