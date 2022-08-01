		<div class="container-fluid">
			<div class="row">
				<div class="hide-on-med-and-down" id="side-bar">
					<ul class="nav-btn">
						<li class="li-menu"><span class="span-user"><i class="material-icons">account_circle</i></span><a href="<?php echo site_url('datauser');?>" class="li-a"><?php echo $dataadmin['username'] ?></a></li><span class="span-title" id="menu"><i class="material-icons">menu</i></span>
					</ul>
					<ul class="ulli">
						<li class="li-menu"><a href="<?php echo site_url('input');?>" class="li-a tooltipped" data-position="left" data-tooltip="Basis Data">Basis Data<span class="span-li"><i class="material-icons">folder_shared</i></span></a></li>
						<?php if ($dataadmin['username'] == 'Kang Randi' || $dataadmin['username'] == '@anemadhon' || $dataadmin['username'] == 'Faisal G'){ ?>
						<li class="li-menu"><a href="<?php echo site_url('gaji');?>" class="li-a tooltipped" data-position="left" data-tooltip="Slip Gaji">Slip Gaji<span class="span-li"><i class="material-icons">monetization_on</i></span></a></li>
						<?php } ?>
						<li class="li-menu"><a href="<?php echo site_url('akta');?>" class="li-a tooltipped" data-position="left" data-tooltip="Legalitas">Legalitas<span class="span-li"><i class="material-icons">assignment</i></span></a></li>
						<li class="li-menu"><a href="<?php echo site_url('tp');?>" class="li-a tooltipped" data-position="left" data-tooltip="Training Program">Training Program<span class="span-li"><i class="material-icons">group_work</i></span></a></li>
						<li class="space"></li>
						<li class="li-menu"><a href="<?php echo site_url('logout');?>" class="li-a tooltipped" data-position="left" data-tooltip="Keluar">Keluar<span class="span-li"><i class="material-icons">assignment_return</i></span></a></li>
					</ul>
				</div>
				<div id="content-bar">
					<ul id="title-content">
						<li class="menu-title-a-on"><a href="<?php echo site_url('input');?>" id="menu-a">Input Data</a></li>
						<li class="menu-title-b"><a href="<?php echo site_url('display');?>" id="menu-b">Data Karyawan</a></li>
					</ul>
					<div id="content-side">
						<p id="form-title-a">Form Data Karyawan</p>
						<p id="form-title-b">PT Ghita Avia Trans</p>
						<?php
						echo form_open_multipart('updatedata','autocomplete="off"');
						
						function get_client_ip() {
						    $ipaddress = '';
						    if (getenv('HTTP_CLIENT_IP'))
						        $ipaddress = getenv('HTTP_CLIENT_IP');
						    else if(getenv('HTTP_X_FORWARDED_FOR'))
						        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
						    else if(getenv('HTTP_X_FORWARDED'))
						        $ipaddress = getenv('HTTP_X_FORWARDED');
						    else if(getenv('HTTP_FORWARDED_FOR'))
						        $ipaddress = getenv('HTTP_FORWARDED_FOR');
						    else if(getenv('HTTP_FORWARDED'))
						       $ipaddress = getenv('HTTP_FORWARDED');
						    else if(getenv('REMOTE_ADDR'))
						        $ipaddress = getenv('REMOTE_ADDR');
						    else
						        $ipaddress = 'UNKNOWN';
						    return $ipaddress;
						}
						?>
						<div class="row space ml-lg" id="update">
							<div class="col s12 m8 l9">
								<div class="row">
							        <div class="col s12">
							        	<label for="inputID">No. Induk Karyawan</label>
							        	<input id="inputID" type="text" class="browser-default text-input text-box-input" name="nikpt" placeholder="Nomor Induk Karyawan" value="<?php echo $dataadmin['update']['nik'] ?>" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputNIK">NIK KTP</label>
							        	<input id="inputNIK" type="text" class="browser-default text-input text-box-input" name="noktp" placeholder="Nomor Induk Kependudukan" value="<?php echo $dataadmin['update']['ktp'] ?>" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputNama">Nama</label>
							        	<input id="inputNama" type="text" class="browser-default text-input text-box-input" name="namadiri" placeholder="Nama Lengkap" value="<?php echo $dataadmin['update']['nama'] ?>" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputNPWP">NPWP</label>
							        	<input id="inputNPWP" type="text" class="browser-default text-input text-box-input" placeholder="NPWP" value="<?php echo $dataadmin['update']['npwp'] ?>">
							        	<input type="hidden" name="npwppt" id="tonpwp">
							        </div>
								</div>
								<label for="inputTmpt">TTL</label>
								<div class="row space-box">
									<?php  
					    			if ($dataadmin['update']['tl']=='0000-00-00') {
						    			$tl = date("Y-m-d");
						    		} else {
						    			$tl = $dataadmin['update']['tl'];
						    		}
						    		if ($dataadmin['update']['t']=='') {
						    			$t = 'INDONESIA';
						    		} else {
						    			$t = $dataadmin['update']['t'];
						    		}
					    			?>
							        <div class="col s6 space">
							        	<input id="inputTmpt" type="text" class="browser-default text-input text-box-input" name="tmptlahir" placeholder="Tempat Lahir" value="<?php echo $t ?>">
							        </div>
							        <div class="col s6 space">
							        	<input id="inputTgl" type="text" class="browser-default text-input text-box-input" name="tgllahir" placeholder="Tanggal Lahir : DD-MM-YYYY" value="<?php echo date_format(date_create($tl), "d-m-Y") ?>">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputDiv">Divisi</label>
							        	<input id="inputDiv" type="text" class="browser-default text-input text-box-input" placeholder="Divisi" name="divisi" list="div" value="<?php echo $dataadmin['update']['div'] ?>">
								    	<datalist id="div">
											<option value="AVSEC" class="text-box-input">
											<option value="FINANCE" class="text-box-input">
											<option value="HRD & LEGAL" class="text-box-input">
											<option value="IT DEVELOPMENT" class="text-box-input">
											<option value="MAINTENANCE" class="text-box-input">
											<option value="MANAJEMEN" class="text-box-input">
											<option value="OPERASIONAL" class="text-box-input">
											<option value="PURCHASING" class="text-box-input">
											<option value="QUALITY CONTROLL" class="text-box-input">
											<option value="SECURITY" class="text-box-input">
											<option value="SEKRETARIAT" class="text-box-input">
										</datalist>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputJab">Jabatan</label>
							        	<input id="inputJab" type="text" class="browser-default text-input text-box-input" placeholder="Jabatan" name="jbtn" value="<?php echo $dataadmin['update']['jbtn'] ?>">
							        </div>
								</div>
								<div class="row" id="bLisensi">
									<?php  
					    			if ($dataadmin['update']['lisensi']=='0000-00-00') {
						    			$lisensi = date("Y-m-d");
						    		} else {
						    			$lisensi = $dataadmin['update']['lisensi'];
						    		}
					    			?>
							        <div class="col s12">
					    				<label for="inputBatasLisen">Masa Lisensi</label>
							        	<input id="inputBatasLisen" type="text" class="browser-default text-input text-box-input" placeholder="Masa Lisensi" name="masali" value="<?php echo date_format(date_create($lisensi), "d-m-Y") ?>">
							        </div>
								</div>
								<label for="inputOn">Tanggal Aktif</label>
								<div class="row space-box">
									<?php  
					    			if ($dataadmin['update']['on']=='0000-00-00') {
						    			$on = date("Y-m-d");
						    		} else {
						    			$on = $dataadmin['update']['on'];
						    		}
					    			?>
							        <div class="col s6 space">
							        	<input id="inputOn" type="text" class="browser-default text-input text-box-input" name="tglon" placeholder="Tanggal Aktif : DD-MM-YYYY" value="<?php echo date_format(date_create($on), "d-m-Y") ?>">
							        </div>
							        <div class="col s6 space">
							        	<select name="statuspt" id="inputSK" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Pilih</option>
								    		<option value="SK1" class="text-box-input" <?php if($dataadmin['update']['status'] == 'SK1'){ echo 'selected'; } ?>>AKTIF</option>
								    		<option value="SK1" class="text-box-input">PENGGANTI</option>
								    		<option value="SK2" class="text-box-input" <?php if($dataadmin['update']['status'] == 'SK2'){ echo 'selected'; } ?>>RESIGN</option>
								    		<option value="SK3" class="text-box-input" <?php if($dataadmin['update']['status'] == 'SK3'){ echo 'selected'; } ?>>PECAT</option>
								    		<option value="SK6" class="text-box-input" <?php if($dataadmin['update']['status'] == 'SK6'){ echo 'selected'; } ?>>MENIGGAL</option>
								    		<option value="SK4" class="text-box-input" <?php if($dataadmin['update']['status'] == 'SK4'){ echo 'selected'; } ?>>SKOR / RUMAHKAN</option>
								    		<option value="SK5" class="text-box-input" <?php if($dataadmin['update']['status'] == 'SK5'){ echo 'selected'; } ?>>CUTI</option>
								    	</select>
							        </div>
								</div>
								<?php  
							  	if ($dataadmin['status']['tgloff']=='0000-00-00') {
							  		$tgloff = '';
							  	} else {
							  		$tgloff = $dataadmin['status']['tgloff'];
							  	}
							  	if ($dataadmin['status']['tglawal']=='0000-00-00') {
							  		$tglawal = '';
							  	} else {
							  		$tglawal = $dataadmin['status']['tglawal'];
							  	}
							  	if ($dataadmin['status']['tglakhir']=='0000-00-00') {
							  		$tglakhir = '';
							  	} else {
							  		$tglakhir = $dataadmin['status']['tglakhir'];
							  	}
							  	if ($dataadmin['update']['expidcard']=='0000-00-00') {
							  		$expidcard = '';
							  	} else {
							  		$expidcard = $dataadmin['update']['expidcard'];
							  	}
							  	?>
								<div class="row" id="singleDate" style="display: none">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" name="tgloff" id="inputOff" placeholder="Tanggal : DD-MM-YYYY" value="<?php echo date_format(date_create($tgloff), "d-m-Y") ?>">
							        </div>
								</div>
								<div class="row" id="doubleDate" style="display: none">
							        <div class="col s6">
							        	<input type="text" class="browser-default text-input text-box-input" name="tglawal" id="tglawal" placeholder="Tanggal : DD-MM-YYYY" value="<?php echo date_format(date_create($tglawal), "d-m-Y") ?>">
							        </div>
							        <div class="col s6">
							        	<input type="text" class="browser-default text-input text-box-input" name="tglakhir" id="tglakhir" placeholder="Tanggal : DD-MM-YYYY" value="<?php echo date_format(date_create($tglakhir), "d-m-Y") ?>">
							        </div>
								</div>
								<div class="row" id="ganti">
							        <div class="col s12">
							        	<input id="ketPengganti" type="text" class="browser-default text-input text-box-input" placeholder="Keterangan Pengganti (Detail)" name="norekpt">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputTlp">No. Telp. Aktif</label>
							        	<input id="inputTlp" type="text" class="browser-default text-input text-box-input" placeholder="Nomor Telepon Aktif" name="tlpon" value="<?php echo $dataadmin['update']['tlp'] ?>">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputTlpLain">No. Telp Keluarga</label>
							        	<input id="inputTlpLain" type="text" class="browser-default text-input text-box-input" placeholder="Nomor Telepon Keluarga" name="tlpkel" value="<?php echo $dataadmin['update']['tlpkel'] ?>">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputIbu">Nama Ibu Kandung</label>
							        	<input id="inputIbu" type="text" class="browser-default text-input text-box-input" placeholder="Ibu Kandung" name="namaibu" value="<?php echo $dataadmin['update']['ibu'] ?>">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputIbu">Tgl Exp ID Card</label>
							        	<input id="ExpIdCard" type="text" class="browser-default text-input text-box-input" placeholder="Tgl Exp ID Card" name="expidcard" value="<?php echo date_format(date_create($expidcard), "d-m-Y") ?>" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputStatus">Status Pernikahan</label>
							        	<select name="nikah" id="inputStatus" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Pilih</option>
								    		<option value="TK" class="text-box-input" <?php if($dataadmin['update']['nikah'] == 'TK'){ echo 'selected'; } ?>>TK</option>
								    		<option value="K0" class="text-box-input" <?php if($dataadmin['update']['nikah'] == 'K0'){ echo 'selected'; } ?>>K/0</option>
								    		<option value="K1" class="text-box-input" <?php if($dataadmin['update']['nikah'] == 'K1'){ echo 'selected'; } ?>>K/1</option>
								    		<option value="K2" class="text-box-input" <?php if($dataadmin['update']['nikah'] == 'K2'){ echo 'selected'; } ?>>K/2</option>
								    		<option value="K3" class="text-box-input" <?php if($dataadmin['update']['nikah'] == 'K3'){ echo 'selected'; } ?>>K/3</option>
								    		<option value="K4" class="text-box-input" <?php if($dataadmin['update']['nikah'] == 'K4'){ echo 'selected'; } ?>>K/4</option>
								    		<option value="K5" class="text-box-input" <?php if($dataadmin['update']['nikah'] == 'K5'){ echo 'selected'; } ?>>K/5</option>
								    		<option value="K6" class="text-box-input" <?php if($dataadmin['update']['nikah'] == 'K6'){ echo 'selected'; } ?>>K/6</option>
								    	</select>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputJK">Jenis Kelamin</label>
							        	<select name="jeka" id="inputJK" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Pilih</option>
								    		<option value="1" class="text-box-input" <?php if($dataadmin['update']['jk'] == '1'){ echo 'selected'; } ?>>LAKI-LAKI</option>
								    		<option value="0" class="text-box-input" <?php if($dataadmin['update']['jk'] == '0'){ echo 'selected'; } ?>>PEREMPUAN</option>
								    	</select>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputAgama">Agama</label>
							        	<select name="agama" id="inputAgama" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Pilih</option>
								    		<option value="ISLAM" class="text-box-input" <?php if($dataadmin['update']['agama'] == 'ISLAM'){ echo 'selected'; } ?>>ISLAM</option>
								    		<option value="KATOLIK" class="text-box-input" <?php if($dataadmin['update']['agama'] == 'KATOLIK'){ echo 'selected'; } ?>>KRISTEN-KATOLIK</option>
								    		<option value="PROTESTAN" class="text-box-input" <?php if($dataadmin['update']['agama'] == 'PROTESTAN'){ echo 'selected'; } ?>>KRISTEN-PROTESTAN</option>
								    		<option value="BUDHA" class="text-box-input" <?php if($dataadmin['update']['agama'] == 'BUDHA'){ echo 'selected'; } ?>>BUDHA</option>
								    		<option value="HINDU" class="text-box-input" <?php if($dataadmin['update']['agama'] == 'HINDU'){ echo 'selected'; } ?>>HINDU</option>
								    	</select>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputIlmu">Pendidikan</label>
							        	<select name="pendidikan" id="inputIlmu" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Pilih</option>
								    		<option value="TK" class="text-box-input" <?php if($dataadmin['update']['ilmu'] == 'TK'){ echo 'selected'; } ?>>TK</option>
								    		<option value="SD" class="text-box-input" <?php if($dataadmin['update']['ilmu'] == 'SD'){ echo 'selected'; } ?>>SD</option>
								    		<option value="SMP" class="text-box-input" <?php if($dataadmin['update']['ilmu'] == 'SMP'){ echo 'selected'; } ?>>SMP</option>
								    		<option value="SMA/K/SEDERAJAT" class="text-box-input" <?php if($dataadmin['update']['ilmu'] == 'SMA/K/SEDERAJAT'){ echo 'selected'; } ?>>SMA/K/SEDERAJAT</option>
								    		<option value="D3" class="text-box-input" <?php if($dataadmin['update']['ilmu'] == 'D3'){ echo 'selected'; } ?>>D3</option>
								    		<option value="S1" class="text-box-input" <?php if($dataadmin['update']['ilmu'] == 'S1'){ echo 'selected'; } ?>>S1</option>
								    		<option value="S2" class="text-box-input" <?php if($dataadmin['update']['ilmu'] == 'S2'){ echo 'selected'; } ?>>S2</option>
								    		<option value="S3" class="text-box-input" <?php if($dataadmin['update']['ilmu'] == 'S3'){ echo 'selected'; } ?>>S3</option>
								    	</select>
							        </div>
								</div>
								<label for="inputIG">Media Sosial</label>
								<div class="row space-box">
									<?php  
								  	if ($dataadmin['update']['medsos']=='') {
									  	$email = '';
									  	$wa = '';
									  	$ig = 'www.instagram.com/-';
									  	$fb = 'www.facebook.com/-';
								  	} else {
								  		$medsos = explode('//', $dataadmin['update']['medsos']);
									  	$email = $medsos[0];
									  	$wa = $medsos[1];
									  	$ig = $medsos[2];
									  	$fb = $medsos[3];
								  	}
								  	?>
							        <div class="col s6 space">
							        	<input id="inputIG" type="text" class="browser-default text-input text-box-input" name="ig" placeholder="Akun Instagram Tanpa '@'" value="<?php echo $ig ?>">
							        </div>
							        <div class="col s6 space">
							        	<input id="inputFB" type="text" class="browser-default text-input text-box-input" name="fb" placeholder="Facebook" value="<?php echo $fb ?>">
							        </div>
								</div>
								<div class="row space-box">
							        <div class="col s6 space">
							        	<input id="inputEmail" type="email" class="browser-default text-input text-box-input" name="email" placeholder="Email Aktif" value="<?php echo $email ?>">
							        </div>
							        <div class="col s6 space">
							        	<input id="inputWA" type="text" class="browser-default text-input text-box-input mb-s" name="wa" placeholder="No. WhatsApp" value="<?php echo $wa ?>">
										<?php if ($wa==''){ ?>
										<p>
											<label>
												<input type="checkbox" id="cekwa" class="filled-in">
												<span>Tandai Bila Sesuai No. Tlp</span>
											</label>
										</p>
										<?php } ?>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputAlamatKtp">Alamat KTP</label>
							        	<textarea name="alamat" id="inputAlamatKtp" class="browser-default text-input textarea-box-input" placeholder="Alamat KTP" rows="2"><?php echo $dataadmin['update']['alamat'] ?></textarea>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<label for="inputAlamatRmh">Alamat Domisili</label>
							        	<textarea name="alamatrmh" id="inputAlamatRmh" class="browser-default text-input textarea-box-input" placeholder="Alamat Domisili" rows="2"><?php echo $dataadmin['update']['domisili'] ?></textarea>
							        	<?php if (empty($dataadmin['update']['domisili'])){ ?>
							        	<p>
											<label>
												<input type="checkbox" id="cekalamat" class="filled-in">
												<span>Tandai Bila Sesuai KTP</span>
											</label>
										</p>
										<?php } ?>
							        </div>
								</div>
							</div>
							<div class="col s12 m4 l3">
								<div class="row">
							        <p class="attach-text mb-a"><strong>Unggah Lampiran</strong></p>
								</div>
					    		<div class="row space-box">
					    			<div class="space-file">
					    				<?php 
									    $foto1 = explode('/',$dataadmin['update']['fotolink']);
										$foto = $foto1[5];

										if ($foto=='kosong'){ 
										?>
						    			<label for="upFoto" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Foto</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upFoto" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $foto ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upFoto" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="foto" class="dlt" value="<?php echo $foto ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $ktp1 = explode('/',$dataadmin['update']['ktplink']);
										$ktp = $ktp1[5];

										if ($ktp=='kosong'){  
										?>
						    			<label for="upKtp" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih KTP</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upKtp" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $ktp ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upKtp" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="ktp" class="dlt" value="<?php echo $ktp ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $npwp1 = explode('/',$dataadmin['update']['npwplink']);
										$npwp = $npwp1[5];

										if ($npwp=='kosong'){
									    ?>
						    			<label for="upNpwp" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih NPWP</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upNpwp" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $npwp ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upNpwp" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="npwp" class="dlt" value="<?php echo $npwp ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $kk1 = explode('/',$dataadmin['update']['kklink']);
										$kk = $kk1[5];

										if ($kk=='kosong'){
									    ?>
						    			<label for="upKk" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih KK</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upKk" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $kk ?>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upKk" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="kk" class="dlt" value="<?php echo $kk ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $skck1 = explode('/',$dataadmin['update']['skcklink']);
										$skck = $skck1[5];
									    
										if ($skck=='kosong'){
									    ?>
						    			<label for="upSkck" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih SKCK</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upSkck" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $skck ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upSkck" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="skck" class="dlt" value="<?php echo $skck ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $ijaz1 = explode('/',$dataadmin['update']['ijazlink']);
										$ijaz = $ijaz1[5];

										if ($ijaz=='kosong'){
									    ?>
						    			<label for="upIjz" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Ijazah</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upIjz" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $ijaz ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upIjz" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="ijaz" class="dlt" value="<?php echo $ijaz ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $lis1 = explode('/',$dataadmin['update']['lisenlink']);
										$lis = $lis1[5];

										if ($lis=='kosong'){
									    ?>
						    			<label for="upLc" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Lisensi</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upLc" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $lis ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upLc" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="lis" class="dlt" value="<?php echo $lis ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $serti1 = explode('/',$dataadmin['update']['sertilink']);
										$serti = $serti1[5];

										if ($serti=='kosong'){
									    ?>
						    			<label for="upSft" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Sertifikat</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upSft" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $serti ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upSft" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="ser" class="dlt" value="<?php echo $serti ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $fakta1 = explode('/',$dataadmin['update']['faktalink']);
										$fakta = $fakta1[5];

										if ($fakta=='kosong'){
									    ?>
						    			<label for="upFakta" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Pakta Integritas</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upFakta" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $fakta ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upFakta" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="fakta" class="dlt" value="<?php echo $fakta ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $naik1 = explode('/',$dataadmin['update']['naiklink']);
										$naik = $naik1[5];

										if ($naik=='kosong'){
									    ?>
						    			<label for="upNaik" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Pengangkatan</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upNaik" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $naik ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upNaik" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="srtnaik" class="dlt" value="<?php echo $naik ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $sp1 = explode('/',$dataadmin['update']['splink']);
										$sp = $sp1[5];

										if ($sp=='kosong'){
									    ?>
						    			<label for="upSp" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Peringatan</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upSp" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $sp ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upSp" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="sp" class="dlt" value="<?php echo $sp ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $out1 = explode('/',$dataadmin['update']['outlink']);
										$out = $out1[5];

										if ($out=='kosong'){
									    ?>
						    			<label for="upOut" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Pemberhentian</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upOut" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $out ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upOut" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="srtout" class="dlt" value="<?php echo $out ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    if ($dataadmin['update']['sehatlink']=='') {
									    	$sehat = 'kosong';
									    } else {
									    	$sehat1 = explode('/',$dataadmin['update']['sehatlink']);
											$sehat = $sehat1[5];
									    }

									    if ($sehat=='kosong'){
									    ?>
						    			<label for="upSehat" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Sehat</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upSehat" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $sehat ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upSehat" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="sehat" class="dlt" value="<?php echo $sehat ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    if ($dataadmin['update']['laranglink']=='') {
									    	$larang = 'kosong';
									    } else {
									    	$larang1 = explode('/',$dataadmin['update']['laranglink']);
											$larang = $larang1[5];
									    }

									    if ($larang=='kosong'){
									    ?>
						    			<label for="upTerlarang" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Pernyataan Bebas Org. Terlarang</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upTerlarang" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $larang ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upTerlarang" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="larang" class="dlt" value="<?php echo $larang ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    if ($dataadmin['update']['reflink']=='') {
									    	$ref = 'kosong';
									    } else {
									    	$ref1 = explode('/',$dataadmin['update']['reflink']);
											$ref = $ref1[5];
									    }

									    if ($ref=='kosong'){
									    ?>
						    			<label for="upRef" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Pernyataan Referensi</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upRef" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $ref ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upRef" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="ref" class="dlt" value="<?php echo $ref ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    if ($dataadmin['update']['terimalink']=='') {
									    	$terima = 'kosong';
									    } else {
									    	$terima1 = explode('/',$dataadmin['update']['terimalink']);
											$terima = $terima1[5];
									    }

									    if ($terima=='kosong'){
									    ?>
						    			<label for="upTerima" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Terima Karyawan</p>
							    		</label>
							    		<?php } else { ?>
							    		<label for="upTerima" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">check</i><p class="nama-file add"><?php echo $terima ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="upTerima" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
							    		<input type="hidden" name="terima" class="dlt" value="<?php echo $terima ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
							</div>
					    </div>
						<div hidden>
							<input type="hidden" name="userinput" id="user" value="<?php echo $dataadmin['username'] ?>" hidden>
							<input type="hidden" name="pcip" id="ip" value="<?php echo get_client_ip() ?>" hidden>
							<input type="hidden" name="ktphis" value="<?php echo $dataadmin['update']['ktp'] ?>" hidden>
							<input type="hidden" name="divisihis" value="<?php echo $dataadmin['update']['div'] ?>" hidden>
							<input type="hidden" name="jbtnhis" value="<?php echo $dataadmin['update']['jbtn'] ?>" hidden>
							<input type="hidden" name="statushis" value="<?php echo $dataadmin['update']['status'] ?>" hidden>
							<input type="hidden" name="tglonhis" value="<?php echo $dataadmin['update']['on'] ?>" hidden>
							<input type="hidden" name="tgloffhis" value="<?php echo $dataadmin['update']['off'] ?>" hidden>
							<input type="hidden" name="iddiri" value="<?php echo $dataadmin['update']['id'] ?>" hidden>
							<input type="hidden" name="alamatktphis" value="<?php echo $dataadmin['update']['alamat'] ?>" hidden>
							<input type="hidden" name="alamatrmhhis" value="<?php echo $dataadmin['update']['domisili'] ?>" hidden>
							<input type="hidden" name="lisensihis" value="<?php echo $dataadmin['update']['lisensi'] ?>" hidden>
							<input type="hidden" name="skckatthis" value="<?php echo $dataadmin['update']['skcklink'] ?>" hidden>
							<input type="hidden" name="lisenatthis" value="<?php echo $dataadmin['update']['lisenlink'] ?>" hidden>
							<input type="hidden" name="sertiatthis" value="<?php echo $dataadmin['update']['sertilink'] ?>" hidden>
							<input type="hidden" name="srtupatthis" value="<?php echo $dataadmin['update']['naiklink'] ?>" hidden>
							<input type="hidden" name="spatthis" value="<?php echo $dataadmin['update']['splink'] ?>" hidden>
							<input type="hidden" name="srtoutatthis" value="<?php echo $dataadmin['update']['outlink'] ?>" hidden>
							<input type="hidden" name="paktaatthis" value="<?php echo $dataadmin['update']['faktalink'] ?>" hidden>
							<input type="hidden" name="statuspthis" value="<?php echo $dataadmin['update']['status'] ?>" hidden>
						</div>
						<div class="col s12 m8 l9">
							<div class="row right-align to-left mb-a">
								<?php if ($dataadmin['username'] == 'Kang Randi' || $dataadmin['username'] == '@anemadhon' || $dataadmin['username'] == 'Faisal G'): ?>
								<button class="btn save red black-text" type="submit" formaction="<?php echo site_url('dlt'); ?>"><i class="material-icons left">delete</i><strong>Hapus</strong></button>
								<?php endif ?>
								<button class="btn save" type="submit"><i class="material-icons left">save</i><strong>Ubah</strong></button>
							</div>
						</div>
						<?php
						echo form_close();
						?>
					</div>
					<!-- Modal Alert Here -->
					<div id="modal" class="modal">
						<div class="modal-content">
							<h4 id="modal-content"></h4>
						</div>
						<div class="modal-footer">
							<a href="#!" class="modal-close btn save"><i class="material-icons modal-close">close</i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>