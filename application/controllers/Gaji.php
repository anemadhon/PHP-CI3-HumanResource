<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->model('ImportGaji');
	}

	public function index($from=0){
		if ($this->session->has_userdata('hasadmin')) {
			$jmlData = $this->ImportGaji->getRowGaji();
			$this->load->library('pagination');
			$config['base_url'] = 'http://hrd.gatrans.net/gaji/index/';
			$config['total_rows'] = $jmlData;
			$config['per_page'] = 50;
			//config style
			$config['full_tag_open'] = '<div class="page table-style">';
	        $config['full_tag_close'] = '</div>';
	        $config['first_link'] = 'Awal';
	        $config['last_link'] = 'Akhir';
	        $config['next_link'] = '&raquo';
	        $config['prev_link'] = '&laquo';
	        $config['cur_tag_open'] = '<a href="http://hrd.gatrans.net/gaji/" class="active">';
	        $config['cur_tag_close'] = '</a>';
	        //config style
			$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$this->pagination->initialize($config);	
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'uploaded' => $this->ImportGaji->getGaji()
					);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/importgaji', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}
}