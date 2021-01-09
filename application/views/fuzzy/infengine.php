<?php
echo "<br> <div class='panel-heading'>Inference Engine</div> <br>";
	$x = 1;
$s = 0;
for ($i = 0; $i < 3; $i++) {

	if ($i == 0) {
		$lu = "baru";
		$lu2 = $Mbaru[0];
	} elseif ($i == 1) {
		$lu = "menengah";
		$lu2 = $Mmenengah[0];
	} else {
		$lu = "lama";
		$lu2 = $Mlama[0];
	}

	for ($j = 0; $j < 3; $j++) {

		if ($j == 0) {
			$jp = "sedikit";
			$jp2 = $MsedikitPkj[0];
		} elseif ($j == 1) {
			$jp = "sedang";
			$jp2 = $MsedangPkj[0];
		} else {
			$jp = "banyak";
			$jp2 = $MbanyakPkj[0];
		}

		for ($k = 0; $k < 3; $k++) {
			if ($k == 0) {
				$o = "kecil";
				$o2 = $Mkecil[0];
			} elseif ($k == 1) {
				$o = "sedang";
				$o2 = $MsedangOmz[0];
			} else {
				$o = "besar";
				$o2 = $Mbesar[0];
			}
			for ($l = 0; $l < 3; $l++) {


				if ($l == 0) {
					$a = "sedikit";
					$a2 = $MsedikitAst[0];
				} elseif ($l == 1) {
					$a = "sedang";
					$a2 = $MsedangAst[0];
				} else {
					$a = "banyak";
					$a2 = $MbanyakAst[0];
				}
				if ($x <= 40 and $x >= 0) {
					$kptsn = "TIDAK";
				} elseif ($x <= 54 and $x >= 28) {
					$kptsn = "TUNDA";
				} else {
					$kptsn = "YA";
				}
				if (min($lu2, $jp2, $o2, $a2) != 0) {


					echo "[R<sub>" . $x . "</sub>]Jika Lama Usaha " . $mentah['LamaUsaha'] . ", Jumlah Pekerja " . $mentah['JumlahPekerja'] . ", Omzet " . $mentah['Omzet'] . ", Jumlah Aset " . $mentah['JumlahAset'] . " maka hasil keputusan " . $kptsn . "<br>";
					echo "<div class='container'>
				α<sub>" . $x . "</sub> = Min(µ" . $lu . "[4], µ" . $jp . "[15], µ" . $o . "[4], µ" . $a . "[6])<br>
				α<sub>" . $x . "</sub>    = Min(" . $lu2 . "," . $jp2 . "," . $o2 . "," . $a2 . ")<br>
				α<sub>" . $x . "</sub>    = " . min($lu2, $jp2, $o2, $a2) . " 
				</div><br><br>";
					$zet[$s]["no"] = $s + 1;
					$zet[$s]["keputusan"] = $kptsn;
					$zet[$s]["min"] = min($lu2, $jp2, $o2, $a2);
				}

				$x++;
				$s++;
			}
		}
	}
}

?>