<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->model('LogHrd');
		$this->load->model('DisplayData');
		$this->load->model('UpdateData');
		$this->load->model('ImportGaji');
		$this->load->model('ImportLembur');
	}

	public function logCheck(){
		$data = $this->LogHrd->logCheck();
		$dataLog = $data->row_array();
		if ($data->num_rows() > 0) {
			if ($dataLog['leveluser'] == 'master') {
				$sesiLog = array(
							'useradmin' => $dataLog['namauser'],
							'hasadmin' => $dataLog['iduser']
							);
				$this->session->set_userdata($sesiLog);
				if ($dataLog['namauser']=='Alvin DM') {
					echo '<script>window.location.href="pks";</script>';
				} elseif ($dataLog['namauser']=='@anemadhon') {
					echo '<script>window.location.href="review";</script>';
				} else {
					echo '<script>window.location.href="input";</script>';
				}
			}
		} else {
			echo '<script>alert("Login Gagal, Silahkan Coba Lagi");</script>';
			$this->load->view('login/loginHrd');
		}
	}

	public function loginHrd(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin')
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/inputdata', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function review(){
		if ($this->session->has_userdata('hasadmin')) {
			//$this->getDataExpIDCardLicense();
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin')
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerreview', $dataLogMin);
			$this->load->view('body/review', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function inputdata(){
		if ($this->session->has_userdata('hasadmin')) {
			if ($this->session->userdata('useradmin')=='Kang Randi') {
				$this->getDataExpIDCardLicense();
			}
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin')
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/inputdata', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function cari(){
		if ($this->input->get('kw', TRUE)=='aktif') {
			$kw = 'SK1';
		} elseif ($this->input->get('kw', TRUE)=='skor') {
			$kw = 'SK4';
		} elseif ($this->input->get('kw', TRUE)=='cuti') {
			$kw = 'SK5';
		} elseif ($this->input->get('kw', TRUE)=='sma' || $this->input->get('kw', TRUE)=='smk') {
			$kw = 'SMA/K';
		} else {
			$kw = $this->input->get('kw', TRUE);
		}
		$param = array(
			'urut'=>$this->input->get('urut', TRUE),
			'key'=>$kw
		);
		$data['param'] = $param;
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'display' => $this->DisplayData->findData($param),
						'hbd' => $this->DisplayData->hbd()
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/displaydata', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function carigaji(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'uploaded' => $this->ImportGaji->findGaji($this->input->get('kw', TRUE))
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/importgaji', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function carilembur(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'uploaded' => $this->ImportLembur->findLembur($this->input->get('kw', TRUE))
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/importlembur', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function cariakta(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'akta' => $this->DisplayData->findAkta($this->input->get('kw', TRUE))
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/data_akta', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function caripks(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'data-ip' => $this->DisplayData->findIP($this->input->get('kw', TRUE)),
						'reminder' => $this->DisplayData->reminder()
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/data_izin_pks', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function cariizin(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'data-izin' => $this->DisplayData->findIzin($this->input->get('kw', TRUE)),
						'reminder_izin' => $this->DisplayData->reminder_izin()
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/data_izin', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function caritepe(){
		if ($this->input->get('kw', TRUE)=='aktif') {
			$kw = 'SK1';
		} elseif ($this->input->get('kw', TRUE)=='skor') {
			$kw = 'SK4';
		} elseif ($this->input->get('kw', TRUE)=='cuti') {
			$kw = 'SK5';
		} elseif ($this->input->get('kw', TRUE)=='sma' || $this->input->get('kw', TRUE)=='smk') {
			$kw = 'SMA/K';
		} else {
			$kw = $this->input->get('kw', TRUE);
		}
		$param = array(
			'urut'=>$this->input->get('urut', TRUE),
			'key'=>$kw
		);
		$data['param'] = $param;
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'tepe' => $this->DisplayData->findData($param)
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/tprogram', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}
	
	public function updatedata($ktp){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'update' => $this->DisplayData->upData($ktp),
						'status' => $this->DisplayData->statusData($ktp),
						'upStatus' => $this->UpdateData->otomatis($ktp)
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/updatedata', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function akta(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'akta' => $this->DisplayData->akta()
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/akta', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function pks(){
		if ($this->session->has_userdata('hasadmin')) {
			if ($this->session->userdata('useradmin')=='Alvin DM') {
				$prm = array();
				$reminder = $this->DisplayData->reminder();
				foreach ($reminder->result() as $r) {
		    		$on = $r->tglakhir;
		    		$tglon = new DateTime($on);
		    		$today = new DateTime();
		    		$lb = $today->diff($tglon);
		    		if ($lb->y==0 && $lb->m==0) {
		    			$count = $lb->format('%r%d Hari');
		    		} elseif ($lb->y==0 && $lb->d==0) {
		    			$count = $lb->format('%r%m Bulan');
		    		} elseif ($lb->m==0 && $lb->d==0) {
		    			$count = $lb->format('%r%y Tahun');
		    		} elseif ($lb->y==0) {
		    			$count = $lb->format('%r%m Bulan ').$lb->format('%r%d Hari');
		    		} elseif ($lb->m==0) {
		    			$count = $lb->format('%r%y Tahun ').$lb->format('%r%d Hari');
		    		} elseif ($lb->d==0) {
		    			$count = $lb->format('%r%y Tahun ').$lb->format('%r%m Bulan');
		    		} else {
		    			$count = $lb->format('%r%y Tahun ').$lb->format('%r%m Bulan ').$lb->format('%r%d Hari');
		    		}
		    		/*$hariminus = (int)$lb->format('%r%d');
					$bulanminus = (int)$lb->format('%r%m');
		    		if ($count=='2 Bulan' || $count=='1 Bulan' || ($lb->y==0 && $lb->m < 2) && ($hariminus > 0 || $bulanminus > 0)) {*/
		    		$countIntSeparatorLisensi = explode(', ', $count);
					$countIntBulanLisensi = explode(' ', $countIntSeparatorLisensi[0]);
					if ((int)$countIntBulanLisensi[0] <= 2 && $countIntBulanLisensi[1] == 'Bulan' || ($countIntBulanLisensi[1] == 'Hari' || (int)$countIntBulanLisensi[0] < 0)) {
		    			$prm[]=$on;
		    		}
		    	}
		    	if (count($prm) > 0) {
	    			$this->sendEmailLegal($reminder);
	    		}
			}
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'izin_pks' => $this->DisplayData->izinPks()
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/izin_pks', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function sendEmailLegal($prm) {
		$configMail = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 465,
					'smtp_user' => 'hrdlegalgatrans@gmail.com',
					'smtp_pass' => 'hrd@legal@it',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
		);
		$sesiLog = array(
					'reminder' => $prm
					);
		$dataLogMin['dataadmin'] = $sesiLog;
		$subject = 'REMINDER PKS';
		$message = $this->load->view('body/email', $dataLogMin, TRUE);
		$this->load->library('email', $configMail);
		$this->load->library('encryption');
		$this->email->set_newline("\r\n");
		$this->email->from('hrdlegalgatrans@gmail.com','REMINDER LEGAL');
		$this->email->to(
		        array('dhanteaja@gmail.com', 'alvindmuktiarta@gmail.com', 'edajubaed@gmail.com', 'yanimul273@gmail.com', 'ichalpower214@gmail.com','randi.windarsah@gatrans.co.id')
		        //array('dhanteaja@gmail.com', 'anemadhon@gmail.com')
		);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}

	public function getDataExpIDCardLicense(){
		$prmL = array();
		$reminderL = $this->DisplayData->reminderLicense();
		foreach ($reminderL->result() as $r) {
    		$lisensi = $r->lisensi;
    		$tglLisensi = new DateTime($lisensi);
    		$today = new DateTime();
    		$lb = $today->diff($tglLisensi);
    		if ($lb->y==0 && $lb->m==0) {
    			$count = $lb->format('%r%d Hari');
    		} elseif ($lb->y==0 && $lb->d==0) {
    			$count = $lb->format('%r%m Bulan');
    		} elseif ($lb->m==0 && $lb->d==0) {
    			$count = $lb->format('%r%y Tahun');
    		} elseif ($lb->y==0) {
    			$count = $lb->format('%r%m Bulan ').$lb->format('%r%d Hari');
    		} elseif ($lb->m==0) {
    			$count = $lb->format('%r%y Tahun ').$lb->format('%r%d Hari');
    		} elseif ($lb->d==0) {
    			$count = $lb->format('%r%y Tahun ').$lb->format('%r%m Bulan');
    		} else {
    			$count = $lb->format('%r%y Tahun ').$lb->format('%r%m Bulan ').$lb->format('%r%d Hari');
    		}
    		$hariminus = (int)$lb->format('%r%d');
			$bulanminus = (int)$lb->format('%r%m');
    		//if ($count=='2 Bulan' || $count=='1 Bulan' || ($lb->y==0 && $lb->m < 2) && ($hariminus > 0 || $bulanminus > 0)) {
    			$prm[]=$lisensi;
    		//}
    	}
    	$prmId = array();
		$reminderId = $this->DisplayData->reminderIdCard();
		foreach ($reminderId->result() as $rId) {
    		$exp = $rId->expidcard;
    		$tglExp = new DateTime($exp);
    		$today = new DateTime();
    		$lbId = $today->diff($tglExp);
    		if ($lbId->y==0 && $lbId->m==0) {
    			$countId = $lbId->format('%r%d Hari');
    		} elseif ($lbId->y==0 && $lbId->d==0) {
    			$countId = $lbId->format('%r%m Bulan');
    		} elseif ($lbId->m==0 && $lbId->d==0) {
    			$countId = $lbId->format('%r%y Tahun');
    		} elseif ($lbId->y==0) {
    			$countId = $lbId->format('%r%m Bulan ').$lbId->format('%r%d Hari');
    		} elseif ($lbId->m==0) {
    			$countId = $lbId->format('%r%y Tahun ').$lbId->format('%r%d Hari');
    		} elseif ($lbId->d==0) {
    			$countId = $lbId->format('%r%y Tahun ').$lbId->format('%r%m Bulan');
    		} else {
    			$countId = $lbId->format('%r%y Tahun ').$lbId->format('%r%m Bulan ').$lbId->format('%r%d Hari');
    		}
    		$hariminusId = (int)$lbId->format('%r%d');
			$bulanminusId = (int)$lbId->format('%r%m');
    		if ($countId=='14 Hari' || (($lbId->y==0 && $lbId->m < 2) && ($hariminusId > 0 || $bulanminusId > 0))) {
    			$prmId[]=$exp;
    		}
    	}
    	if (count($prm) > 0 || count($prmId) > 0) {
			$this->sendEmailHRD($reminderL, $reminderId);
		}
	}

	public function sendEmailHRD($prmL, $prmId) {
		$configMail = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 465,
					'smtp_user' => 'hrdlegalgatrans@gmail.com',
					'smtp_pass' => 'hrd@legal@it',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
		);
		$sesiLog = array(
					'reminder' => $prmL,
					'reminder_id' => $prmId
					);
		$dataLogMin['dataadmin'] = $sesiLog;
		$subject = 'REMINDER MASA BERLAKU';
		$message = $this->load->view('body/email_hrd', $dataLogMin, TRUE);
		$this->load->library('email', $configMail);
		$this->load->library('encryption');
		$this->email->set_newline("\r\n");
		$this->email->from('hrdlegalgatrans@gmail.com','REMINDER HRD');
		$this->email->to(
		        array('dhanteaja@gmail.com', 'alvindmuktiarta@gmail.com', 'edajubaed@gmail.com', 'yanimul273@gmail.com', 'ichalpower214@gmail.com','randi.windarsah@gatrans.co.id')
		        //array('dhanteaja@gmail.com', 'anemadhon@gmail.com')
		);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}

	public function pks_up($a,$b){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'izin_pks_up' => $this->DisplayData->izinPksUp($a, $b),
						'upto' => $this->DisplayData->upToIP($a, $b)
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/izin_pks_up', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function izin(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'izin' => $this->DisplayData->izin()
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/izin', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function izin_up($a,$b){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'izin_up' => $this->DisplayData->izinUp($a, $b),
						'upto' => $this->DisplayData->upToIzin($a, $b)
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/izin_up', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function tepe_up($a){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'tepe_up' => $this->DisplayData->tepeUp($a)
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/tepe_up', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function hbd(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'hbd' => $this->DisplayData->hbd()
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/hbd', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function reminder(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'reminder' => $this->DisplayData->reminder()
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/reminder', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function reminder_izin(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'reminder_izin' => $this->DisplayData->reminder_izin()
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/reminder_izin', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}
	
	public function user(){
		if ($this->session->has_userdata('hasadmin')) {
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'datauser' => $this->DisplayData->getUser($this->session->userdata('useradmin'))
						);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/datauser', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function userupdate(){
		$lama = $this->input->post('passlama', TRUE);
		$baru = $this->input->post('passbaru', TRUE);
		$pass = $this->LogHrd->check($lama);
		$passlama = $pass->row_array();
		$idlama = $passlama['iduser'];
		if ($pass->num_rows() > 0) {
			$passbaru = $this->LogHrd->ganti($idlama);
			$cekbaru = $this->LogHrd->check($baru)->row_array();
			if (md5($baru)==$cekbaru['passuser']) {
				echo '<script>alert("Berhasil, Silahkan Login Ulang");window.location.href="logout"</script>';
			} else {
				echo '<script>alert("Gagal, Silahkan Coba Lagi");window.location.href="user"</script>';
			}
		} else {
			echo '<script>alert("Gagal, Silahkan Coba Lagi");window.location.href="user"</script>';
		}
	}

	public function dlt(){
		$nik = $this->input->post('ktphis', TRUE);
		$status = $this->UpdateData->dlt($nik);
		echo '<script>alert("Berhasil Hapus Data, Terima Kasih");window.location.href="display"</script>';
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
