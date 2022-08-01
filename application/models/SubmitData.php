<?php
class SubmitData extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function dataDiri(){
		date_default_timezone_set('Asia/Jakarta');
		if ($this->input->post('email', TRUE)=='' || $this->input->post('wa', TRUE)=='' || $this->input->post('ig', TRUE)=='' || $this->input->post('fb', TRUE)=='') {
			$email = '-';
			$wa = '-';
			$ig = '-';
			$fb = '-';
		} else {
			$email = $this->input->post('email', TRUE);
			$wa = $this->input->post('wa', TRUE);
			$ig = $this->input->post('ig', TRUE);
			$fb = $this->input->post('fb', TRUE);
		}
		$medsos = $email.'//'.$wa.'//'.$ig.'//'.$fb;
		$dataInput = array(
			'noktp' => strtoupper($this->input->post('noktp', TRUE)),
			'namadiri' => strtoupper($this->input->post('namadiri', TRUE)),
			'tmptlahir' => strtoupper($this->input->post('tmptlahir', TRUE)),
			'tgllahir' => date_format(date_create($this->input->post('tgllahir', TRUE)), "Y-m-d"),
			'agama' => strtoupper($this->input->post('agama', TRUE)),
			'jeka' => $this->input->post('jeka', TRUE),
			'tlpon' => $this->input->post('tlpon', TRUE),
			'tlpkel' => $this->input->post('tlpkel', TRUE),
			'namaibu' => strtoupper($this->input->post('namaibu', TRUE)),
			'alamat' => preg_replace("/[\n\r]/","",strtoupper($this->input->post('alamat', TRUE))),
			'alamatrmh' => preg_replace("/[\n\r]/","",strtoupper($this->input->post('alamatrmh', TRUE))),
			'nikah' => $this->input->post('nikah', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'medsos' => $medsos,
			'pcip' => $this->input->post('pcip', TRUE),
			'userinput' => strtoupper($this->input->post('userinput', TRUE)),
			'tglinput' => date("Y-m-d H:i:s"),
			'dlt' => 0
		);

		return $this->db->insert('hrddatadiri', $this->db->escape_str($dataInput));
	}

	public function dataPt(){
		if ($this->input->post('tgloff', TRUE)=='') {
			$off = '0000-00-00';
		} else {
			$off = date_format(date_create($this->input->post('tgloff', TRUE)), "Y-m-d");
		}
		$dataInput = array(
			'nikpt' => $this->input->post('nikpt', TRUE),
			'noktp' => $this->input->post('noktp', TRUE),
			'npwp' => $this->input->post('npwp', TRUE),
			'divisi' => strtoupper($this->input->post('divisi', TRUE)),
			'jbtn' => strtoupper($this->input->post('jbtn', TRUE)),
			'statuspt' => $this->input->post('statuspt', TRUE),
			'tglon' => date_format(date_create($this->input->post('tglon', TRUE)), "Y-m-d"),
			'tgloff' => $off,
			'norekpt' => $this->input->post('norekpt', TRUE),
			'masali' => date_format(date_create($this->input->post('masali', TRUE)), "Y-m-d"),
			'expidcard' => date_format(date_create($this->input->post('expidcard', TRUE)), "Y-m-d"),
			'pcip' => $this->input->post('pcip', TRUE)
		);

		return $this->db->insert('hrddatapt', $this->db->escape_str($dataInput));
	}

	public function dataAttach($data){
		if ($data[0]['dataimg']=='' || $data[1]['dataimg']=='' || $data[2]['dataimg']=='' || $data[3]['dataimg']=='' || $data[4]['dataimg']=='' || $data[5]['dataimg']=='' || $data[6]['dataimg']=='' || $data[7]['dataimg']=='' || $data[8]['dataimg']=='' || $data[9]['dataimg']=='' || $data[10]['dataimg']=='' || $data[11]['dataimg']=='' || $data[12]['dataimg']=='' || $data[13]['dataimg']=='' || $data[14]['dataimg']=='' || $data[15]['dataimg']=='') {
			return 0;
		} else {
			$dataUp = array(
				'noktp' => $this->input->post('noktp', TRUE),
				'pcip' => $this->input->post('pcip', TRUE),
				'fotopath' => $data[0]['dataimg'],
				'ktppath' => $data[1]['dataimg'],
				'npwppath' => $data[2]['dataimg'],
				'kkpath' => $data[3]['dataimg'],
				'skckpath' => $data[4]['dataimg'],
				'ijazpath' => $data[5]['dataimg'],
				'lisenpath' => $data[6]['dataimg'],
				'sertipath' => $data[7]['dataimg'],
				'faktapath' => $data[8]['dataimg'],
				'srtnaikpath' => $data[9]['dataimg'],
				'sppath' => $data[10]['dataimg'],
				'srtoutpath' => $data[11]['dataimg'],
				'sehatpath' => $data[12]['dataimg'],
				'larangpath' => $data[13]['dataimg'],
				'refpath' => $data[14]['dataimg'],
				'terimapath' => $data[15]['dataimg']
			);

			$this->db->insert('hrdattach', $this->db->escape_str($dataUp));
			return 1;
		}
	}

	public function getnama($nama){

		$this->db->select('namadiri');
		$this->db->from('hrddatadiri');
		$this->db->where('namadiri', $nama);

		return $this->db->get()->num_rows();
	}

	public function getid($id){

		$this->db->select('nikpt');
		$this->db->from('hrddatapt');
		$this->db->where('nikpt', $id);

		return $this->db->get()->num_rows();
	}

	public function saveAkta($data){
		if ($data['attach']=='') {
			return 0;
		} else {
			$akta = array(
				'nolegal' => $data['nolegal'],
				'perihal' => $data['perihal'],
				'tglbuat' => date_format(date_create($data['tglbuat']), "Y-m-d"),
				'notaris' => $data['notaris'],
				'tmptbuat' => $data['tmptbuat'],
				'attach' => $data['attach'],
				'tgljaminput' => $data['tgljaminput'],
				'userinput' => $data['userinput'],
				'ippc' => $data['ippc']
			);

			$this->db->insert('hrdlegal', $this->db->escape_str($akta));
			return 1;
		}
	}

	public function savePks($data){
		if ($data['attach']=='') {
			return 0;
		} else {
			$ip = array(
				'noizinpks' => $data['noizinpks'],
				'perihal' => $data['perihal'],
				'instansi' => $data['instansi'],
				'tglawal' => date_format(date_create($data['tglawal']), "Y-m-d"),
				'tglakhir' => date_format(date_create($data['tglakhir']), "Y-m-d"),
				'ket' => $data['ket'],
				'attach' => $data['attach'],
				'tgljaminput' => $data['tgljaminput'],
				'userinput' => $data['userinput'],
				'ippc' => $data['ippc']
			);

			$this->db->insert('hrdizinpks', $this->db->escape_str($ip));
			return 1;
		}
	}

	public function savePksUp($data){
		if ($data['attach']=='') {
			return 0;
		} else {
			$update = array(
				'noizinpks' => $data['noizinpks'],
				'tglawal' => date_format(date_create($data['tglawal']), "Y-m-d"),
				'tglakhir' => date_format(date_create($data['tglakhir']), "Y-m-d"),
				'attach' => $data['attach'],
			);

			$this->db->where('idizinpks', $data['idizinpks']);
			$this->db->where('ippc', $data['ippc']);
			$this->db->update('hrdizinpks', $this->db->escape_str($update));

			$ip = array(
				'noizinpks' => $data['noup'],
				'tglawal' => date_format(date_create($data['tglawalup']), "Y-m-d"),
				'tglakhir' => date_format(date_create($data['tglakhirup']), "Y-m-d"),
				'upto' => $data['upto'],
				'idizinpks' => $data['idizinpks'],
				'ippc' => $data['ippc'],
				'attach' => $data['attachup'],
				'tgljamupdate' => $data['tgljamupdate'],
				'userupdate' => $data['userupdate'],
				'ippcup' => $data['ippcup']
			);

			$this->db->insert('hrdizinpksup', $this->db->escape_str($ip));
			return 1;
		}
	}

	public function saveIzin($data){
		if ($data['attach']=='') {
			return 0;
		} else {
			$ip = array(
				'noizinpks' => $data['noizinpks'],
				'perihal' => $data['perihal'],
				'instansi' => $data['instansi'],
				'tglawal' => date_format(date_create($data['tglawal']), "Y-m-d"),
				'tglakhir' => date_format(date_create($data['tglakhir']), "Y-m-d"),
				'attach' => $data['attach'],
				'tgljaminput' => $data['tgljaminput'],
				'userinput' => $data['userinput'],
				'ippc' => $data['ippc']
			);

			$this->db->insert('hrdizinpks', $this->db->escape_str($ip));
			return 1;
		}
	}

	public function saveIzinUp($data){
		if ($data['attach']=='') {
			return 0;
		} else {
			$update = array(
				'noizinpks' => $data['noizinpks'],
				'tglawal' => date_format(date_create($data['tglawal']), "Y-m-d"),
				'tglakhir' => date_format(date_create($data['tglakhir']), "Y-m-d"),
				'attach' => $data['attach'],
			);

			$this->db->where('idizinpks', $data['idizinpks']);
			$this->db->where('ippc', $data['ippc']);
			$this->db->update('hrdizinpks', $this->db->escape_str($update));

			$ip = array(
				'noizinpks' => $data['noup'],
				'tglawal' => date_format(date_create($data['tglawalup']), "Y-m-d"),
				'tglakhir' => date_format(date_create($data['tglakhirup']), "Y-m-d"),
				'upto' => $data['upto'],
				'idizinpks' => $data['idizinpks'],
				'ippc' => $data['ippc'],
				'attach' => $data['attachup'],
				'tgljamupdate' => $data['tgljamupdate'],
				'userupdate' => $data['userupdate'],
				'ippcup' => $data['ippcup']
			);

			$this->db->insert('hrdizinpksup', $this->db->escape_str($ip));
			return 1;
		}
	}
}