<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Fuzzy_model');
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
	}

	public function index()
	{
		$data['title'] = 'upload';

		$this->load->view('Templates/header', $data);
		$this->load->view('upload');
		$this->load->view('Templates/footer', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'detail';
		$data['iniid'] = $id;
		$data['mentah'] = $this->Fuzzy_model->get_by_id($id);

		$this->load->view('Templates/header', $data);
		$this->load->view('detail', $data);
		$this->load->view('Templates/footer', $data);
	}

	public function detailukm($id)
	{
		$data['title'] = 'upload';
		$data['mentah'] = $this->Fuzzy_model->get_by_datailid($id);

		$this->load->view('Templates/header', $data);
		$this->load->view('detailukm', $data);
		$this->load->view('Templates/footer', $data);
	}

	public function excel()
	{
		$date = date('Ymd');
		$idS = $this->input->post('IdSidang', TRUE);
		$config['upload_path'] = './file/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '5048';
		$config['overwrite'] = true;

		$this->load->library('upload', $config);
		$this->upload->do_upload('inexcel');
		if ($this->upload->do_upload('inexcel')) {
			$namefile = $this->upload->data('file_name');
			$objReader  = new PHPExcel_Reader_Excel2007();
			$objPHPExcel = $objReader->load('file/' . $namefile);
			$sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
			$id = $this->Fuzzy_model->get_kode();
			$data = array();
			$numrow = 1;
			// $idpeng = $this->Pengacara_model->get_number();
			foreach ($sheet as $row) {
				// $ho = $idpeng++;
				if ($numrow > 1) {
					array_push($data, array(
						'id_fuzzy' => $id,
						'NamaUkm' => $row['A'],
						'LamaUsaha' => $row['B'],
						'JumlahPekerja' => $row['C'],
						'Omzet' => $row['D'],
						'JumlahAset' => $row['E'],
					));
				}
				$numrow++;
			}

			foreach ($data as $key => $value) {
				unset($zet);
				$NamaUkm = $value['NamaUkm'];
				$LamaUsaha = $value['LamaUsaha'];
				$JumlahPekerja = $value['JumlahPekerja'];
				$Omzet = $value['Omzet'];
				$JumlahAset = $value['JumlahAset'];

				//fuzzifikasi---------------------------

				//lama usaha
				if ($LamaUsaha <= 3 and $LamaUsaha >= 0) {
					$Mbaru = 1;
					$Mmenengah = 0;
					$Mlama = 0;
				} elseif ($LamaUsaha <= 7 and $LamaUsaha > 3) {
					$Mbaru =  (7 - $LamaUsaha) / 4;
					$Mmenengah =($LamaUsaha - 3) / 4;
					$Mlama = 0;
				} elseif ($LamaUsaha > 7) {
					$Mbaru = 0;
					$Mmenengah = (10 - $LamaUsaha) / 3;;
					$Mlama = ($LamaUsaha - 7) / 3;
				}else{
					$Mbaru = 0;
					$Mmenengah = 0;
					$Mlama = 1;
				}

				//jumlah pekerja
				if ($JumlahPekerja < 10 and $JumlahPekerja >= 0) {
					$MsedikitPkj = 1;
					$MsedangPkj = 0;
					$MbanyakPkj = 0;
				} elseif ($JumlahPekerja < 20 and $JumlahPekerja >= 10) {
					$MsedikitPkj = (20 - $JumlahPekerja) / 10;
					$MsedangPkj = ($JumlahPekerja - 10) / 10;
					$MbanyakPkj = 0;
				} elseif ($JumlahPekerja <= 30 and $JumlahPekerja >= 20) {
					$MsedikitPkj = 0;
					$MsedangPkj = (30 - $JumlahPekerja) / 10;;
					$MbanyakPkj = ($JumlahPekerja - 20) / 10;
				}else{
					$MsedikitPkj = 0;
					$MsedangPkj = 0;
					$MbanyakPkj = 1;
				}

				//Omzet
				if ($Omzet < 1 and $Omzet >= 0) {
					$Mkecil = 1;
					$MsedangOmz = 0;
					$Mbesar = 0;
				} elseif ($Omzet < 3 and $Omzet >= 1) {
					$Mkecil = (3 - $Omzet) / 2;
					$MsedangOmz = ($Omzet - 1) / 2;
					$Mbesar = 0;
				} elseif ($Omzet <= 5 and $Omzet >= 3) {
					$Mkecil = 0;
					$MsedangOmz = (5 - $Omzet) / 2;;
					$Mbesar = ($Omzet - 3) / 2;
				}else{
					$Mkecil = 0;
					$MsedangOmz = 0;
					$Mbesar = 1;
				}

				//Aset
				if ($JumlahAset < 5 and $JumlahAset >= 0) {
					$MsedikitAst =1;
					$MsedangAst = 0;
					$MbanyakAst = 0;
				} elseif ($JumlahAset < 7 and $JumlahAset >= 5) {
					$MsedikitAst = (7 - $JumlahAset) / 2;
					$MsedangAst = ($JumlahAset - 5) / 2;
					$MbanyakAst = 0;
				} elseif ($JumlahAset <= 10 and $JumlahAset >= 7) {
					$MsedikitAst = 0;
					$MsedangAst = (10 - $JumlahAset) / 3;;
					$MbanyakAst = ($JumlahAset - 7) / 3;
				}else{
					$MsedikitAst = 0;
					$MsedangAst = 0;
					$MbanyakAst = 1;
				}

				$x = 1;
				$s = 0;
				for ($i = 0; $i < 3; $i++) {

					if ($i == 0) {
						$lu = "baru";
						$lu2 = $Mbaru;
					} elseif ($i == 1) {
						$lu = "menengah";
						$lu2 = $Mmenengah;
					} else {
						$lu = "lama";
						$lu2 = $Mlama;
					}

					for ($j = 0; $j < 3; $j++) {
						if ($j == 0) {
							$jp = "sedikit";
							$jp2 = $MsedikitPkj;
						} elseif ($j == 1) {
							$jp = "sedang";
							$jp2 = $MsedangPkj;
						} else {
							$jp = "banyak";
							$jp2 = $MbanyakPkj;
						}

						for ($k = 0; $k < 3; $k++) {
							if ($k == 0) {
								$o = "kecil";
								$o2 = $Mkecil;
							} elseif ($k == 1) {
								$o = "sedang";
								$o2 = $MsedangOmz;
							} else {
								$o = "besar";
								$o2 = $Mbesar;
							}
							for ($l = 0; $l < 3; $l++) {


								if ($l == 0) {
									$a = "sedikit";
									$a2 = $MsedikitAst;
								} elseif ($l == 1) {
									$a = "sedang";
									$a2 = $MsedangAst;
								} else {
									$a = "banyak";
									$a2 = $MbanyakAst;
								}
								if ($x <= 27 and $x >= 0) {
									$kptsn = "TIDAK";
								} elseif ($x <= 54 and $x >= 28) {
									$kptsn = "TUNDA";
								} else {
									$kptsn = "YA";
								}
								if (min($lu2, $jp2, $o2, $a2) != 0) {
									$zet[$key][$s]["no"] = $s + 1;
									$zet[$key][$s]["keputusan"] = $kptsn;
									$zet[$key][$s]["min"] = min($lu2, $jp2, $o2, $a2);
								}
								$x++;
								$s++;
							}
						}
					}
				}
				$r = 0;
				$atas = 0;
				$bawah = 0;
				foreach ($zet as $zetzet) {
					foreach ($zetzet as $zetzetzet) {
						if ($zetzetzet["keputusan"] == "TIDAK") {
							$ZZ[$r] = 25 * $zetzetzet["min"]*(-1) + 50;
							// echo $zetzetzet["min"] . "= (Z - 25) / (50 - 25) => Z<sub>" . $zetzetzet["no"] . "</sub> = " . $ZZ[$r] . "<br>";
						} elseif ($zetzetzet["keputusan"] == "TUNDA") {
							$ZZ[$r] = 25 * $zetzetzet["min"]*(-1) + 75;
							// echo $zetzetzet["min"] . "= (Z - 50) / (75 - 50) => Z<sub>" . $zetzetzet["no"] . "</sub> = " . $ZZ[$r] . "<br>";
						} elseif ($zetzetzet["keputusan"] == "YA") {
							$ZZ[$r] = 25 * $zetzetzet["min"] + 50;
							// echo $zetzetzet["min"] . "= (Z - 50) / (75 - 50) => Z<sub>" . $zetzetzet["no"] . "</sub> = " . $ZZ[$r] . "<br>";
						}
						$atas = $atas + ($ZZ[$r] * $zetzetzet["min"]);
						$bawah = $bawah + $zetzetzet["min"];
						$r++;
					}
				}
				$Znilai = $atas / $bawah;
				if (ceil($Znilai) <= 37.5) {
					$keputusan[$key] = "TIDAK";
				} elseif (ceil($Znilai) > 37.5 and ceil($Znilai) <= 62.5) {
					$keputusan[$key] = "TUNDA";
				} else {
					$keputusan[$key] = "YA";
				}
			}
			$numrow2 = 0;
			$datax = array();
			foreach ($keputusan as $ukam) {
				array_push($datax, array(
					'id_fuzzy' => $id,
					'NamaUkm' => $data[$numrow2]['NamaUkm'],
					'LamaUsaha' => $data[$numrow2]['LamaUsaha'],
					'JumlahPekerja' => $data[$numrow2]['JumlahPekerja'],
					'Omzet' => $data[$numrow2]['Omzet'],
					'JumlahAset' => $data[$numrow2]['JumlahAset'],
					'HasilKeputusan' => $ukam,
				));
				$numrow2++;
			}

			// echo "<pre>";
			// 	var_dump($datax);
			// echo "</pre>";


			$datadbfuzzy = [
				'id_fuzzy' => $id
			];
			$this->Fuzzy_model->fuzzy($datadbfuzzy);
			$this->Fuzzy_model->insert_excel($datax);
			redirect('Welcome/detail/' . $id);
		} else {
			echo $this->upload->display_errors();
		}
	}
}
