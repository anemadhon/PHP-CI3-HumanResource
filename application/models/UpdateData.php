<?php
class UpdateData extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function dataDiri(){
		date_default_timezone_set('Asia/Jakarta');
		$medsos = $this->input->post('email', TRUE).'//'.$this->input->post('wa', TRUE).'//'.$this->input->post('ig', TRUE).'//'.$this->input->post('fb', TRUE);
		$update = array(
			'noktp' => $this->input->post('noktp', TRUE),
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
			'medsos' => $medsos
		);

		$this->db->where('noktp', $this->input->post('ktphis', TRUE));
		$this->db->where('iddiri', $this->input->post('iddiri', TRUE));
		$this->db->update('hrddatadiri', $this->db->escape_str($update));
	}

	public function dataPt(){
		if ($this->input->post('statuspt', TRUE)=='SK2' || $this->input->post('statuspt', TRUE)=='SK3' || $this->input->post('statuspt', TRUE)=='SK6') {
			$off = date_format(date_create($this->input->post('tgloff', TRUE)), "Y-m-d");
		} elseif ($this->input->post('statuspt', TRUE)=='SK4' || $this->input->post('statuspt', TRUE)=='SK5') {
			$off = date_format(date_create($this->input->post('tglakhir', TRUE)), "Y-m-d");
		} else {
			$off = date('Y-m-d');
		}
		$update = array(
			'nikpt' => $this->input->post('nikpt', TRUE),
			'noktp' => $this->input->post('noktp', TRUE),
			'npwp' => $this->input->post('npwppt', TRUE),
			'divisi' => strtoupper($this->input->post('divisi', TRUE)),
			'jbtn' => strtoupper($this->input->post('jbtn', TRUE)),
			'statuspt' => $this->input->post('statuspt', TRUE),
			'tglon' => date_format(date_create($this->input->post('tglon', TRUE)), "Y-m-d"),
			'tgloff' => $off,
			'norekpt' => $this->input->post('norekpt', TRUE),
			'masali' => date_format(date_create($this->input->post('masali', TRUE)), "Y-m-d"),
			'expidcard' => date_format(date_create($this->input->post('expidcard', TRUE)), "Y-m-d")
		);

		$this->db->where('noktp', $this->input->post('ktphis', TRUE));
		$this->db->where('idpt', $this->input->post('iddiri', TRUE));
		$this->db->update('hrddatapt', $this->db->escape_str($update));
	}

	public function dataAttach($data){
		if ($data[0]['dataimg']=='' || $data[1]['dataimg']=='' || $data[2]['dataimg']=='' || $data[3]['dataimg']=='' || $data[4]['dataimg']=='' || $data[5]['dataimg']=='' || $data[6]['dataimg']=='' || $data[7]['dataimg']=='' || $data[8]['dataimg']=='' || $data[9]['dataimg']=='' || $data[10]['dataimg']=='' || $data[11]['dataimg']=='' || $data[12]['dataimg']=='' || $data[13]['dataimg']=='' || $data[14]['dataimg']=='' || $data[15]['dataimg']=='') {
			return 0;
		} else {
			$update = array(
				'noktp' => $this->input->post('noktp', TRUE),
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

			$this->db->where('noktp', $this->input->post('ktphis', TRUE));
			$this->db->where('idattach', $this->input->post('iddiri', TRUE));
			$this->db->update('hrdattach', $this->db->escape_str($update));
			return 1;
		}
		
	}

	public function history(){
		date_default_timezone_set('Asia/Jakarta');
		$dataInput = array(
			'iddata' => $this->input->post('iddiri', TRUE),
			'ktphis' => $this->input->post('ktphis', TRUE),
			'divisihis' => $this->input->post('divisihis', TRUE),
			'jbtnhis' => $this->input->post('jbtnhis', TRUE),
			'statushis' => $this->input->post('statushis', TRUE),
			'tglonhis' => $this->input->post('tglonhis', TRUE),
			'tgloffhis' => $this->input->post('tgloffhis', TRUE),
			'alamatktphis' => $this->input->post('alamatktphis', TRUE),
			'alamatrmhhis' => $this->input->post('alamatrmhhis', TRUE),
			'lisensihis' => $this->input->post('lisensihis', TRUE),
			'ippc' => $this->input->post('pcip', TRUE),
			'userupdate' => $this->input->post('userinput', TRUE),
			'tglupdate' => date("Y-m-d H:i:s")
		);

		return $this->db->insert('hrdhistory', $this->db->escape_str($dataInput));
	}

	public function atthis(){
		date_default_timezone_set('Asia/Jakarta');
		$datahisatt = array(
			'iddata' => $this->input->post('iddiri', TRUE),
			'ktpattach' => $this->input->post('ktphis', TRUE),
			'skckatthis' => $this->input->post('skckatthis', TRUE),
			'lisensiatthis' => $this->input->post('lisenatthis', TRUE),
			'sertiatthis' => $this->input->post('sertiatthis', TRUE),
			'srtupatthis' => $this->input->post('srtupatthis', TRUE),
			'spatthis' => $this->input->post('spatthis', TRUE),
			'srtoutatthis' => $this->input->post('srtoutatthis', TRUE),
			'paktaatthis' => $this->input->post('paktaatthis', TRUE),
			'ippc' => $this->input->post('pcip', TRUE),
			'userupdate' => $this->input->post('userinput', TRUE),
			'tglupdate' => date("Y-m-d H:i:s")
		);

		return $this->db->insert('hrdhisattach', $this->db->escape_str($datahisatt));
	}

	public function storystatus(){
		date_default_timezone_set('Asia/Jakarta');
		$dataInput = array(
			'iddata' => $this->input->post('iddiri', TRUE),
			'nikstatus' => $this->input->post('ktphis', TRUE),
			'statuslama' => $this->input->post('statushis', TRUE),
			'statusbaru' => $this->input->post('statuspt', TRUE),
			'tgloff' => date_format(date_create($this->input->post('tgloff', TRUE)), "Y-m-d"),
			'tglawal' => date_format(date_create($this->input->post('tglawal', TRUE)), "Y-m-d"),
			'tglakhir' => date_format(date_create($this->input->post('tglakhir', TRUE)), "Y-m-d"),
			'pcip' => $this->input->post('pcip', TRUE),
			'userinput' => $this->input->post('userinput', TRUE),
			'tglinput' => date("Y-m-d H:i:s")
		);

		return $this->db->insert('hrdstatus', $this->db->escape_str($dataInput));
	}

	public function otomatis($ktp){
		date_default_timezone_set('Asia/Jakarta');
		$this->db->select('tgloff');
		$this->db->from('hrddatapt');
		$this->db->where('noktp', $ktp);

		$status = $this->db->get()->row_array();

		if (date("Y-m-d")==$status['tgloff']) {
			$update = array(
				'statuspt' => 'SK1'
			);

			$this->db->where('noktp', $ktp);
			$this->db->update('hrddatapt', $this->db->escape_str($update));
		}
	}

	public function dlt($ktp){
		$update = array(
			'dlt' => '1'
		);

		$this->db->where('noktp', $ktp);
		$this->db->update('hrddatadiri', $this->db->escape_str($update));
	}

	public function cek($nik){
		$this->db->select('nikskp');
		$this->db->from('hrdtp');
		$this->db->where('nikskp', $nik);

		return $this->db->get()->num_rows();
	}

	public function saveAttachSkp($data){
		if ($data[0]['dataskp']=='' || $data[1]['dataskp']=='' || $data[2]['dataskp']=='' || $data[3]['dataskp']=='' || $data[4]['dataskp']=='' || $data[5]['dataskp']=='' || $data[6]['dataskp']=='' || $data[7]['dataskp']=='' || $data[8]['dataskp']=='' || $data[9]['dataskp']=='' || $data[10]['dataskp']=='') {
			return 0;
		} else {
			$update = array(
				'noktp' => $this->input->post('noktp', TRUE),
				'fotopath' => $data[0]['dataskp'],
				'ktppath' => $data[1]['dataskp'],
				'npwppath' => $data[2]['dataskp'],
				'kkpath' => $data[3]['dataskp'],
				'skckpath' => $data[4]['dataskp'],
				'ijazpath' => $data[5]['dataskp'],
				'lisenpath' => $data[6]['dataskp'],
				'sertipath' => $data[7]['dataskp'],
				'faktapath' => $data[8]['dataskp'],
				'srtnaikpath' => $data[9]['dataskp'],
				'sppath' => $data[10]['dataskp'],
				'srtoutpath' => $data[11]['dataskp'],
				'sehatpath' => $data[12]['dataskp'],
				'larangpath' => $data[13]['dataskp'],
				'refpath' => $data[14]['dataskp'],
				'terimapath' => $data[15]['dataskp']
			);

			$this->db->where('noktp', $this->input->post('ktphis', TRUE));
			$this->db->where('idattach', $this->input->post('iddiri', TRUE));
			$this->db->update('hrdattach', $this->db->escape_str($update));
			return 1;
		}
		
	}

	public function saveDataSkp(){
		date_default_timezone_set('Asia/Jakarta');
		$medsos = $this->input->post('email', TRUE).'//'.$this->input->post('wa', TRUE).'//'.$this->input->post('ig', TRUE).'//'.$this->input->post('fb', TRUE);
		$update = array(
			'noktp' => $this->input->post('noktp', TRUE),
			'namadiri' => strtoupper($this->input->post('namadiri', TRUE)),
			'tmptlahir' => strtoupper($this->input->post('tmptlahir', TRUE)),
			'tgllahir' => date_format(date_create($this->input->post('tgllahir', TRUE)), "Y-m-d"),
			'agama' => strtoupper($this->input->post('agama', TRUE)),
			'jeka' => $this->input->post('jeka', TRUE),
			'tlpon' => $this->input->post('tlpon', TRUE),
			'tlpkel' => $this->input->post('tlpkel', TRUE),
			'namaibu' => strtoupper($this->input->post('namaibu', TRUE)),
			'alamat' => strtoupper($this->input->post('alamat', TRUE)),
			'alamatrmh' => strtoupper($this->input->post('alamatrmh', TRUE)),
			'nikah' => $this->input->post('nikah', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'medsos' => $medsos
		);

		$this->db->where('noktp', $this->input->post('ktphis', TRUE));
		$this->db->where('iddiri', $this->input->post('iddiri', TRUE));
		$this->db->update('hrddatadiri', $this->db->escape_str($update));
	}

	public function updateAttachSkp($data){
		if ($data[0]['dataskp']=='' || $data[1]['dataskp']=='' || $data[2]['dataskp']=='' || $data[3]['dataskp']=='' || $data[4]['dataskp']=='' || $data[5]['dataskp']=='' || $data[6]['dataskp']=='' || $data[7]['dataskp']=='' || $data[8]['dataskp']=='' || $data[9]['dataskp']=='' || $data[10]['dataskp']=='') {
			return 0;
		} else {
			$update = array(
				'noktp' => $this->input->post('noktp', TRUE),
				'fotopath' => $data[0]['dataskp'],
				'ktppath' => $data[1]['dataskp'],
				'npwppath' => $data[2]['dataskp'],
				'kkpath' => $data[3]['dataskp'],
				'skckpath' => $data[4]['dataskp'],
				'ijazpath' => $data[5]['dataskp'],
				'lisenpath' => $data[6]['dataskp'],
				'sertipath' => $data[7]['dataskp'],
				'faktapath' => $data[8]['dataskp'],
				'srtnaikpath' => $data[9]['dataskp'],
				'sppath' => $data[10]['dataskp'],
				'srtoutpath' => $data[11]['dataskp'],
				'sehatpath' => $data[12]['dataskp'],
				'larangpath' => $data[13]['dataskp'],
				'refpath' => $data[14]['dataskp'],
				'terimapath' => $data[15]['dataskp']
			);

			$this->db->where('noktp', $this->input->post('ktphis', TRUE));
			$this->db->where('idattach', $this->input->post('iddiri', TRUE));
			$this->db->update('hrdattach', $this->db->escape_str($update));
			return 1;
		}
		
	}

	public function updateDataSkp(){
		date_default_timezone_set('Asia/Jakarta');
		$medsos = $this->input->post('email', TRUE).'//'.$this->input->post('wa', TRUE).'//'.$this->input->post('ig', TRUE).'//'.$this->input->post('fb', TRUE);
		$update = array(
			'noktp' => $this->input->post('noktp', TRUE),
			'namadiri' => strtoupper($this->input->post('namadiri', TRUE)),
			'tmptlahir' => strtoupper($this->input->post('tmptlahir', TRUE)),
			'tgllahir' => date_format(date_create($this->input->post('tgllahir', TRUE)), "Y-m-d"),
			'agama' => strtoupper($this->input->post('agama', TRUE)),
			'jeka' => $this->input->post('jeka', TRUE),
			'tlpon' => $this->input->post('tlpon', TRUE),
			'tlpkel' => $this->input->post('tlpkel', TRUE),
			'namaibu' => strtoupper($this->input->post('namaibu', TRUE)),
			'alamat' => strtoupper($this->input->post('alamat', TRUE)),
			'alamatrmh' => strtoupper($this->input->post('alamatrmh', TRUE)),
			'nikah' => $this->input->post('nikah', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'medsos' => $medsos
		);

		$this->db->where('noktp', $this->input->post('ktphis', TRUE));
		$this->db->where('iddiri', $this->input->post('iddiri', TRUE));
		$this->db->update('hrddatadiri', $this->db->escape_str($update));
	}

	public function saveHisSkp(){
		date_default_timezone_set('Asia/Jakarta');
		$medsos = $this->input->post('email', TRUE).'//'.$this->input->post('wa', TRUE).'//'.$this->input->post('ig', TRUE).'//'.$this->input->post('fb', TRUE);
		$update = array(
			'noktp' => $this->input->post('noktp', TRUE),
			'namadiri' => strtoupper($this->input->post('namadiri', TRUE)),
			'tmptlahir' => strtoupper($this->input->post('tmptlahir', TRUE)),
			'tgllahir' => date_format(date_create($this->input->post('tgllahir', TRUE)), "Y-m-d"),
			'agama' => strtoupper($this->input->post('agama', TRUE)),
			'jeka' => $this->input->post('jeka', TRUE),
			'tlpon' => $this->input->post('tlpon', TRUE),
			'tlpkel' => $this->input->post('tlpkel', TRUE),
			'namaibu' => strtoupper($this->input->post('namaibu', TRUE)),
			'alamat' => strtoupper($this->input->post('alamat', TRUE)),
			'alamatrmh' => strtoupper($this->input->post('alamatrmh', TRUE)),
			'nikah' => $this->input->post('nikah', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'medsos' => $medsos
		);

		$this->db->where('noktp', $this->input->post('ktphis', TRUE));
		$this->db->where('iddiri', $this->input->post('iddiri', TRUE));
		$this->db->update('hrddatadiri', $this->db->escape_str($update));
	}

	public function saveHisAttachSkp(){
		if ($data[0]['dataskp']=='' || $data[1]['dataskp']=='' || $data[2]['dataskp']=='' || $data[3]['dataskp']=='' || $data[4]['dataskp']=='' || $data[5]['dataskp']=='' || $data[6]['dataskp']=='' || $data[7]['dataskp']=='' || $data[8]['dataskp']=='' || $data[9]['dataskp']=='' || $data[10]['dataskp']=='') {
			return 0;
		} else {
			$update = array(
				'noktp' => $this->input->post('noktp', TRUE),
				'fotopath' => $data[0]['dataskp'],
				'ktppath' => $data[1]['dataskp'],
				'npwppath' => $data[2]['dataskp'],
				'kkpath' => $data[3]['dataskp'],
				'skckpath' => $data[4]['dataskp'],
				'ijazpath' => $data[5]['dataskp'],
				'lisenpath' => $data[6]['dataskp'],
				'sertipath' => $data[7]['dataskp'],
				'faktapath' => $data[8]['dataskp'],
				'srtnaikpath' => $data[9]['dataskp'],
				'sppath' => $data[10]['dataskp'],
				'srtoutpath' => $data[11]['dataskp'],
				'sehatpath' => $data[12]['dataskp'],
				'larangpath' => $data[13]['dataskp'],
				'refpath' => $data[14]['dataskp'],
				'terimapath' => $data[15]['dataskp']
			);

			$this->db->where('noktp', $this->input->post('ktphis', TRUE));
			$this->db->where('idattach', $this->input->post('iddiri', TRUE));
			$this->db->update('hrdattach', $this->db->escape_str($update));
			return 1;
		}
		
	}
}