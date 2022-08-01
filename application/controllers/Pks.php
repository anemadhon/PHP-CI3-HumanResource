<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pks extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->model('DisplayData');
	}

	public function display($from=0){
		if ($this->session->has_userdata('hasadmin')) {
			$jmlData = $this->DisplayData->showJmlDataIP();
			$this->load->library('pagination');
			$config['base_url'] = site_url().'/data-pks/display/';
			$config['total_rows'] = $jmlData;
			$config['per_page'] = 5;
			//config style
			$config['full_tag_open'] = '<div class="page table-style">';
	        $config['full_tag_close'] = '</div>';
	        $config['first_link'] = 'Awal';
	        $config['last_link'] = 'Akhir';
	        $config['next_link'] = '&raquo';
	        $config['prev_link'] = '&laquo';
	        $config['cur_tag_open'] = '<a href="http://hrd.gatrans.net/data-pks/display/" class="active">';
	        $config['cur_tag_close'] = '</a>';
	        //config style
			$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$this->pagination->initialize($config);	
			$sesiLog = array(
						'username' => $this->session->userdata('useradmin'),
						'data-ip' => $this->DisplayData->showDataIP($config['per_page'],$from),
						'reminder' => $this->DisplayData->reminder()
					);
			$dataLogMin['dataadmin'] = $sesiLog;
			$this->load->view('header/headerMaster', $dataLogMin);
			$this->load->view('body/data_izin_pks', $dataLogMin);
		} else {
			$this->load->view('login/loginHrd');
		}
	}
}