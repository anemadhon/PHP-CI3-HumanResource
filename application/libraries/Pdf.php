<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/third_party/fpdf/fpdf.php');

class Pdf extends FPDF {

	public function header(){
		$this->Ln(16);
		$this->Image($_SERVER['DOCUMENT_ROOT'].'/assets/img/laporan.png',10,5,-250);//site_url('assets/img/laporan.png')
		$this->Ln(1);
		$this->Cell(0,0.5,'',0,1,'C',true);
        $this->Ln(1);
        $this->SetFont('Arial','B',11);
		$this->Cell(0,7,'DATA KARYAWAN PT GHITA AVIA TRANS (GATRANS)',0,1,'C');
		$this->Ln(1);
        $this->SetFont('Arial','B',9);
		$this->SetFillColor(178,34,34);
		$this->SetTextColor(255,255,255);
		$this->SetDrawColor(47,79,79);
        $this->Cell(10,7,'No',1,0,'C',true);
        $this->Cell(44,7,'Nama',1,0,'C',true);
		$this->Cell(52,7,'Jabatan',1,0,'C',true);
		$this->Cell(28,7,'NIK',1,0,'C',true);
		$this->Cell(127,7,'Alamat',1,0,'C',true);
		$this->Cell(17,7,'Tgl Aktif',1,1,'C',true);
		$this->Ln(1);
	}

	public function footer(){
		date_default_timezone_set('Asia/Jakarta');
        $this->SetY(-10);
        $this->SetFont('Arial','B',6);
		$this->SetTextColor(0,0,0);
		$this->SetFillColor(0,0,0);
		$this->SetDrawColor(0,0,0);
		$this->Cell(0,0.5,'',0,1,'C',true);
		$this->Cell(92,4,'Printed : '.date("d-m-Y").' / '.date("H:i:s"),0,0,'L',false);
		$this->Cell(93,4,'Page '.$this->PageNo().'-{pages}',0,0,'C',false);
		$this->Cell(92,4,'',0,1,'C',false);
	}

	public function getPdf(){
		return new Pdf();
	}
}

class Pdf_akta extends FPDF {

	public function header(){
		$this->Ln(16);
		$this->Image(site_url('assets/img/laporan.png'),10,5,-250);
		$this->Ln(1);
		$this->Cell(0,0.5,'',0,1,'C',true);
        $this->Ln(1);
        $this->SetFont('Arial','B',11);
		$this->Cell(0,7,'DAFTAR AKTA PT GHITA AVIA TRANS (GATRANS)',0,1,'C');
		$this->Ln(1);
        $this->SetFont('Arial','B',9);
		$this->SetFillColor(178,34,34);
		$this->SetTextColor(255,255,255);
		$this->SetDrawColor(47,79,79);
        $this->Cell(10,7,'No',1,0,'C',true);
        $this->Cell(20,7,'No. Akta',1,0,'C',true);
		$this->Cell(93,7,'Perihal',1,0,'C',true);
		$this->Cell(93,7,'Notaris',1,0,'C',true);
		$this->Cell(30,7,'Tanggal Buat',1,0,'C',true);
		$this->Cell(30,7,'Tempat Buat',1,1,'C',true);
		$this->Ln(1);
	}

	public function footer(){
		date_default_timezone_set('Asia/Jakarta');
        $this->SetY(-10);
        $this->SetFont('Arial','B',6);
		$this->SetTextColor(0,0,0);
		$this->SetFillColor(0,0,0);
		$this->SetDrawColor(0,0,0);
		$this->Cell(0,0.5,'',0,1,'C',true);
		$this->Cell(92,4,'Printed : '.date("d-m-Y").' / '.date("H:i:s"),0,0,'L',false);
		$this->Cell(93,4,'Page '.$this->PageNo().'-{pages}',0,0,'C',false);
		$this->Cell(92,4,'',0,1,'C',false);
	}

	public function getPdfAkta(){
		return new Pdf_akta();
	}
}

class Pdf_pks extends FPDF {

	public function header(){
		$this->Ln(16);
		$this->Image(site_url('assets/img/laporan.png'),10,5,-250);
		$this->Ln(1);
		$this->Cell(0,0.5,'',0,1,'C',true);
        $this->Ln(1);
        $this->SetFont('Arial','B',11);
		$this->Cell(0,7,'DAFTAR PKS PT GHITA AVIA TRANS (GATRANS)',0,1,'C');
		$this->Ln(1);
        $this->SetFont('Arial','B',9);
		$this->SetFillColor(178,34,34);
		$this->SetTextColor(255,255,255);
		$this->SetDrawColor(47,79,79);
        $this->Cell(7,7,'No',1,0,'C',true);
        $this->Cell(70,7,'No. PKS',1,0,'C',true);
		$this->Cell(86,7,'Perihal',1,0,'C',true);
		$this->Cell(77,7,'Instansi',1,0,'C',true);
		$this->Cell(18,7,'Tgl Buat',1,0,'C',true);
		$this->Cell(18,7,'Tgl Akhir',1,1,'C',true);
		$this->Ln(1);
	}

	public function footer(){
		date_default_timezone_set('Asia/Jakarta');
        $this->SetY(-10);
        $this->SetFont('Arial','B',6);
		$this->SetTextColor(0,0,0);
		$this->SetFillColor(0,0,0);
		$this->SetDrawColor(0,0,0);
		$this->Cell(0,0.5,'',0,1,'C',true);
		$this->Cell(92,4,'Printed : '.date("d-m-Y").' / '.date("H:i:s"),0,0,'L',false);
		$this->Cell(93,4,'Page '.$this->PageNo().'-{pages}',0,0,'C',false);
		$this->Cell(92,4,'',0,1,'C',false);
	}

	public function getPdfPks(){
		return new Pdf_pks();
	}
}

class Pdf_izin extends FPDF {

	public function header(){
		$this->Ln(16);
		$this->Image(site_url('assets/img/laporan.png'),10,5,-250);
		$this->Ln(1);
		$this->Cell(0,0.5,'',0,1,'C',true);
        $this->Ln(1);
        $this->SetFont('Arial','B',11);
		$this->Cell(0,7,'DAFTAR SURAT PERIZINAN PT GHITA AVIA TRANS (GATRANS)',0,1,'C');
		$this->Ln(1);
        $this->SetFont('Arial','B',9);
		$this->SetFillColor(178,34,34);
		$this->SetTextColor(255,255,255);
		$this->SetDrawColor(47,79,79);
        $this->Cell(7,7,'No',1,0,'C',true);
        $this->Cell(48,7,'No. Surat Perizinan',1,0,'C',true);
		$this->Cell(125,7,'Perihal',1,0,'C',true);
		$this->Cell(64,7,'Instansi',1,0,'C',true);
		$this->Cell(16,7,'Tgl Buat',1,0,'C',true);
		$this->Cell(16,7,'Tgl Akhir',1,1,'C',true);
		$this->Ln(1);
	}

	public function footer(){
		date_default_timezone_set('Asia/Jakarta');
        $this->SetY(-10);
        $this->SetFont('Arial','B',6);
		$this->SetTextColor(0,0,0);
		$this->SetFillColor(0,0,0);
		$this->SetDrawColor(0,0,0);
		$this->Cell(0,0.5,'',0,1,'C',true);
		$this->Cell(92,4,'Printed : '.date("d-m-Y").' / '.date("H:i:s"),0,0,'L',false);
		$this->Cell(93,4,'Page '.$this->PageNo().'-{pages}',0,0,'C',false);
		$this->Cell(92,4,'',0,1,'C',false);
	}

	public function getPdfIzin(){
		return new Pdf_izin();
	}
}
?>