<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tepe extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->model('DisplayData');
	}

	public function index(){
		if ($this->session->has_userdata('hasadmin')) {
			$jmlData = $this->DisplayData->showJmlData();
			$this->load->library('pagination');
			$config['base_url'] = 'http://hrd.gatrans.net/tepe/index/';
			$config['total_rows'] = $jmlData;
			$config['per_page'] = 50;
			//config style
			$config['full_tag_open'] = '<div class="page">';
	        $config['full_tag_close'] = '</div>';
	        $config['first_link'] = 'Awal';
	        $config['last_link'] = 'Akhir';
	        $config['next_link'] = '&raquo';
	        $config['prev_link'] = '&laquo';
	        $config['cur_tag_open'] = '<a href="#" class="active">';
	        $config['cur_tagl_close'] = '</a>';
	        //config style
			$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$this->pagination->initialize($config);	
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'tepe' => $this->DisplayData->showData($config['per_page'],$from)
					);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster');
			$this->load->view('body/tprogram', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}
}