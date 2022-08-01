<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('Pdf');
		$this->load->library('Pdf_akta');
		$this->load->library('Pdf_pks');
		$this->load->library('Pdf_izin');
		$this->load->model('DisplayData');
		$this->load->model('ImportGaji');
		$this->load->model('ImportLembur');
	}

	public function pdf() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin')
			);
			$user = $sesiLog['username'];
			$pdf = $this->pdf->getPdf();
			$pdf->AliasNbPages('{pages}');
			$pdf->AddPage('L', 'A4', 0);
			$pdf->SetFont('Arial', '', 8);
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetFillColor(0, 0, 0);
			$pdf->SetDrawColor(0, 0, 0);
			if ($this->input->post('pdf', TRUE)=='') {
				$this->allpdf();
			} else {
				$val = explode('/', $this->input->post('pdf', TRUE));
				for ($i=0; $i < count($val)-1; $i++) { 
					$hasil = $this->DisplayData->cetak($val[$i]);
					$cetak = $hasil->row_array();
					$w = 127;
					$h = 5;
					if ($pdf->GetStringWidth($cetak['alamat']) < $w) {
						$line = 1;
					} else {
						$ptxt = strlen($cetak['alamat']);
						$eror = 10;
						$char = 0;
						$maxchar = 0;
						$txtarray = array();
						$holdtxt = "";

						while ($char < $ptxt) {
							while ($pdf->GetStringWidth($holdtxt) < ($w - $eror) && ($char + $maxchar) < $ptxt) {
								$maxchar++;
								$holdtxt = substr($cetak['alamat'], $char, $maxchar);
							}
							$char = $char + $maxchar;
							array_push($txtarray, $holdtxt);
							$maxchar = 0;
							$holdtxt = "";
						}
						$line = count($txtarray);
					}
					$pdf->SetAutoPageBreak(true, 10);
					$pdf->Cell(10, ($line * $h), $i+1, 'LB', 0, 'C');
					$pdf->Cell(44, ($line * $h), $cetak['nama'], 'LB', 0, 'L', false);
					$pdf->Cell(52, ($line * $h), $cetak['jbtn'], 'LB', 0, 'L', false);
					$pdf->Cell(28, ($line * $h), $cetak['ktp'], 'LBR', 0, 'C', false);
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($w, $h, $cetak['alamat'], 'B', 'L');
					$pdf->SetXY($x + $w, $y);
					$pdf->Cell(17, ($line * $h), date_format(date_create($cetak['on']), "d-m-Y"), 'LBR', 1, 'C', false);
				}
				$pdf->Ln(3);
				$pdf->Cell(11);
				$pdf->Cell(20, 5, 'Di Cetak Oleh : Randi Windarsah', 0, 1, 'C', false);
				$pdf->Output('Data Karyawan.pdf', 'I');
			}
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function allpdf(){
		$pdf = $this->pdf->getPdf();
		$pdf->AliasNbPages('{pages}');
		$pdf->AddPage('L', 'A4', 0);
		$pdf->SetFont('Arial', '', 8);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFillColor(0, 0, 0);
		$pdf->SetDrawColor(0, 0, 0);
		$hasil = $this->DisplayData->cetakpdfall();
		$no=1;
		foreach ($hasil->result() as $cetak) {
			$w = 127;
			$h = 5;
			if ($pdf->GetStringWidth($cetak->alamat) < $w) {
				$line = 1;
			} else {
				$ptxt = strlen($cetak->alamat);
				$eror = 10;
				$char = 0;
				$maxchar = 0;
				$txtarray = array();
				$holdtxt = "";

				while ($char < $ptxt) {
					while ($pdf->GetStringWidth($holdtxt) < ($w - $eror) && ($char + $maxchar) < $ptxt) {
						$maxchar++;
						$holdtxt = substr($cetak->alamat, $char, $maxchar);
					}
					$char = $char + $maxchar;
					array_push($txtarray, $holdtxt);
					$maxchar = 0;
					$holdtxt = "";
				}
				$line = count($txtarray);
			}
			$pdf->SetAutoPageBreak(true, 10);
			$pdf->Cell(10, ($line * $h), $no, 'LB', 0, 'C');
			$pdf->Cell(44, ($line * $h), $cetak->nama, 'LB', 0, 'L', false);
			$pdf->Cell(52, ($line * $h), $cetak->jbtn, 'LB', 0, 'L', false);
			$pdf->Cell(28, ($line * $h), $cetak->ktp, 'LBR', 0, 'C', false);
			$x = $pdf->GetX();
			$y = $pdf->GetY();
			$pdf->MultiCell($w, $h, $cetak->alamat, 'B', 'L');
			$pdf->SetXY($x + $w, $y);
			$pdf->Cell(17, ($line * $h), date_format(date_create($cetak->on), "d-m-Y"), 'LBR', 1, 'C', false);
			$no++;
		}
		$pdf->Ln(3);
		$pdf->Cell(11);
		$pdf->Cell(20, 5, 'Di Cetak Oleh : Randi Windarsah', 0, 1, 'C', false);
		$pdf->Output('Data Karyawan.pdf', 'I');		
	}

	public function excel() {
		if ($this->session->has_userdata('hasadmin')) {
			if ($this->input->post('excel', TRUE)=='') {
				$sesiLog = array(
					'username' => $this->session->userdata('useradmin'),
					'excel' => $this->DisplayData->cetakpdfall()
				);
			} else {
				$val = explode('/', $this->input->post('excel', TRUE));
				$excel_arr = array();
				for ($i=0; $i < count($val)-1; $i++) { 
					$excel = $this->DisplayData->cetak($val[$i]);
					$excel_arr[] = $excel->row_array();
				}
				$sesiLog = array(
					'username' => $this->session->userdata('useradmin'),
					'excel' => $excel_arr
				);
			}
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('excel/excel', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function cv() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin')
			);
			$pdf = new FPDF();
			if ($this->input->post('cv', TRUE)=='') {
				$this->allcv();
			} else {
				$val = explode('/', $this->input->post('cv', TRUE));
				for ($i=0; $i < count($val)-1; $i++) { 
					$hasil = $this->DisplayData->cetak($val[$i]);
					$cv = $hasil->row_array();
					$fotocv = explode('/', $cv['fotolink']);
					$foto = $fotocv[5];
					if ($foto == 'kosong') {
						if ($cv['jk'] == 1) {
							$urlfoto = $_SERVER['DOCUMENT_ROOT'].'/assets/img/man-no-img.png';
						} else {
							$urlfoto = $_SERVER['DOCUMENT_ROOT'].'/assets/img/woman-no-img.png';//site_url('assets/img/woman-no-img.png');
						}
					} else {
						$urlfoto = $_SERVER['DOCUMENT_ROOT'].$cv['fotolink'];//site_url($cv['fotolink']);
					}
					if ($cv['nikah'] == 'TK') {
						$nikah = 'BELUM MENIKAH';
					} elseif ($cv['nikah'] == 'K0') {
						$nikah = 'SUDAH MENIKAH, BELUM MEMILIKI ANAK';
					} elseif ($cv['nikah'] == 'K1') {
						$nikah = 'SUDAH MENIKAH, ANAK 1';
					} elseif ($cv['nikah'] == 'K2') {
						$nikah = 'SUDAH MENIKAH, ANAK 2';
					} elseif ($cv['nikah'] == 'K3') {
						$nikah = 'SUDAH MENIKAH, ANAK 3';
					} elseif ($cv['nikah'] == 'K4') {
						$nikah = 'SUDAH MENIKAH, ANAK 4';
					} elseif ($cv['nikah'] == 'K5') {
						$nikah = 'SUDAH MENIKAH, ANAK 5';
					} elseif ($cv['nikah'] == 'K6') {
						$nikah = 'SUDAH MENIKAH, ANAK 6';
					} else {
						$nikah = 'KOSONG';
					}
					if ($cv['status']=='SK1') {
    					$status = 'AKTIF';
    				} elseif ($cv['status']=='SK2') {
    					$status = 'TIDAK AKTIF/RESIGN TANGGAL '.date_format(date_create($cv['off']), "d-m-Y");
    				} elseif ($cv['status']=='SK3') {
    					$status = 'TIDAK AKTIF/PECAT TANGGAL '.date_format(date_create($cv['off']), "d-m-Y");
    				} elseif ($cv['status']=='SK4') {
    					$status = 'SKOR/RUMAHKAN SAMPAI TANGGAL '.date_format(date_create($cv['off']), "d-m-Y");
    				} elseif ($cv['status']=='SK5') {
    				 	$status = 'CUTI SAMPAI TANGGAL '.date_format(date_create($cv['off']), "d-m-Y");
    				} elseif ($cv['status']=='SK6') {
    				 	$status = 'TIDAK AKTIF/MENINGGAL DUNIA,'.date_format(date_create($cv['off']), "d-m-Y");
    				} else {
    					$status = 'KOSONG';
    				}
					if ($cv['jk'] == 1) {
						$jk = 'LAKI-LAKI';
					} else {
						$jk = 'PEREMPUAN';
					}
					if ($cv['div'] == 'kosong' || $cv['div'] == '') {
						$div = 'DIVISI';
					} else {
						$div = $cv['div'];
					}
					if ($cv['medsos']=='') {
					  	$email = '';
					  	$wa = '';
					  	$ig = '';
					  	$fb = '';
				  	} else {
				  		$medsos = explode('//', $cv['medsos']);
					  	$email = $medsos[0];
					  	$wa = $medsos[1];
					  	$ig = $medsos[2];
					  	$fb = $medsos[3];
				  	}
					$pdf->AddPage('P', 'A4', 0);
					$pdf->SetFont('Arial', 'B', 18);
					$pdf->Cell(0, 7, 'DATA PERSONAL KARYAWAN', 0, 1, 'C', false);
					$pdf->Ln(1);
					$pdf->Cell(0, 0.5, '', 0, 1, 'C', true);
					$pdf->Ln(0.5);
					$pdf->Cell(0, 0.5, '', 0, 1, 'C', true);
					$pdf->Ln(5);
					$pdf->Image($urlfoto, 10, 23, 75, 95); //51, 76
					$pdf->SetFont('Arial', 'B', 14);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'NAMA', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $cv['nama'], 0, 1, 'L', false);
					$pdf->Ln(2);
					$pdf->SetFont('Arial', '', 11);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'NIK', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $cv['nik'], 0, 1, 'L', false);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'KTP', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $cv['ktp'], 0, 1, 'L', false);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'JABATAN', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $cv['jbtn'], 0, 1, 'L', false);
					$pdf->Cell(115);
					$pdf->Cell(70, 6, '(' . $div . ')', 0, 1, 'L', false);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'TTL', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $cv['t'].', '.date_format(date_create($cv['tl']), "d-m-Y").' / ('.$cv['umur'].'  Tahun)', 0, 1, 'L', false);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'NO. TLP', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $cv['tlp'].' / WA('.$wa.')', 0, 1, 'L', false);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'EMAIL', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $email, 0, 1, 'L', false);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'AGAMA', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $cv['agama'], 0, 1, 'L', false);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'PENDIDIKAN', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $cv['ilmu'], 0, 1, 'L', false);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'JENIS KELAMIN', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $jk, 0, 1, 'L', false);
					$pdf->Ln(1);
					$pdf->Cell(80);
					$pdf->Cell(33, 6, 'STATUS', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 1, 'C', false);
					$pdf->Cell(82);
					$pdf->Cell(31, 6, '- KARYAWAN', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $status, 0, 1, 'L', false);
					$pdf->Cell(82);
					$pdf->Cell(31, 6, '- TGL AKTIF', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, date_format(date_create($cv['on']), "d-m-Y"), 0, 1, 'L', false);
					$pdf->Cell(82);
					$pdf->Cell(31, 6, '- NIKAH', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(70, 6, $nikah, 0, 1, 'L', false);
					$pdf->Ln(1);
					$pdf->Cell(40, 6, 'MEDSOS', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 1, 'C', false);
					$pdf->Cell(2);
					$pdf->Cell(90, 6, '- IG : '.$ig.'/', 0, 0, 'L', false);
					$pdf->Cell(90, 6, '- FB : '.$fb.'/', 0, 1, 'L', false);
					$pdf->Ln(1);
					$pdf->Cell(40, 6, 'ALAMAT RUMAH', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
					$pdf->Cell(38);
					$pdf->Cell(33, 6, 'ALAMAT KTP', 0, 0, 'L', false);
					$pdf->Cell(2, 6, ': ', 0, 1, 'C', false);
					$pdf->Cell(2);
					$pdf->Cell(2, 6, '- ', 0, 0, 'L', false);
					$w = 72;
					$h = 6;
					if ($pdf->GetStringWidth($cv['domisili']) < $w) {
						$line = 1;
					} else {
						$ptxt = strlen($cv['domisili']);
						$eror = 10;
						$char = 0;
						$maxchar = 0;
						$txtarray = array();
						$holdtxt = "";

						while ($char < $ptxt) {
							while ($pdf->GetStringWidth($holdtxt) < ($w - $eror) && ($char + $maxchar) < $ptxt) {
								$maxchar++;
								$holdtxt = substr($cv['domisili'], $char, $maxchar);
							}
							$char = $char + $maxchar;
							array_push($txtarray, $holdtxt);
							$maxchar = 0;
							$holdtxt = "";
						}
						$line = count($txtarray);
					}
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($w, $h, $cv['domisili'], 0, 'L');
					$pdf->SetXY($x + $w, $y);
					$pdf->Cell(6);
					$pdf->Cell(2, 6, '- ', 0, 0, 'L', false);
					$w = 90;
					$h = 6;
					if ($pdf->GetStringWidth($cv['alamat']) < $w) {
						$line = 1;
					} else {
						$ptxt = strlen($cv['alamat']);
						$eror = 10;
						$char = 0;
						$maxchar = 0;
						$txtarray = array();
						$holdtxt = "";

						while ($char < $ptxt) {
							while ($pdf->GetStringWidth($holdtxt) < ($w - $eror) && ($char + $maxchar) < $ptxt) {
								$maxchar++;
								$holdtxt = substr($cv['alamat'], $char, $maxchar);
							}
							$char = $char + $maxchar;
							array_push($txtarray, $holdtxt);
							$maxchar = 0;
							$holdtxt = "";
						}
						$line = count($txtarray);
					}
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($w, $h, $cv['alamat'], 0, 'L');
					$pdf->SetXY($x + $w, $y);
					$pdf->Ln(35);
				}
				$pdf->Output('CV_ALL.pdf', 'I');
			}
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function allcv(){
		$pdf = new FPDF();
		$hasil = $this->DisplayData->cetakpdfall();
		foreach ($hasil->result() as $cv) {
			$fotocv = explode('/', $cv->fotolink);
			$foto = $fotocv[5];
			if ($foto == 'kosong') {
				if ($cv->jk == 1) {
					$urlfoto = $_SERVER['DOCUMENT_ROOT'].'/assets/img/man-no-img.png';//site_url('assets/img/man-no-img.png');
				} else {
					$urlfoto = $_SERVER['DOCUMENT_ROOT'].'/assets/img/woman-no-img.png';//site_url('assets/img/woman-no-img.png');
				}
			} else {
				$urlfoto = $_SERVER['DOCUMENT_ROOT'].$cv->fotolink;//site_url($cv->fotolink);
			}
			if ($cv->nikah == 'TK') {
				$nikah = 'BELUM MENIKAH';
			} elseif ($cv->nikah == 'K0') {
				$nikah = 'SUDAH MENIKAH, BELUM MEMILIKI ANAK';
			} elseif ($cv->nikah == 'K1') {
				$nikah = 'SUDAH MENIKAH, ANAK 1';
			} elseif ($cv->nikah == 'K2') {
				$nikah = 'SUDAH MENIKAH, ANAK 2';
			} elseif ($cv->nikah == 'K3') {
				$nikah = 'SUDAH MENIKAH, ANAK 3';
			} elseif ($cv->nikah == 'K4') {
				$nikah = 'SUDAH MENIKAH, ANAK 4';
			} elseif ($cv->nikah == 'K5') {
				$nikah = 'SUDAH MENIKAH, ANAK 5';
			} elseif ($cv->nikah == 'K6') {
				$nikah = 'SUDAH MENIKAH, ANAK 6';
			} else {
				$nikah = 'KOSONG';
			}
			if ($cv->status == 'SK1') {
				$status = 'AKTIF';
			} elseif ($cv->status == 'SK2') {
				$status = 'RESIGN';
			} elseif ($cv->status == 'SK3') {
				$status = 'PECAT';
			} elseif ($cv->status == 'SK4') {
				$status = 'SKOR/RUMAHKAN';
			} elseif ($cv->status == 'SK5') {
				$status = 'CUTI';
			} elseif ($cv->status == 'SK6') {
				$status = 'MENINGGAL DUNIA';
			} else {
				$status = 'KOSONG';
			}
			if ($cv->jk == 1) {
				$jk = 'LAKI-LAKI';
			} else {
				$jk = 'PEREMPUAN';
			}
			if ($cv->div == 'kosong' || $cv->div == '') {
				$div = 'DIVISI';
			} else {
				$div = $cv->div;
			}
			if ($cv->medsos=='') {
			  	$email = '';
			  	$wa = '';
			  	$ig = '';
			  	$fb = '';
		  	} else {
		  		$medsos = explode('//', $cv->medsos);
			  	$email = $medsos[0];
			  	$wa = $medsos[1];
			  	$ig = $medsos[2];
			  	$fb = $medsos[3];
		  	}
			$pdf->AddPage('P', 'A4', 0);
			$pdf->SetFont('Arial', 'B', 18);
			$pdf->Cell(0, 7, 'DATA PERSONAL KARYAWAN', 0, 1, 'C', false);
			$pdf->Ln(1);
			$pdf->Cell(0, 0.5, '', 0, 1, 'C', true);
			$pdf->Ln(0.5);
			$pdf->Cell(0, 0.5, '', 0, 1, 'C', true);
			$pdf->Ln(5);
			$pdf->Image($urlfoto, 10, 23, 75, 95); //51, 76
			$pdf->SetFont('Arial', 'B', 14);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'NAMA', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $cv->nama, 0, 1, 'L', false);
			$pdf->Ln(2);
			$pdf->SetFont('Arial', '', 11);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'NIK', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $cv->nik, 0, 1, 'L', false);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'KTP', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $cv->ktp, 0, 1, 'L', false);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'JABATAN', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $cv->jbtn, 0, 1, 'L', false);
			$pdf->Cell(115);
			$pdf->Cell(70, 6, '(' . $div . ')', 0, 1, 'L', false);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'TTL', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $cv->t.', '.date_format(date_create($cv->tl), "d-m-Y").' / ('.$cv->umur.'  Tahun)', 0, 1, 'L', false);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'NO. TLP', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $cv->tlp.' / WA('.$wa.')', 0, 1, 'L', false);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'EMAIL', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $email, 0, 1, 'L', false);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'AGAMA', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $cv->agama, 0, 1, 'L', false);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'PENDIDIKAN', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $cv->ilmu, 0, 1, 'L', false);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'JENIS KELAMIN', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $jk, 0, 1, 'L', false);
			$pdf->Ln(1);
			$pdf->Cell(80);
			$pdf->Cell(33, 6, 'STATUS', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 1, 'C', false);
			$pdf->Cell(82);
			$pdf->Cell(31, 6, '- KARYAWAN', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $status, 0, 1, 'L', false);
			$pdf->Cell(82);
			$pdf->Cell(31, 6, '- TGL AKTIF', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, date_format(date_create($cv->on), "d-m-Y"), 0, 1, 'L', false);
			$pdf->Cell(82);
			$pdf->Cell(31, 6, '- NIKAH', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(70, 6, $nikah, 0, 1, 'L', false);
			$pdf->Ln(1);
			$pdf->Cell(40, 6, 'MEDSOS', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 1, 'C', false);
			$pdf->Cell(2);
			$pdf->Cell(90, 6, '- IG : '.$ig.'/', 0, 0, 'L', false);
			$pdf->Cell(90, 6, '- FB : '.$fb.'/', 0, 1, 'L', false);
			$pdf->Ln(1);
			$pdf->Cell(40, 6, 'ALAMAT RUMAH', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 0, 'C', false);
			$pdf->Cell(38);
			$pdf->Cell(33, 6, 'ALAMAT KTP', 0, 0, 'L', false);
			$pdf->Cell(2, 6, ': ', 0, 1, 'C', false);
			$pdf->Cell(2);
			$pdf->Cell(2, 6, '- ', 0, 0, 'L', false);
			$w = 72;
			$h = 6;
			if ($pdf->GetStringWidth($cv->domisili) < $w) {
				$line = 1;
			} else {
				$ptxt = strlen($cv->domisili);
				$eror = 10;
				$char = 0;
				$maxchar = 0;
				$txtarray = array();
				$holdtxt = "";

				while ($char < $ptxt) {
					while ($pdf->GetStringWidth($holdtxt) < ($w - $eror) && ($char + $maxchar) < $ptxt) {
						$maxchar++;
						$holdtxt = substr($cv->domisili, $char, $maxchar);
					}
					$char = $char + $maxchar;
					array_push($txtarray, $holdtxt);
					$maxchar = 0;
					$holdtxt = "";
				}
				$line = count($txtarray);
			}
			$x = $pdf->GetX();
			$y = $pdf->GetY();
			$pdf->MultiCell($w, $h, $cv->domisili, 0, 'L');
			$pdf->SetXY($x + $w, $y);
			$pdf->Cell(6);
			$pdf->Cell(2, 6, '- ', 0, 0, 'L', false);
			$w = 90;
			$h = 6;
			if ($pdf->GetStringWidth($cv->alamat) < $w) {
				$line = 1;
			} else {
				$ptxt = strlen($cv->alamat);
				$eror = 10;
				$char = 0;
				$maxchar = 0;
				$txtarray = array();
				$holdtxt = "";

				while ($char < $ptxt) {
					while ($pdf->GetStringWidth($holdtxt) < ($w - $eror) && ($char + $maxchar) < $ptxt) {
						$maxchar++;
						$holdtxt = substr($cv->alamat, $char, $maxchar);
					}
					$char = $char + $maxchar;
					array_push($txtarray, $holdtxt);
					$maxchar = 0;
					$holdtxt = "";
				}
				$line = count($txtarray);
			}
			$x = $pdf->GetX();
			$y = $pdf->GetY();
			$pdf->MultiCell($w, $h, $cv->alamat, 0, 'L');
			$pdf->SetXY($x + $w, $y);
			$pdf->Ln(35);
			/*$pdf->SetFont('Arial', 'B', 15);
			$pdf->Cell(0, 0.5, '', 0, 1, 'C', true);
			$pdf->Cell(0, 8, 'REKAM JEJAK KARYAWAN', 0, 1, 'L', false);
			$pdf->Cell(0, 0.5, '', 0, 1, 'C', true);
			$pdf->Ln(1);
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(0, 5, 'PERUSAHAAN', 0, 1, 'L', false);
			$pdf->Ln(1);
			$pdf->SetFont('Arial', '', 9);
			$his = $this->DisplayData->hispt($cv['ktp']);
			if ($his->num_rows()>1) {
				foreach ($his->result() as $hispt) {
					$tglakhir = date_format(date_create($hispt->tglupdate), "d-m-Y");
					$tglawal = date_format(date_create($hispt->tglonhis), "d-m-Y");
					$pdf->Cell(2, 5, '-', 0, 0, 'L', false);
					$pdf->Cell(50, 5, $hispt->jbtnhis, 0, 0, 'L', false);
					$pdf->Cell(20, 5, $tglakhir, 0, 1, 'L', false);
				}
			}*/
		}
		$pdf->Output('CV_ALL.pdf', 'I');
	}

	public function slip($id) {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin')
			);
			$slip = $this->ImportGaji->slip($id)->row_array();
			$pdf = new FPDF();
			$pdf->AddPage('P', 'A4', 0);
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(96, 6.5, 'SLIP GAJI BULAN : '.strtoupper(date_format(date_create($slip['tgljaminput']), "M")).' '.date_format(date_create($slip['tgljaminput']), "Y"), 'LTB', 0, 'L', false);
			$pdf->Cell(96, 6.5, 'PT GHITA AVIA TRANS (GATRANS)', 'RTB', 1, 'R', false);
			$pdf->Ln(2);
			$pdf->SetFont('Arial', '', 9);
			$pdf->Cell(15, 5, 'NAMA : ', 0, 0, 'L', false);
			$pdf->Cell(50, 5, $slip['nama'], 0, 0, 'L', false);
			$pdf->Cell(40, 5, '( '.$slip['jabatan'].' )', 0, 0, 'L', false);
			$pdf->Cell(25, 5, 'RINCIAN GAJI : ', 0, 0, 'L', false);
			$pdf->Cell(15, 5, 'JUMLAH HARI KERJA', 0, 0, 'L', false);
			$pdf->Cell(48, 5, $slip['hadir'].' HARI', 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(15, 5, 'GAJI PROPORSIONAL', 0, 0, 'L', false);
			$pdf->Cell(48, 5, substr(number_format(($slip['gapro']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(53, 5, 'PEMBAYAR', 0, 0, 'C', false);
			$pdf->Cell(53, 5, 'PENERIMA', 0, 0, 'C', false);
			$pdf->Cell(24);
			$pdf->Cell(15, 5, 'BUM&BUT', 0, 0, 'L', false);
			$pdf->Cell(48, 5, substr(number_format(($slip['bumbut']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(15, 5, 'TUNJANGAN', 0, 0, 'L', false);
			$pdf->Cell(48, 5, substr(number_format(($slip['tunjangan_tot']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(62, 0.2, '', 0, 1, 'C', true);
			$pdf->Cell(130);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Cell(15, 5, 'THP', 0, 0, 'L', false);
			$pdf->Cell(48, 5, 'Rp. '.substr(number_format(($slip['thp']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
			$pdf->Ln(1);
			$pdf->Cell(130);
			$pdf->SetFont('Arial', '', 9);
			$pdf->Cell(15, 5, 'PINJAMAN 1', 0, 0, 'L', false);
			$pdf->Cell(48, 5, substr(number_format(($slip['p1']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(15, 5, 'PINJAMAN 2', 0, 0, 'L', false);
			$pdf->Cell(48, 5, substr(number_format(($slip['p2']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(62, 0.2, '', 0, 1, 'C', true);
			$pdf->Cell(130);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Cell(15, 5, 'POTONGAN', 0, 0, 'L', false);
			$pdf->Cell(48, 5, 'Rp. '.substr(number_format(($slip['p1']+$slip['p2']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
			$pdf->Ln(1);
			$pdf->Cell(130);
			$pdf->SetFont('Arial', '', 9);
			$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
			$pdf->Cell(53, 5, '('.str_repeat("...",10).')', 0, 0, 'C', false);
			$pdf->Cell(53, 5, $slip['nama'], 0, 0, 'C', false);
			$pdf->Cell(24);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Cell(15, 5, 'TOTAL TERIMA', 0, 0, 'L', false);
			$pdf->Cell(48, 5, 'Rp. '.substr(number_format(($slip['tf']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
			$pdf->Ln(1);
			$pdf->Cell(192, 0.5, '', 0, 1, 'C', true);
			$pdf->Output('Slip.pdf', 'I');
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function slip_all() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin')
			);
			$id = explode('/', $this->input->post('idgaji', TRUE));
			$data = $this->ImportGaji->slip_all($id)->result();
			$pdf = new FPDF();
			$pdf->AddPage('P', 'A4', 0);
			foreach ($data as $slip) {
				$pdf->SetFont('Arial', 'B', 10);
				$pdf->Cell(96, 6.5, 'SLIP GAJI BULAN : '.strtoupper(date_format(date_create($slip->tgljaminput), "M")).' '.date_format(date_create($slip->tgljaminput), "Y"), 'LTB', 0, 'L', false);
				$pdf->Cell(96, 6.5, 'PT GHITA AVIA TRANS (GATRANS)', 'RTB', 1, 'R', false);
				$pdf->Ln(2);
				$pdf->SetFont('Arial', '', 9);
				$pdf->Cell(15, 5, 'NAMA : ', 0, 0, 'L', false);
				$pdf->Cell(50, 5, $slip->nama, 0, 0, 'L', false);
				$pdf->Cell(40, 5, '( '.$slip->jabatan.' )', 0, 0, 'L', false);
				$pdf->Cell(25, 5, 'RINCIAN GAJI : ', 0, 0, 'L', false);
				$pdf->Cell(15, 5, 'JUMLAH HARI KERJA', 0, 0, 'L', false);
				$pdf->Cell(48, 5, $slip->hadir.' HARI', 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(15, 5, 'GAJI PROPORSIONAL', 0, 0, 'L', false);
				$pdf->Cell(48, 5, substr(number_format(($slip->gapro),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(53, 5, 'PEMBAYAR', 0, 0, 'C', false);
				$pdf->Cell(53, 5, 'PENERIMA', 0, 0, 'C', false);
				$pdf->Cell(24);
				$pdf->Cell(15, 5, 'BUM&BUT', 0, 0, 'L', false);
				$pdf->Cell(48, 5, substr(number_format(($slip->bumbut),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(15, 5, 'TUNJANGAN', 0, 0, 'L', false);
				$pdf->Cell(48, 5, substr(number_format(($slip->tunjangan_tot),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(62, 0.2, '', 0, 1, 'C', true);
				$pdf->Cell(130);
				$pdf->SetFont('Arial', 'B', 9);
				$pdf->Cell(15, 5, 'THP', 0, 0, 'L', false);
				$pdf->Cell(48, 5, 'Rp. '.substr(number_format(($slip->thp),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
				$pdf->Ln(1);
				$pdf->Cell(130);
				$pdf->SetFont('Arial', '', 9);
				$pdf->Cell(15, 5, 'PINJAMAN 1', 0, 0, 'L', false);
				$pdf->Cell(48, 5, substr(number_format(($slip->p1),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(15, 5, 'PINJAMAN 2', 0, 0, 'L', false);
				$pdf->Cell(48, 5, substr(number_format(($slip->p2),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(62, 0.2, '', 0, 1, 'C', true);
				$pdf->Cell(130);
				$pdf->SetFont('Arial', 'B', 9);
				$pdf->Cell(15, 5, 'POTONGAN', 0, 0, 'L', false);
				$pdf->Cell(48, 5, 'Rp. '.substr(number_format(($slip->p1+$slip->p2),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
				$pdf->Ln(1);
				$pdf->Cell(130);
				$pdf->SetFont('Arial', '', 9);
				$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
				$pdf->Cell(53, 5, '('.str_repeat("...",10).')', 0, 0, 'C', false);
				$pdf->Cell(53, 5, $slip->nama, 0, 0, 'C', false);
				$pdf->Cell(24);
				$pdf->SetFont('Arial', 'B', 9);
				$pdf->Cell(15, 5, 'TOTAL TERIMA', 0, 0, 'L', false);
				$pdf->Cell(48, 5, 'Rp. '.substr(number_format(($slip->tf),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
				$pdf->Ln(3);
				$pdf->Cell(192, 0.5, '', 0, 1, 'C', true);
				$pdf->Ln(5);
			}
			$pdf->Output('Slip.pdf', 'I');
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function slipLembur($id) {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin')
			);
			$slipL = $this->ImportLembur->slipLembur($id)->row_array();
			$pdf = new FPDF();
			$pdf->AddPage('P', 'A4', 0);
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->Cell(96, 10, 'SLIP LEMBUR BULAN : '.strtoupper(date_format(date_create($slipL['tgljaminput']), "M")).' '.date_format(date_create($slipL['tgljaminput']), "Y"), 'LTB', 0, 'L', false);
			$pdf->Cell(96, 10, 'PT GHITA AVIA TRANS (GATRANS)', 'RTB', 1, 'R', false);
			$pdf->Ln(2);
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(15, 5, 'NAMA : ', 0, 0, 'L', false);
			$pdf->Cell(50, 5, $slipL['nama'], 0, 0, 'L', false);
			$pdf->Cell(25);
			$pdf->Cell(40, 5, '( '.$slipL['jabatan'].' )', 0, 0, 'L', false);
			$pdf->Cell(30, 5, 'RINCIAN LEMBUR : ', 0, 1, 'L', false);
			$pdf->Ln(2);
			$pdf->Cell(130);
			$pdf->Cell(15, 5, 'JUMLAH MALAM', 0, 0, 'L', false);
			$pdf->Cell(48, 5, $slipL['msk_mlm'].' HARI', 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(15, 5, 'JUMLAH KJK', 0, 0, 'L', false);
			$pdf->Cell(48, 5, substr(number_format(($slipL['tot_kjk']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(65, 5, 'PEMBAYAR', 0, 0, 'C', false);
			$pdf->Cell(65, 5, 'PENERIMA', 0, 0, 'C', false);
			$pdf->Ln(1);
			$pdf->Cell(130);
			$pdf->Cell(62, 0.2, '', 0, 1, 'C', true);
			$pdf->Ln(1);
			$pdf->Cell(130);
			$pdf->Cell(15, 5, 'JUMLAH MALAM (Rp)', 0, 0, 'L', false);
			$pdf->Cell(48, 5, substr(number_format(($slipL['msk_mlm']*7000),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(15, 5, 'JUMLAH KJK (Rp)', 0, 0, 'L', false);
			$pdf->Cell(48, 5, substr(number_format(($slipL['tot_ot']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Ln(1);
			$pdf->Cell(130);
			$pdf->Cell(62, 0.2, '', 0, 1, 'C', true);
			$pdf->Ln(2);
			$pdf->Cell(130);
			$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
			$pdf->Cell(65, 5, '('.str_repeat("...",10).')', 0, 0, 'C', false);
			$pdf->Cell(65, 5, $slipL['nama'], 0, 0, 'C', false);
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(15, 6, 'TOTAL TERIMA', 0, 0, 'L', false);
			$pdf->Cell(48, 6, 'Rp. '.substr(number_format(($slipL['tf']),2,',','.'),0,-3), 0, 1, 'R', false);
			$pdf->Cell(130);
			$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
			$pdf->Ln(2);
			$pdf->Cell(192, 0.5, '', 0, 1, 'C', true);
			$pdf->Output('Slip Lembur.pdf', 'I');
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function slipLembur_all() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin')
			);
			$id = explode('/', $this->input->post('idlembur', TRUE));
			$dataL = $this->ImportLembur->slipLembur_all($id)->result();
			$pdf = new FPDF();
			$pdf->AddPage('P', 'A4', 0);
			foreach ($dataL as $slipL) {
				$pdf->SetFont('Arial', 'B', 11);
				$pdf->Cell(96, 10, 'SLIP LEMBUR BULAN : '.strtoupper(date_format(date_create($slipL->tgljaminput), "M")).' '.date_format(date_create($slipL->tgljaminput), "Y"), 'LTB', 0, 'L', false);
				$pdf->Cell(96, 10, 'PT GHITA AVIA TRANS (GATRANS)', 'RTB', 1, 'R', false);
				$pdf->Ln(2);
				$pdf->SetFont('Arial', '', 10);
				$pdf->Cell(15, 5, 'NAMA : ', 0, 0, 'L', false);
				$pdf->Cell(50, 5, $slipL->nama, 0, 0, 'L', false);
				$pdf->Cell(25);
				$pdf->Cell(40, 5, '( '.$slipL->jabatan.' )', 0, 0, 'L', false);
				$pdf->Cell(30, 5, 'RINCIAN LEMBUR : ', 0, 1, 'L', false);
				$pdf->Ln(2);
				$pdf->Cell(130);
				$pdf->Cell(15, 5, 'JUMLAH MALAM', 0, 0, 'L', false);
				$pdf->Cell(48, 5, $slipL->msk_mlm.' HARI', 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(15, 5, 'JUMLAH KJK', 0, 0, 'L', false);
				$pdf->Cell(48, 5, substr(number_format(($slipL->tot_kjk),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(65, 5, 'PEMBAYAR', 0, 0, 'C', false);
				$pdf->Cell(65, 5, 'PENERIMA', 0, 0, 'C', false);
				$pdf->Ln(1);
				$pdf->Cell(130);
				$pdf->Cell(62, 0.2, '', 0, 1, 'C', true);
				$pdf->Ln(1);
				$pdf->Cell(130);
				$pdf->Cell(15, 5, 'JUMLAH MALAM (Rp)', 0, 0, 'L', false);
				$pdf->Cell(48, 5, substr(number_format(($slipL->msk_mlm*7000),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(15, 5, 'JUMLAH KJK (Rp)', 0, 0, 'L', false);
				$pdf->Cell(48, 5, substr(number_format(($slipL->tot_ot),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Ln(1);
				$pdf->Cell(130);
				$pdf->Cell(62, 0.2, '', 0, 1, 'C', true);
				$pdf->Ln(5);
				$pdf->Cell(130);
				$pdf->SetFont('Arial', '', 9);
				$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
				$pdf->Cell(65, 5, '('.str_repeat("...",10).')', 0, 0, 'C', false);
				$pdf->Cell(65, 5, $slipL->nama, 0, 0, 'C', false);
				$pdf->SetFont('Arial', 'B', 10);
				$pdf->Cell(15, 6, 'TOTAL TERIMA', 0, 0, 'L', false);
				$pdf->Cell(48, 6, 'Rp. '.substr(number_format(($slipL->tf),2,',','.'),0,-3), 0, 1, 'R', false);
				$pdf->Cell(130);
				$pdf->Cell(62, 0.5, '', 0, 1, 'C', true);
				$pdf->Ln(6);
				$pdf->Cell(192, 0.5, '', 0, 1, 'C', true);
				$pdf->Ln(6);
			}
			$pdf->Output('Slip Lembur.pdf', 'I');
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function pdf_akta() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin')
			);
			$user = $sesiLog['username'];
			$hasil = $this->DisplayData->cetak_akta();
			$pdf = $this->pdf_akta->getPdfAkta();
			$pdf->AliasNbPages('{pages}');
			$pdf->AddPage('L', 'A4', 0);
			$pdf->SetFont('Arial', '', 8);
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetFillColor(0, 0, 0);
			$pdf->SetDrawColor(0, 0, 0);
			$pdf->SetAutoPageBreak(true, 10);
			$no = 1;
			foreach ($hasil->result() as $cetak) {
				$pdf->Cell(10, 5, $no, 'LB', 0, 'C');
				$pdf->Cell(20, 5, $cetak->nolegal, 'LB', 0, 'C', false);
				$pdf->Cell(93, 5, $cetak->perihal, 'LB', 0, 'L', false);
				$pdf->Cell(93, 5, $cetak->notaris, 'LB', 0, 'L', false);
				$pdf->Cell(30, 5, date_format(date_create($cetak->tglbuat), "d-m-Y"), 'LB', 0, 'L', false);
				$pdf->Cell(30, 5, $cetak->tmptbuat, 'LBR', 1, 'L', false);
				$no++;
			}
			$pdf->Ln(5);
			$pdf->Cell(30);
			$pdf->Cell(20, 5, 'Dibuat Oleh', 0, 1, 'C', false);
			$pdf->Ln(25);
			$pdf->Cell(30);
			$pdf->Cell(20, 5, 'Alvian Dwi Muktiarta', 0, 1, 'C', false);
			$pdf->Cell(30);
			$pdf->Cell(20, 5, 'Staff HRD & Legal', 0, 1, 'C', false);
			$pdf->Output('Data Akta Gatrans.pdf', 'I');
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function excel_akta() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin'),
				'excel' => $this->DisplayData->cetak_akta()
			);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('excel/excel_akta', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function pdf_pks() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin')
			);
			$user = $sesiLog['username'];
			$hasil = $this->DisplayData->cetak_pks();
			$pdf = $this->pdf_pks->getPdfPks();
			$pdf->AliasNbPages('{pages}');
			$pdf->AddPage('L', 'A4', 0);
			$pdf->SetFont('Arial', '', 8);
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetFillColor(0, 0, 0);
			$pdf->SetDrawColor(0, 0, 0);
			$pdf->SetAutoPageBreak(true, 10);
			$no = 1;
			foreach ($hasil->result() as $cetak) {
				$w = 70;
				$ww = 86;
				$www = 77;
				$h = 5;
				if ($pdf->GetStringWidth($cetak->noizinpks) < $w) {
					$linea = 1;
				} else {
					$eror = 10;
					$ptxta = strlen($cetak->noizinpks);
					$chara = 0;
					$maxchara = 0;
					$txtarraya = array();
					$holdtxta = "";
					while ($chara < $ptxta) {
						while ($pdf->GetStringWidth($holdtxta) < ($w - $eror) && ($chara + $maxchara) < $ptxta) {
							$maxchara++;
							$holdtxta = substr($cetak->noizinpks, $chara, $maxchara);
						}
						$chara = $chara + $maxchara;
						array_push($txtarraya, $holdtxta);
						$maxchara = 0;
						$holdtxta = "";
					}
					$linea = count($txtarraya);
				}
				if ($pdf->GetStringWidth($cetak->perihal) < $ww) {
					$lineb = 1;
				} else {
					$eror = 10;
					$ptxtb = strlen($cetak->perihal);
					$charb = 0;
					$maxcharb = 0;
					$txtarrayb = array();
					$holdtxtb = "";
					while ($charb < $ptxtb) {
						while ($pdf->GetStringWidth($holdtxtb) < ($ww - $eror) && ($charb + $maxcharb) < $ptxtb) {
							$maxcharb++;
							$holdtxtb = substr($cetak->perihal, $charb, $maxcharb);
						}
						$charb = $charb + $maxcharb;
						array_push($txtarrayb, $holdtxtb);
						$maxcharb = 0;
						$holdtxtb = "";
					}
					$lineb = count($txtarrayb);
				}
				if ($pdf->GetStringWidth($cetak->instansi) < $www) {
					$linec = 1;
				} else {
					$eror = 10;
					$ptxtc = strlen($cetak->instansi);
					$charc = 0;
					$maxcharc = 0;
					$txtarrayc = array();
					$holdtxtc = "";
					while ($charc < $ptxtc) {
						while ($pdf->GetStringWidth($holdtxtc) < ($www - $eror) && ($charc + $maxcharc) < $ptxtc) {
							$maxcharc++;
							$holdtxtc = substr($cetak->instansi, $charc, $maxcharc);
						}
						$charc = $charc + $maxcharc;
						array_push($txtarrayc, $holdtxtc);
						$maxcharc = 0;
						$holdtxtc = "";
					}
					$linec = count($txtarrayc);
				}
				$pdf->SetAutoPageBreak(true, 10);
				if ($linea > $lineb && $linea > $linec) {
					$pdf->Cell(7, ($linea * $h), $no, 'LB', 0, 'C');
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($w, $h, $cetak->noizinpks, 'LB', 'L');
					$pdf->SetXY($x + $w, $y);
					$pdf->Cell($ww, ($linea * $h), $cetak->perihal, 'LB', 0, 'L', false);
					$pdf->Cell($www, ($linea * $h), $cetak->instansi, 'LB', 0, 'L', false);
					$pdf->Cell(18, ($linea * $h), date_format(date_create($cetak->tglawal), "d-m-Y"), 'LB', 0, 'C', false);
					$pdf->Cell(18, ($linea * $h), date_format(date_create($cetak->tglakhir), "d-m-Y"), 'LBR', 1, 'C', false);
				} elseif ($lineb > $linea && $lineb > $linec) {
					$pdf->Cell(7, ($lineb * $h), $no, 'LB', 0, 'C');
					$pdf->Cell($w, ($lineb * $h), $cetak->noizinpks, 'LB', 0, 'L', false);
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($ww, $h, $cetak->perihal, 'LB', 'L');
					$pdf->SetXY($x + $ww, $y);
					$pdf->Cell($www, ($lineb * $h), $cetak->instansi, 'LB', 0, 'L', false);
					$pdf->Cell(18, ($lineb * $h), date_format(date_create($cetak->tglawal), "d-m-Y"), 'LB', 0, 'C', false);
					$pdf->Cell(18, ($lineb * $h), date_format(date_create($cetak->tglakhir), "d-m-Y"), 'LBR', 1, 'C', false);
				} elseif ($linec > $linea && $linec > $lineb) {
					$pdf->Cell(7, ($linec * $h), $no, 'LB', 0, 'C');
					$pdf->Cell($w, ($linec * $h), $cetak->noizinpks, 'LB', 0, 'L', false);
					$pdf->Cell($ww, ($linec * $h), $cetak->perihal, 'LB', 0, 'L', false);
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($www, $h, $cetak->instansi, 'LB', 'L');
					$pdf->SetXY($x + $www, $y);
					$pdf->Cell(18, ($linec * $h), date_format(date_create($cetak->tglawal), "d-m-Y"), 'LB', 0, 'C', false);
					$pdf->Cell(18, ($linec * $h), date_format(date_create($cetak->tglakhir), "d-m-Y"), 'LBR', 1, 'C', false);
				} elseif ($linea == $lineb || $linea == $linec || $lineb == $linec) {
					$pdf->Cell(7, ($linea * $h), $no, 'LB', 0, 'C');
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($w, $h, $cetak->noizinpks, 'LB', 'L');
					$pdf->SetXY($x + $w, $y);
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($ww, $h, $cetak->perihal, 'LB', 'L');
					$pdf->SetXY($x + $ww, $y);
					$pdf->Cell($www, ($lineb * $h), $cetak->instansi, 'LB', 0, 'L', false);
					$pdf->Cell(18, ($linea * $h), date_format(date_create($cetak->tglawal), "d-m-Y"), 'LB', 0, 'C', false);
					$pdf->Cell(18, ($linea * $h), date_format(date_create($cetak->tglakhir), "d-m-Y"), 'LBR', 1, 'C', false);
				}
				$no++;
			}
			$pdf->Ln(5);
			$pdf->Cell(30);
			$pdf->Cell(20, 5, 'Dibuat Oleh', 0, 1, 'C', false);
			$pdf->Ln(25);
			$pdf->Cell(30);
			$pdf->Cell(20, 5, 'Alvian Dwi Muktiarta', 0, 1, 'C', false);
			$pdf->Cell(30);
			$pdf->Cell(20, 5, 'Staff HRD & Legal', 0, 1, 'C', false);
			$pdf->Output('Data PKS Gatrans.pdf', 'I');
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function excel_pks() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin'),
				'excel' => $this->DisplayData->cetak_pks()
			);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('excel/excel_pks', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function pdf_izin() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin')
			);
			$user = $sesiLog['username'];
			$hasil = $this->DisplayData->cetak_izin();
			$pdf = $this->pdf_izin->getPdfIzin();
			$pdf->AliasNbPages('{pages}');
			$pdf->AddPage('L', 'A4', 0);
			$pdf->SetFont('Arial', '', 8);
			$pdf->SetTextColor(0, 0, 0);
			$pdf->SetFillColor(0, 0, 0);
			$pdf->SetDrawColor(0, 0, 0);
			$pdf->SetAutoPageBreak(true, 10);
			$no = 1;
			foreach ($hasil->result() as $cetak) {
				if ($cetak->tglakhir==date("Y-m-d")) {
					$akhir = '';
				} else {
					$akhir = date_format(date_create($cetak->tglakhir), "d-m-Y");
				}
				$w = 125;
				$ww = 64;
				$h = 5;
				if ($pdf->GetStringWidth($cetak->perihal) < $w) {
					$linea = 1;
				} else {
					$eror = 10;
					$ptxta = strlen($cetak->perihal);
					$chara = 0;
					$maxchara = 0;
					$txtarraya = array();
					$holdtxta = "";
					while ($chara < $ptxta) {
						while ($pdf->GetStringWidth($holdtxta) < ($w - $eror) && ($chara + $maxchara) < $ptxta) {
							$maxchara++;
							$holdtxta = substr($cetak->perihal, $chara, $maxchara);
						}
						$chara = $chara + $maxchara;
						array_push($txtarraya, $holdtxta);
						$maxchara = 0;
						$holdtxta = "";
					}
					$linea = count($txtarraya);
				}
				if ($pdf->GetStringWidth($cetak->instansi) < $ww) {
					$lineb = 1;
				} else {
					$eror = 10;
					$ptxtb = strlen($cetak->instansi);
					$charb = 0;
					$maxcharb = 0;
					$txtarrayb = array();
					$holdtxtb = "";
					while ($charb < $ptxtb) {
						while ($pdf->GetStringWidth($holdtxtb) < ($ww - $eror) && ($charb + $maxcharb) < $ptxtb) {
							$maxcharb++;
							$holdtxtb = substr($cetak->instansi, $charb, $maxcharb);
						}
						$charb = $charb + $maxcharb;
						array_push($txtarrayb, $holdtxtb);
						$maxcharb = 0;
						$holdtxtb = "";
					}
					$lineb = count($txtarrayb);
				}
				if ($linea > $lineb) {
					$pdf->Cell(7, ($linea * $h), $no, 'LB', 0, 'C');
					$pdf->Cell(48, ($linea * $h), $cetak->noizinpks, 'LB', 0, 'L', false);
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($w, $h, $cetak->perihal, 'LB', 'L');
					$pdf->SetXY($x + $w, $y);
					$pdf->Cell($ww, ($linea * $h), $cetak->instansi, 'LB', 0, 'L', false);
					$pdf->Cell(16, ($linea * $h), date_format(date_create($cetak->tglawal), "d-m-Y"), 'LB', 0, 'C', false);
					$pdf->Cell(16, ($linea * $h), $akhir, 'LBR', 1, 'C', false);
				} elseif ($lineb > $linea) {
					$pdf->Cell(7, ($lineb * $h), $no, 'LB', 0, 'C');
					$pdf->Cell(48, ($lineb * $h), $cetak->noizinpks, 'LB', 0, 'L', false);
					$pdf->Cell($w, ($lineb * $h), $cetak->perihal, 'LB', 0, 'L', false);
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($ww, $h, $cetak->instansi, 'LB', 'L');
					$pdf->SetXY($x + $ww, $y);
					$pdf->Cell(16, ($lineb * $h), date_format(date_create($cetak->tglawal), "d-m-Y"), 'LB', 0, 'C', false);
					$pdf->Cell(16, ($lineb * $h), $akhir, 'LBR', 1, 'C', false);
				} elseif ($linea == $lineb) {
					$pdf->Cell(7, ($linea * $h), $no, 'LB', 0, 'C');
					$pdf->Cell(48, ($linea * $h), $cetak->noizinpks, 'LB', 0, 'L', false);
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($w, $h, $cetak->perihal, 'LB', 'L');
					$pdf->SetXY($x + $w, $y);
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$pdf->MultiCell($ww, $h, $cetak->instansi, 'LB', 'L');
					$pdf->SetXY($x + $ww, $y);
					$pdf->Cell(16, ($linea * $h), date_format(date_create($cetak->tglawal), "d-m-Y"), 'LB', 0, 'C', false);
					$pdf->Cell(16, ($linea * $h), $akhir, 'LBR', 1, 'C', false);
				}
				$no++;
			}
			$pdf->Ln(5);
			$pdf->Cell(30);
			$pdf->Cell(20, 5, 'Dibuat Oleh', 0, 1, 'C', false);
			$pdf->Ln(25);
			$pdf->Cell(30);
			$pdf->Cell(20, 5, 'Alvian Dwi Muktiarta', 0, 1, 'C', false);
			$pdf->Cell(30);
			$pdf->Cell(20, 5, 'Staff HRD & Legal', 0, 1, 'C', false);
			$pdf->Output('Data PKS Gatrans.pdf', 'I');
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function excel_izin() {
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
				'username' => $this->session->userdata('useradmin'),
				'excel' => $this->DisplayData->cetak_izin()
			);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('excel/excel_izin', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function dl($dl) {
		$path = explode('-', $dl);
		if ($path[0]=='izin_pks' || $path[0]=='akta') {
			force_download('assets/img/attach/legal/'.$path[0].'/'.$path[1], NULL);
		} else {
			force_download('assets/img/attach/'.$path[0].'/'.$path[1], NULL);
		}
	}
}
