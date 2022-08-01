<?php
class ImportGaji extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function gaji($data){
		$this->db->insert_batch('hrdgaji', $this->db->escape_str($data));
	}

	public function getGaji(){ //$number,$offset
		date_default_timezone_set('Asia/Jakarta');
		$this->db->select('idgaji, nama, jabatan');
		$this->db->from('hrdgaji');
		$this->db->where('YEAR(tgljaminput)', date("Y"));
		$this->db->where('MONTH(tgljaminput)', date("m"));
		//$this->db->limit($number,$offset);

		return $this->db->get();
	}

	public function getRowGaji(){
		date_default_timezone_set('Asia/Jakarta');
		$this->db->select('idgaji, nama, jabatan');
		$this->db->from('hrdgaji');
		$this->db->where('YEAR(tgljaminput)', date("Y"));
		$this->db->where('MONTH(tgljaminput)', date("m"));

		return $this->db->get()->num_rows();
	}

	public function findGaji($kw){

		$this->db->select('idgaji, nama, jabatan');
		$this->db->from('hrdgaji');
		$this->db->where('YEAR(tgljaminput)', date("Y"));
		$this->db->where('MONTH(tgljaminput)', date("m"));
		$this->db->like('nama', $this->db->escape_like_str($kw));

		return $this->db->get();
	}

	public function slip($id){

		$this->db->select('idgaji, nama, jabatan, tgljaminput, hadir, gapro, bumbut, tunjangan_tot, thp, p1, p2, tf');
		$this->db->from('hrdgaji');
		$this->db->where('YEAR(tgljaminput)', date("Y"));
		$this->db->where('MONTH(tgljaminput)', date("m"));
		$this->db->where('idgaji', $id);

		return $this->db->get();
	}

	public function slip_all($id){

		$this->db->select('idgaji, nama, jabatan, tgljaminput, hadir, gapro, bumbut, tunjangan_tot, thp, p1, p2, tf');
		$this->db->from('hrdgaji');
		for ($i=0; $i < count($id)-1; $i++) { 
			$this->db->or_where('idgaji', $this->db->escape_like_str($id[$i]));
		}

		return $this->db->get();
	}

	public function hapus(){

		$this->db->empty_table('hrdgaji');
	}
}