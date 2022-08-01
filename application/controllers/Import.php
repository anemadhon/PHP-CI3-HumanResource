<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/third_party/PHPExcel/PHPExcel.php');

class Import extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->model('ImportLembur');
		$this->load->model('ImportGaji');
		$this->load->model('DisplayData');
	}

	public function datagaji(){
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->has_userdata('hasadmin')) {
			//proses upload file excel ke folder
			$this->load->library('upload'); // Load librari upload
    
		    $config['upload_path'] = './assets/excel';
		    $config['allowed_types'] = 'xlsx';
		    $config['max_size']  = '2048';
		    $config['overwrite'] = true;
		    $config['file_name'] = $_FILES['import']['name'];
		  
		    $this->upload->initialize($config); // Load konfigurasi uploadnya
		    if($this->upload->do_upload('import')){ // Lakukan upload dan Cek jika proses upload berhasil
		      	// Jika berhasil :
		      	//proses membaca file excel dari folder
				$excelreader = new PHPExcel_Reader_Excel2007();
			    $loadexcel = $excelreader->load('assets/excel/'.$_FILES['import']['name']); // Load file yang telah diupload ke folder excel
			    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			    
			    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
			    $data = array();
			    
			    $numrow = 2;
			    foreach($sheet as $row){
			      // Cek $numrow apakah lebih dari 1
			      // Artinya karena baris pertama adalah nama-nama kolom
			      // Jadi dilewat saja, tidak usah diimport
			    	if($numrow > 2){
			        // Kita push (add) array data ke variabel data
			        	array_push($data, array(
			          		'nama'=>$row['B'],
			          		'jabatan'=>$row['C'],
			          		'gapok'=>$row['D'],
			          		'nilai_bb'=>$row['E'],
			          		'gapro'=>$row['F'],
			          		'hadir'=>$row['G'],
			          		'bumbut'=>$row['H'],
			          		'tunjangan_jab'=>$row['I'],
			          		'tunjangan_l1'=>$row['J'],
			          		'tunjangan_bbm'=>$row['K'],
			          		'tunjangan_tmpt'=>$row['L'],
			          		'tunjangan_l2'=>$row['M'],
			          		'tunjangan_tot'=>$row['N'],
			          		'thp'=>$row['O'],
			          		'p1'=>$row['P'],
			          		'p2'=>$row['Q'],
			          		'tf'=>$row['R'],
			          		'tgljaminput'=>date("Y-m-d H:i:s"),
			          		'pcinput'=>$this->input->post('pcinput',TRUE),
			        	));
			    	}
			      
			   		$numrow++; // Tambah 1 setiap kali looping
			    }
			    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
			    $this->ImportGaji->gaji($data);
				echo '<script>alert("Import Data Sukses");window.location.href="gaji"</script>';
		    }else{
		      echo '<script>alert("Gagal Upload, Silahkan Ulang");window.location.href="gaji"</script>';
		    }
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function hapus() {
		echo "<script>var confirm = confirm('Yakin Hapus Data Ini ?');
        	if(confirm){ 
           		".$this->ImportGaji->hapus().";
           		window.location.href='gaji';
        	} else {
        		window.location.href='display';
        	}
        	</script>";
	}

	public function datalembur(){
		date_default_timezone_set('Asia/Jakarta');
		if ($this->session->has_userdata('hasadmin')) {
			//proses upload file excel ke folder
			$this->load->library('upload'); // Load librari upload
    
		    $config['upload_path'] = './assets/excel';
		    $config['allowed_types'] = 'xlsx';
		    $config['max_size']  = '2048';
		    $config['overwrite'] = true;
		    $config['file_name'] = $_FILES['import']['name'];
		  
		    $this->upload->initialize($config); // Load konfigurasi uploadnya
		    if($this->upload->do_upload('import')){ // Lakukan upload dan Cek jika proses upload berhasil
		      	// Jika berhasil :
		      	//proses membaca file excel dari folder
				$excelreader = new PHPExcel_Reader_Excel2007();
			    $loadexcel = $excelreader->load('assets/excel/'.$_FILES['import']['name']); // Load file yang telah diupload ke folder excel
			    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			    
			    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
			    $data = array();
			    
			    $numrow = 2;
			    foreach($sheet as $row){
			      // Cek $numrow apakah lebih dari 1
			      // Artinya karena baris pertama adalah nama-nama kolom
			      // Jadi dilewat saja, tidak usah diimport
			    	if($numrow > 2){
			        // Kita push (add) array data ke variabel data
			        	array_push($data, array(
			          		'nama'=>$row['B'],
			          		'jabatan'=>$row['C'],
			          		'tot_kjk'=>$row['D'],
			          		'tot_ot'=>$row['E'],
			          		'msk_mlm'=>$row['F'],
			          		'food' =>$row['G'],
			          		'tf'=>$row['H'],
			          		'tgljaminput'=>date("Y-m-d H:i:s"),
			          		'pcinput'=>$this->input->post('pcinput',TRUE),
			        	));
			    	}
			      
			   		$numrow++; // Tambah 1 setiap kali looping
			    }
			    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
			    $this->ImportLembur->lembur($data);
				echo '<script>alert("Import Data Sukses");window.location.href="lembur"</script>';
		    }else{
		      echo '<script>alert("Gagal Upload, Silahkan Ulang");window.location.href="lembur"</script>';
		    }
		} else {
			$this->load->view('login/loginHrd');
		}
	}

	public function hapus_lembur() {
		echo "<script>var confirm = confirm('Yakin Hapus Data Ini ?');
        	if(confirm){ 
           		".$this->ImportLembur->hapus().";
           		window.location.href='lembur';
        	} else {
        		window.location.href='display';
        	}
        	</script>";
	}
}