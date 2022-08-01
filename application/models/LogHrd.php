<?php
class LogHrd extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function logCheck(){

		$this->db->select("*");
		$this->db->from("hrduser");
		$this->db->where('akunuser', $this->input->post('akunuser', TRUE));
		$this->db->where('passuser', md5($this->input->post('passuser', TRUE)));
		return $this->db->get();
	}

	public function ganti($id){
		$updatepass = array(
			'passuser' => md5($this->input->post('passbaru', TRUE)),
			'akunuser' => $this->input->post('akunuser', TRUE),
			'namauser' => $this->input->post('namauser', TRUE)
		);

		$this->db->where('iduser', $id);
		$this->db->update('hrduser', $this->db->escape_str($updatepass));
	}

	public function check($pass){
		$this->db->select("iduser, passuser");
		$this->db->from("hrduser");
		$this->db->where('passuser', md5($pass));
		return $this->db->get();
	}
}