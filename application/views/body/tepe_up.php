		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4" id="side-bar">
					<div class="nav-btn">
						<a href="<?php echo site_url('datauser');?>" style="text-decoration: none;color: white;" class="li-menu"><i class="fa fa-user"></i> <?php echo $dataadmin['username'] ?></a><span class="span-title"><img src="<?php echo base_url('assets/img/icon-nav.png');?>" alt="icon-nav" class="img-fluid" width="20"></span>
					</div>
					<ul class="ulli">
						<a href="<?php echo site_url('input');?>" style="text-decoration: none;" data-toggle="tooltip" data-placement="right" title="Basis Data"><li class="li-menu"><i class="fa fa-database"></i> Basis Data<span class="span-li"><img src="<?php echo base_url('assets/img/icon-db.png');?>" alt="icon-db" class="img-fluid" width="25"></span></li></a>
						<?php if ($dataadmin['username'] == 'Kang Randi' || $dataadmin['username'] == '@anemadhon' || $dataadmin['username'] == 'Faisal G'){ ?>
						<a href="<?php echo site_url('gaji');?>" style="text-decoration: none;" data-toggle="tooltip" data-placement="right" title="Slip"><li class="li-menu"><i class="fa fa-money"></i> Slip<span class="span-li"><img src="<?php echo base_url('assets/img/icon-gaji.png');?>" alt="icon-gaji" class="img-fluid" width="25"></span></li></a>	
						<?php } ?>
						<a href="<?php echo site_url('akta');?>" style="text-decoration: none;" data-toggle="tooltip" data-placement="right" title="Legalitas"><li class="li-menu"><i class="fa fa-files-o"></i> Legalitas<span class="span-li"><img src="<?php echo base_url('assets/img/icon-set.png');?>" alt="icon-db" class="img-fluid" width="25"></span></li></a>
						<a href="<?php echo site_url('tp');?>" style="text-decoration: none;" data-toggle="tooltip" data-placement="right" title="Training Program"><li class="li-menu"><i class="fa fa-files-o"></i> Traine Program<span class="span-li"><img src="<?php echo base_url('assets/img/icon-set.png');?>" alt="icon-db" class="img-fluid" width="25"></span></li></a>
						<a href="<?php echo site_url('logout');?>" data-toggle="tooltip" data-placement="right" title="Keluar"><li class="li-menu"><i class="fa fa-sign-out"></i> Keluar<span class="span-li"><img src="<?php echo base_url('assets/img/icon-out.png');?>" alt="icon-out" class="img-fluid" width="25"></span></li></a>
					</ul>
				</div>
				<div class="col-sm-8" id="content-bar">
					<div id="title-content">
						<div class="menu-title-a-on text-center"><a href="<?php echo site_url('tp');?>" id="menu-a">Daftar Peserta</a></div>
					</div>
					<div id="content-side" class="mt-5">
						<div class="row mt-4 male-text" id="form-title-a">Form Training Program Karyawan</div>
						<div class="row mb-4 male-text" id="form-title-b">PT Ghita Avia Trans</div>
						<?php
						echo form_open_multipart('updatedatatp','autocomplete="off"');
						date_default_timezone_set('Asia/Jakarta');
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
					  	<div class="form-group row male-form">
						    <label for="inputNIK" class="col-sm-2 col-form-label form-control-sm">Nomor Induk Kependudukan</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control form-control-sm text-box-input" id="inputNIK" name="niktp" value="<?php echo $dataadmin['tepe_up']['ktp'] ?>" readonly>
						    </div>
						    <div class="col-sm-2">
						    	<label for="upFoto" class="form-control form-control-sm text-center btn-save">
				    				<span><i class="fa fa-paperclip"></i> Unggah Lampiran</span>
					    		</label>
						    </div>
					  	</div>
					  	<div class="form-group row male-form">
						    <label for="inputNama" class="col-sm-2 col-form-label form-control-sm">Nama Lengkap</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control form-control-sm text-box-input" id="inputNama" name="namapeserta" value="<?php echo $dataadmin['tepe_up']['nama'] ?>" readonly>
						    </div>
						    <div class="col-sm-2">
						    	<label for="upFoto" class="form-control form-control-sm text-left text-box-input">
				    				<img src="<?php echo base_url('assets/img/icon-add.png');?>" class="up-plus" alt="icon-add" style="width: 12px"><span class="nama-file"> Pilih Foto</span>
					    		</label>
					    		<input type="file" id="upFoto" name="skp[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
						    </div>
					  	</div>
					  	<div class="form-group row male-form">
					  		<label for="inputJab" class="col-sm-2 col-form-label form-control-sm">Jabatan</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control form-control-sm text-box-input" id="inputJab" name="jbtn" value="<?php echo $dataadmin['tepe_up']['jbtn'] ?>" readonly>
						    </div>
						    <div class="col-sm-2">
						    	<label for="upKtp" class="form-control form-control-sm text-left text-box-input">
				    				<img src="<?php echo base_url('assets/img/icon-add.png');?>" class="up-plus" alt="icon-add" style="width: 12px"><span class="nama-file"> Pilih KTP</span>
					    		</label>
					    		<input type="file" id="upKtp" name="skp[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
						    </div>
					  	</div>
					  	<div class="form-group row male-form">
						    <label for="inputTlp" class="col-sm-2 col-form-label form-control-sm">Nomor Telepon Aktif</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control form-control-sm text-box-input" id="inputTlp" name="notlp" value="<?php echo $dataadmin['tepe_up']['tlp'] ?>" readonly>
						    </div>
						    <div class="col-sm-2">
						    	<label for="upNpwp" class="form-control form-control-sm text-left text-box-input">
				    				<img src="<?php echo base_url('assets/img/icon-add.png');?>" class="up-plus" alt="icon-add" style="width: 12px"><span class="nama-file"> Pilih NPWP</span>
					    		</label>
					    		<input type="file" id="upNpwp" name="skp[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
						    </div>
					  	</div>
					  	<div class="form-group row male-form">
					  		<label for="inputSKP" class="col-sm-2 col-form-label form-control-sm">SKP</label>
						    <div class="col-sm-4">
						    	<input type="text" class="form-control form-control-sm text-box-input"	name="tipeskp" placeholder="Tipe SKP" value="<?php echo $dataadmin['tepe_up']['tipeskp'] ?>">
						    </div>
						    <div class="col-sm-3">
						    	<input type="text" class="form-control form-control-sm text-box-input" name="noskp" placeholder="No. SKP" value="<?php echo $dataadmin['tepe_up']['noskp'] ?>">
						    </div>
						    <div class="col-sm-2">
						    	<label for="upKk" class="form-control form-control-sm text-left text-box-input">
				    				<img src="<?php echo base_url('assets/img/icon-add.png');?>" class="up-plus" alt="icon-add" style="width: 12px"><span class="nama-file"> Pilih KK</span>
					    		</label>
					    		<input type="file" id="upKk" name="skp[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
						    </div>
					  	</div>
					  	<div class="form-group row male-form">
						    <label for="inputValid" class="col-sm-2 col-form-label form-control-sm">Valid Data</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control form-control-sm text-box-input" name="tlpkel" id="inputValid" placeholder="Tanggal Valid : DD-MM-YYYY" value="<?php echo $dataadmin['tepe_up']['valid'] ?>">
						    </div>
						    <div class="col-sm-2">
						    	<label for="upSkck" class="form-control form-control-sm text-left text-box-input">
				    				<img src="<?php echo base_url('assets/img/icon-add.png');?>" class="up-plus" alt="icon-add" style="width: 12px"><span class="nama-file"> Pilih SKCK</span>
					    		</label>
					    		<input type="file" id="upSkck" name="skp[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
						    </div>
					  	</div>
					  	<div class="form-group row male-form">
						    <label for="inputLembaga" class="col-sm-2 col-form-label form-control-sm">Lembaga Training</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control form-control-sm text-box-input" name="tlpkel" id="inputLembaga" placeholder="Tempat Pelaksanaan Training" value="<?php echo $dataadmin['tepe_up']['tmpt'] ?>">
						    </div>
						    <div class="col-sm-2">
						    	<label for="upIjz" class="form-control form-control-sm text-left text-box-input">
				    				<img src="<?php echo base_url('assets/img/icon-add.png');?>" class="up-plus" alt="icon-add" style="width: 12px"><span class="nama-file"> Pilih Ijazah Terakhir</span>
					    		</label>
					    		<input type="file" id="upIjz" name="skp[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
						    </div>
					  	</div>
					  	<div class="form-group row male-form">
						    <label for="inputTgl" class="col-sm-2 col-form-label form-control-sm">Tanggal Pelaksanaan</label>
						    <div class="col-sm-7">
						    	<input type="text" class="form-control form-control-sm text-box-input" name="tlpkel" id="inputTgl" placeholder="Tanggal Pelaksanaan : DD-MM-YYYY" value="<?php echo $dataadmin['tepe_up']['tgltp'] ?>">
						    </div>
						    <div class="col-sm-2">
						    	<label for="upLc" class="form-control form-control-sm text-left text-box-input">
				    				<img src="<?php echo base_url('assets/img/icon-add.png');?>" class="up-plus" alt="icon-add" style="width: 12px"><span class="nama-file"> Pilih Lisensi</span>
					    		</label>
					    		<input type="file" id="upLc" name="skp[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
						    </div>
					  	</div>
					  	<div class="form-group row male-form">
						    <label for="inputJenis" class="col-sm-2 col-form-label form-control-sm">Jenis Training</label>
						    <div class="col-sm-7">
						    	<select name="nikah" id="inputJenis" class="form-control form-control-sm text-box-input">
						    		<option value="" class="text-box-input">Pilih</option>
						    		<option value="initial" class="text-box-input" <?php if($dataadmin['tepe_up']['jenistp'] == 'INITIAL'){ echo 'selected'; } ?>>Initial</option>
						    		<option value="recurrent" class="text-box-input" <?php if($dataadmin['tepe_up']['jenistp'] == 'RECURRENT'){ echo 'selected'; } ?>>Recurent</option>
						    	</select>
						    </div>
						    <div class="col-sm-2">
						    	<label for="upSft" class="form-control form-control-sm text-left text-box-input">
				    				<img src="<?php echo base_url('assets/img/icon-add.png');?>" class="up-plus" alt="icon-add" style="width: 12px"><span class="nama-file"> Pilih Sertifikat</span>
					    		</label>
					    		<input type="file" id="upSft" name="skp[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
						    </div>
					  	</div>
					  	<div hidden>
					  		<img src="<?php echo base_url('assets/img/icon-ok.png');?>" alt="icon-check" id="up-check" hidden>
					  		<img src="<?php echo base_url('assets/img/icon-add.png');?>" alt="icon-add" id="up-add" hidden>
							<input type="hidden" class="form-control form-control-sm text-box" name="user" id="user" value="<?php echo $dataadmin['username'] ?>" required hidden>
							<input type="hidden" class="form-control form-control-sm text-box" name="ip" id="ip" value="<?php echo get_client_ip() ?>" required hidden>
							<input type="hidden" class="form-control form-control-sm text-box" name="tgljam" id="tgljam" value="<?php echo date('Y-m-d H:i:s') ?>" required hidden>
						</div>
						<div class="form-group row male-form mb-5">
					  		<div class="col-sm-2"></div>
						    <div class="col-sm-7 text-right">
						    	<!-- <button type="submit" class="btn btn-save"><i class="fa fa-save"></i> Simpan</button> -->
						    </div>
					  	</div>
						<?php
						echo form_close();
						?>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/action.js');?>"></script>
	</body>