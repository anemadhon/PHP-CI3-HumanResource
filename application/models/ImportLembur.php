<?php
class ImportLembur extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function lembur($data){
		$this->db->insert_batch('hrdlembur', $this->db->escape_str($data));
	}

	public function getLembur(){ //$number,$offset
		date_default_timezone_set('Asia/Jakarta');
		$this->db->select('idlembur, nama, jabatan');
		$this->db->from('hrdlembur');
		$this->db->where('YEAR(tgljaminput)', date("Y"));
		$this->db->where('MONTH(tgljaminput)', date("m"));
		//$this->db->limit($number,$offset);

		return $this->db->get();
	}

	public function getRowLembur(){
		date_default_timezone_set('Asia/Jakarta');
		$this->db->select('idlembur, nama, jabatan');
		$this->db->from('hrdlembur');
		$this->db->where('YEAR(tgljaminput)', date("Y"));
		$this->db->where('MONTH(tgljaminput)', date("m"));

		return $this->db->get()->num_rows();
	}

	public function findLembur($kw){

		$this->db->select('idlembur, nama, jabatan');
		$this->db->from('hrdlembur');
		$this->db->where('YEAR(tgljaminput)', date("Y"));
		$this->db->where('MONTH(tgljaminput)', date("m"));
		$this->db->like('nama', $this->db->escape_like_str($kw));

		return $this->db->get();
	}

	public function slipLembur($id){

		$this->db->select('idlembur, nama, jabatan, tgljaminput, msk_mlm, tot_kjk, tot_ot, tf');
		$this->db->from('hrdlembur');
		$this->db->where('YEAR(tgljaminput)', date("Y"));
		$this->db->where('MONTH(tgljaminput)', date("m"));
		$this->db->where('idlembur', $id);

		return $this->db->get();
	}

	public function slipLembur_all($id){

		$this->db->select('idlembur, nama, jabatan, tgljaminput, msk_mlm, tot_kjk, tot_ot, tf');
		$this->db->from('hrdlembur');
		for ($i=0; $i < count($id)-1; $i++) { 
			$this->db->or_where('idlembur', $this->db->escape_like_str($id[$i]));
		}

		return $this->db->get();
	}

	public function hapus(){

		$this->db->empty_table('hrdlembur');
	}
}