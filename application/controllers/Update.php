<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->model('UpdateData');
	}

	public function dataupdate(){
		$data = array();
		foreach ($_FILES['img']['name'] as $key => $value) {
			if ($key==0) {
				if ($_FILES['img']['name'][0]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/foto/'.$this->input->post('foto', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getFoto()
					);
				}
			} elseif ($key==1) {
				if ($_FILES['img']['name'][1]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/ktp/'.$this->input->post('ktp', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getKtp()
					);
				}
			} elseif ($key==2) {
				if ($_FILES['img']['name'][2]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/npwp/'.$this->input->post('npwp', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getNpwp()
					);
				}
			} elseif ($key==3) {
				if ($_FILES['img']['name'][3]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/kk/'.$this->input->post('kk', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getKk()
					);
				}
			} elseif ($key==4) {
				if ($_FILES['img']['name'][4]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/skck/'.$this->input->post('skck', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getSkck()
					);
				}
			} elseif ($key==5) {
				if ($_FILES['img']['name'][5]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/ijazah/'.$this->input->post('ijaz', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getIjz()
					);
				}
			} elseif ($key==6) {
				if ($_FILES['img']['name'][6]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/lisensi/'.$this->input->post('lis', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getLis()
					);
				}
			} elseif ($key==7) {
				if ($_FILES['img']['name'][7]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/sertifikat/'.$this->input->post('ser', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getSer()
					);
				}
			} elseif ($key==8) {
				if ($_FILES['img']['name'][8]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/fakta/'.$this->input->post('fakta', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getFakta()
					);
				}
			} elseif ($key==9) {
				if ($_FILES['img']['name'][9]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/suratnaik/'.$this->input->post('srtnaik', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getSrtNaik()
					);
				}
			} elseif ($key==10) {
				if ($_FILES['img']['name'][10]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/sp/'.$this->input->post('sp', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getSp()
					);
				}
			} elseif ($key==11) {
				if ($_FILES['img']['name'][11]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/suratout/'.$this->input->post('srtout', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getSrtOut()
					);
				}
			} elseif ($key==12) {
				if ($_FILES['img']['name'][12]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/suratsehat/'.$this->input->post('sehat', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getSehat()
					);
				}
			} elseif ($key==13) {
				if ($_FILES['img']['name'][13]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/terlarang/'.$this->input->post('larang', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getTerlarang()
					);
				}
			} elseif ($key==14) {
				if ($_FILES['img']['name'][14]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/referensi/'.$this->input->post('ref', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getRef()
					);
				}
			} elseif ($key==15) {
				if ($_FILES['img']['name'][15]=='') {
					$data[] = array(
						'dataimg' => '/assets/img/attach/terima/'.$this->input->post('terima', TRUE)
					);
				} else {
					$data[] = array(
						'dataimg' => $this->getTerima()
					);
				}
			}
			$data['data']=$data;
		}
		$hasil=$this->UpdateData->dataAttach($data);
		if ($hasil==0) {
			echo '<script>alert("Gagal Update Data Baru, Ada Data yang Eror");window.history.go(-2);</script>';
		} elseif ($hasil==1) {
			$this->UpdateData->dataDiri();
			$this->UpdateData->dataPt();
			$this->UpdateData->history();
			if ($_FILES['img']['name'][4]!='' || $_FILES['img']['name'][6]!='' || $_FILES['img']['name'][7]!='' || $_FILES['img']['name'][9]!='' || $_FILES['img']['name'][10]!='' || $_FILES['img']['name'][11]!='' || $_FILES['img']['name'][8]!='') {
				$this->UpdateData->atthis();
			}
			if ($this->input->post('statuspt', TRUE)!='SK1' || $this->input->post('statuspthis', TRUE)!='SK1') {
				$this->UpdateData->storystatus();
			}
			echo '<script>alert("Berhasil Update Data Baru, Terima Kasih");window.history.go(-2);</script>';
		}
	}

	public function getFoto(){	
		$_FILES['foto']['name'] = $_FILES['img']['name'][0];
        $_FILES['foto']['type'] = $_FILES['img']['type'][0];
        $_FILES['foto']['tmp_name'] = $_FILES['img']['tmp_name'][0];
        $_FILES['foto']['error'] = $_FILES['img']['error'][0];
        $_FILES['foto']['size'] = $_FILES['img']['size'][0];
		$configfoto = array(
				'upload_path' => './assets/img/attach/foto',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configfoto); 
		if (! $this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Foto Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/foto/'.$this->input->post('foto', TRUE);
		}else{
			$foto = $this->upload->data();
			return '/assets/img/attach/foto/'.$foto['file_name'];
		}	
	}

	public function getKtp(){	
		$_FILES['ktp']['name'] = $_FILES['img']['name'][1];
        $_FILES['ktp']['type'] = $_FILES['img']['type'][1];
        $_FILES['ktp']['tmp_name'] = $_FILES['img']['tmp_name'][1];
        $_FILES['ktp']['error'] = $_FILES['img']['error'][1];
        $_FILES['ktp']['size'] = $_FILES['img']['size'][1];
		$configktp = array(
				'upload_path' => './assets/img/attach/ktp',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configktp); 
		$this->upload->initialize($configktp);
		if (! $this->upload->do_upload('ktp')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Ktp Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/ktp/'.$this->input->post('ktp', TRUE);
		}else{
			$ktp = $this->upload->data();
			return '/assets/img/attach/ktp/'.$ktp['file_name'];
		}	
	}

	public function getNpwp(){	
		$_FILES['npwp']['name'] = $_FILES['img']['name'][2];
        $_FILES['npwp']['type'] = $_FILES['img']['type'][2];
        $_FILES['npwp']['tmp_name'] = $_FILES['img']['tmp_name'][2];
        $_FILES['npwp']['error'] = $_FILES['img']['error'][2];
        $_FILES['npwp']['size'] = $_FILES['img']['size'][2];
		$confignpwp = array(
				'upload_path' => './assets/img/attach/npwp',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$confignpwp);
		$this->upload->initialize($confignpwp); 
		if (! $this->upload->do_upload('npwp')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("NPWP Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/npwp/'.$this->input->post('npwp', TRUE);
		}else{
			$npwp = $this->upload->data();
			return '/assets/img/attach/npwp/'.$npwp['file_name'];
		}	
	}

	public function getKk(){	
		$_FILES['kk']['name'] = $_FILES['img']['name'][3];
        $_FILES['kk']['type'] = $_FILES['img']['type'][3];
        $_FILES['kk']['tmp_name'] = $_FILES['img']['tmp_name'][3];
        $_FILES['kk']['error'] = $_FILES['img']['error'][3];
        $_FILES['kk']['size'] = $_FILES['img']['size'][3];
		$configkk = array(
				'upload_path' => './assets/img/attach/kk',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configkk);
		$this->upload->initialize($configkk); 
		if (! $this->upload->do_upload('kk')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("KK Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/kk/'.$this->input->post('kk', TRUE);
		}else{
			$kk = $this->upload->data();
			return '/assets/img/attach/kk/'.$kk['file_name'];
		}	
	}

	public function getSkck(){	
		$_FILES['skck']['name'] = $_FILES['img']['name'][4];
        $_FILES['skck']['type'] = $_FILES['img']['type'][4];
        $_FILES['skck']['tmp_name'] = $_FILES['img']['tmp_name'][4];
        $_FILES['skck']['error'] = $_FILES['img']['error'][4];
        $_FILES['skck']['size'] = $_FILES['img']['size'][4];
		$configskck = array(
				'upload_path' => './assets/img/attach/skck',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configskck); 
		$this->upload->initialize($configskck);
		if (! $this->upload->do_upload('skck')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("SKCK Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/skck/'.$this->input->post('skck', TRUE);
		}else{
			$skck = $this->upload->data();
			return '/assets/img/attach/skck/'.$skck['file_name'];
		}	
	}

	public function getLis(){	
		$_FILES['lis']['name'] = $_FILES['img']['name'][6];
        $_FILES['lis']['type'] = $_FILES['img']['type'][6];
        $_FILES['lis']['tmp_name'] = $_FILES['img']['tmp_name'][6];
        $_FILES['lis']['error'] = $_FILES['img']['error'][6];
        $_FILES['lis']['size'] = $_FILES['img']['size'][6];
		$configlis = array(
				'upload_path' => './assets/img/attach/lisensi',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configlis); 
		$this->upload->initialize($configlis);
		if (! $this->upload->do_upload('lis')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Lisensi Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/lisensi/'.$this->input->post('lis', TRUE);
		}else{
			$lis = $this->upload->data();
			return '/assets/img/attach/lisensi/'.$lis['file_name'];
		}	
	}

	public function getSer(){	
		$_FILES['ser']['name'] = $_FILES['img']['name'][7];
        $_FILES['ser']['type'] = $_FILES['img']['type'][7];
        $_FILES['ser']['tmp_name'] = $_FILES['img']['tmp_name'][7];
        $_FILES['ser']['error'] = $_FILES['img']['error'][7];
        $_FILES['ser']['size'] = $_FILES['img']['size'][7];
		$configser = array(
				'upload_path' => './assets/img/attach/sertifikat',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configser); 
		$this->upload->initialize($configser);
		if (! $this->upload->do_upload('ser')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Sertifikat Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/sertifikat/'.$this->input->post('ser', TRUE);
		}else{
			$ser = $this->upload->data();
			return '/assets/img/attach/sertifikat/'.$ser['file_name'];
		}	
	}

	public function getIjz(){	
		$_FILES['ijz']['name'] = $_FILES['img']['name'][5];
        $_FILES['ijz']['type'] = $_FILES['img']['type'][5];
        $_FILES['ijz']['tmp_name'] = $_FILES['img']['tmp_name'][5];
        $_FILES['ijz']['error'] = $_FILES['img']['error'][5];
        $_FILES['ijz']['size'] = $_FILES['img']['size'][5];
		$configijz = array(
				'upload_path' => './assets/img/attach/ijazah',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configijz); 
		$this->upload->initialize($configijz);
		if (! $this->upload->do_upload('ijz')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Ijazah Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/ijazah/'.$this->input->post('ijaz', TRUE);
		}else{
			$ijz = $this->upload->data();
			return '/assets/img/attach/ijazah/'.$ijz['file_name'];
		}	
	}

	public function getSrtNaik(){	
		$_FILES['srtnaik']['name'] = $_FILES['img']['name'][9];
        $_FILES['srtnaik']['type'] = $_FILES['img']['type'][9];
        $_FILES['srtnaik']['tmp_name'] = $_FILES['img']['tmp_name'][9];
        $_FILES['srtnaik']['error'] = $_FILES['img']['error'][9];
        $_FILES['srtnaik']['size'] = $_FILES['img']['size'][9];
		$confignaik = array(
				'upload_path' => './assets/img/attach/suratnaik',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$confignaik); 
		$this->upload->initialize($confignaik);
		if (! $this->upload->do_upload('srtnaik')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Surat Pengangkatan Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/suratnaik/'.$this->input->post('srtnaik', TRUE);
		}else{
			$naik = $this->upload->data();
			return '/assets/img/attach/suratnaik/'.$naik['file_name'];
		}	
	}

	public function getSp(){	
		$_FILES['sp']['name'] = $_FILES['img']['name'][10];
        $_FILES['sp']['type'] = $_FILES['img']['type'][10];
        $_FILES['sp']['tmp_name'] = $_FILES['img']['tmp_name'][10];
        $_FILES['sp']['error'] = $_FILES['img']['error'][10];
        $_FILES['sp']['size'] = $_FILES['img']['size'][10];
		$configsp = array(
				'upload_path' => './assets/img/attach/sp',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configsp); 
		$this->upload->initialize($configsp);
		if (! $this->upload->do_upload('sp')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Surat Peringatan Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/sp/'.$this->input->post('sp', TRUE);
		}else{
			$sp = $this->upload->data();
			return '/assets/img/attach/sp/'.$sp['file_name'];
		}	
	}

	public function getSrtOut(){	
		$_FILES['srtout']['name'] = $_FILES['img']['name'][11];
        $_FILES['srtout']['type'] = $_FILES['img']['type'][11];
        $_FILES['srtout']['tmp_name'] = $_FILES['img']['tmp_name'][11];
        $_FILES['srtout']['error'] = $_FILES['img']['error'][11];
        $_FILES['srtout']['size'] = $_FILES['img']['size'][11];
		$configout = array(
				'upload_path' => './assets/img/attach/suratout',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configout);
		$this->upload->initialize($configout); 
		if (! $this->upload->do_upload('srtout')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Surat Pemberhentian Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/suratout/'.$this->input->post('srtout', TRUE);
		}else{
			$out = $this->upload->data();
			return '/assets/img/attach/suratout/'.$out['file_name'];
		}	
	}

	public function getFakta(){	
		$_FILES['fakta']['name'] = $_FILES['img']['name'][8];
        $_FILES['fakta']['type'] = $_FILES['img']['type'][8];
        $_FILES['fakta']['tmp_name'] = $_FILES['img']['tmp_name'][8];
        $_FILES['fakta']['error'] = $_FILES['img']['error'][8];
        $_FILES['fakta']['size'] = $_FILES['img']['size'][8];
		$configfakta = array(
				'upload_path' => './assets/img/attach/fakta',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configfakta);
		$this->upload->initialize($configfakta); 
		if (! $this->upload->do_upload('fakta')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Fakta Integritas Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/fakta/'.$this->input->post('fakta', TRUE);
		}else{
			$fakta = $this->upload->data();
			return '/assets/img/attach/fakta/'.$fakta['file_name'];
		}	
	}

	public function getSehat(){	
		$_FILES['sehat']['name'] = $_FILES['img']['name'][12];
        $_FILES['sehat']['type'] = $_FILES['img']['type'][12];
        $_FILES['sehat']['tmp_name'] = $_FILES['img']['tmp_name'][12];
        $_FILES['sehat']['error'] = $_FILES['img']['error'][12];
        $_FILES['sehat']['size'] = $_FILES['img']['size'][12];
		$configsehat = array(
				'upload_path' => './assets/img/attach/suratsehat',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configsehat);
		$this->upload->initialize($configsehat); 
		if (! $this->upload->do_upload('sehat')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Surat Sehat Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/fakta/'.$this->input->post('fakta', TRUE);
		}else{
			$sehat = $this->upload->data();
			return '/assets/img/attach/suratsehat/'.$sehat['file_name'];
		}	
	}

	public function getTerlarang(){	
		$_FILES['terlarang']['name'] = $_FILES['img']['name'][13];
        $_FILES['terlarang']['type'] = $_FILES['img']['type'][13];
        $_FILES['terlarang']['tmp_name'] = $_FILES['img']['tmp_name'][13];
        $_FILES['terlarang']['error'] = $_FILES['img']['error'][13];
        $_FILES['terlarang']['size'] = $_FILES['img']['size'][13];
		$configlarang = array(
				'upload_path' => './assets/img/attach/terlarang',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configlarang);
		$this->upload->initialize($configlarang); 
		if (! $this->upload->do_upload('terlarang')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert(Bebas Org. Terlarang Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/fakta/'.$this->input->post('fakta', TRUE);
		}else{
			$larang = $this->upload->data();
			return '/assets/img/attach/terlarang/'.$larang['file_name'];
		}	
	}

	public function getRef(){	
		$_FILES['ref']['name'] = $_FILES['img']['name'][14];
        $_FILES['ref']['type'] = $_FILES['img']['type'][14];
        $_FILES['ref']['tmp_name'] = $_FILES['img']['tmp_name'][14];
        $_FILES['ref']['error'] = $_FILES['img']['error'][14];
        $_FILES['ref']['size'] = $_FILES['img']['size'][14];
		$configref = array(
				'upload_path' => './assets/img/attach/referensi',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configref);
		$this->upload->initialize($configref); 
		if (! $this->upload->do_upload('ref')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert(Pernyataan Referensi Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/fakta/'.$this->input->post('fakta', TRUE);
		}else{
			$ref = $this->upload->data();
			return '/assets/img/attach/referensi/'.$ref['file_name'];
		}	
	}

	public function getTerima(){	
		$_FILES['terima']['name'] = $_FILES['img']['name'][15];
        $_FILES['terima']['type'] = $_FILES['img']['type'][15];
        $_FILES['terima']['tmp_name'] = $_FILES['img']['tmp_name'][15];
        $_FILES['terima']['error'] = $_FILES['img']['error'][15];
        $_FILES['terima']['size'] = $_FILES['img']['size'][15];
		$configterima = array(
				'upload_path' => './assets/img/attach/terima',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size' => '2048'
		);
		$this->load->library('upload',$configterima);
		$this->upload->initialize($configterima); 
		if (! $this->upload->do_upload('terima')) {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert(Pernyataan Referensi Eror :'.$error['error'].', Proses Update Gagal.");</script>';
			//return '/assets/img/attach/fakta/'.$this->input->post('fakta', TRUE);
		}else{
			$terima = $this->upload->data();
			return '/assets/img/attach/terima/'.$terima['file_name'];
		}	
	}

	public function dataupdatetp(){
		$data = array();
		foreach ($_FILES['skp']['name'] as $key => $value) {
			if ($key==0) {
				if ($_FILES['skp']['name'][0]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('foto', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getFoto()
					);
				}
			} elseif ($key==1) {
				if ($_FILES['skp']['name'][1]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('ktp', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getKtp()
					);
				}
			} elseif ($key==2) {
				if ($_FILES['skp']['name'][2]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('npwp', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getNpwp()
					);
				}
			} elseif ($key==3) {
				if ($_FILES['skp']['name'][3]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('kk', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getKk()
					);
				}
			} elseif ($key==4) {
				if ($_FILES['skp']['name'][4]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('skck', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getSkck()
					);
				}
			} elseif ($key==5) {
				if ($_FILES['skp']['name'][5]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('ijaz', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getIjz()
					);
				}
			} elseif ($key==6) {
				if ($_FILES['skp']['name'][6]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('lis', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getLis()
					);
				}
			} elseif ($key==7) {
				if ($_FILES['skp']['name'][7]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('ser', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getSer()
					);
				}
			} elseif ($key==8) {
				if ($_FILES['skp']['name'][8]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('fakta', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getFakta()
					);
				}
			} elseif ($key==9) {
				if ($_FILES['skp']['name'][9]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('srtnaik', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getSrtNaik()
					);
				}
			} elseif ($key==10) {
				if ($_FILES['skp']['name'][10]=='') {
					$data[] = array(
						'dataskp' => '/assets/img/attach/skp/'.$this->input->post('sp', TRUE)
					);
				} else {
					$data[] = array(
						'dataskp' => $this->getSp()
					);
				}
			} 
			$data['data']=$data;
		}
		$ceknik = $this->UpdateData->cek($this->input->post('nikskp', TRUE));
		if ($ceknik==0) {
			# input
			$hasil=$this->UpdateData->saveAttachSkp($data);
			if ($hasil==0) {
				echo '<script>alert("Proses Gagal, Ada Data yang Eror");window.history.go(-2);</script>';
			} elseif ($hasil==1) {
				$this->UpdateData->saveDataSkp();
				echo '<script>alert("Proses Berhasil, Terima Kasih");window.history.go(-2);</script>';
			}
		} else {
			# update
			$hasil=$this->UpdateData->updateAttachSkp($data);
			if ($hasil==0) {
				echo '<script>alert("Proses Gagal, Ada Data yang Eror");window.history.go(-2);</script>';
			} elseif ($hasil==1) {
				$this->UpdateData->updateDataSkp();
				$this->UpdateData->saveHisSkp();
				$this->UpdateData->saveHisAttachSkp();
				echo '<script>alert("Proses Berhasil, Terima Kasih");window.history.go(-2);</script>';
			}
		}
	}
}