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
						<li class="menu-title-a"><a href="<?php echo site_url('akta');?>" id="menu-a">Akta</a></li>
						<li class="menu-title-b"><a href="<?php echo site_url('pks');?>" id="menu-b">Perjanjian</a></li>
						<li class="menu-title-c-on"><a href="<?php echo site_url('izin');?>" id="menu-c">Perizinan</a></li>
					</ul>
					<div id="content-side">
						<p id="form-title-a">Legalitas - Perizinan</p>
						<p id="form-title-b">PT Ghita Avia Trans</p>
						<?php
						echo form_open_multipart('legal-izin-up','autocomplete="off"');
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
						$up = $dataadmin['izin_up']->row_array();
						$upto = $dataadmin['upto']->row_array();
						?>
						<div class="row space ml-lg">
							<div class="col s12 m8 l9">
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" id="noIP" name="noizinpks" placeholder="No. Surat Perizinan" value="<?php echo $up['noip'] ?>" autofocus>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" id="instansi" name="instansi" placeholder="Instansi" value="<?php echo $up['instansi'] ?>" readonly>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" id="tglAwal" name="tglawal" placeholder="Tanggal Pembuatan : DD-MM-YYYY" value="<?php echo date_format(date_create($up['tglawal']), "d-m-Y") ?>">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" id="tglAkhir" name="tglakhir" placeholder="Tanggal Berakhir : DD-MM-YYYY" value="<?php echo date_format(date_create($up['tglakhir']), "d-m-Y") ?>">
							        </div>
								</div>
								<div class="row">
					    			<div class="space-file">
					    				<?php 
									    $file1 = explode('/',$up['file']);
										$file = $file1[6];

										if ($file==''){ 
										?>
						    			<label for="attach" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih File Perizinan</p>
							    		</label>
							    		<?php } else { ?>
										<label for="attach" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add"><?php echo $file ?></p>
							    		</label>
							    		<?php } ?>
							    		<input type="file" id="attach" name="attach" class="up-file" accept=".jpg,.jpeg,.png,.doc,.docx,.pdf" hidden>
						    			<input type="hidden" name="attach_file" class="dlt" value="<?php echo $file ?>" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
							</div>
						</div>
						<div hidden>
							<input type="hidden" name="upto" value="<?php echo ($upto['upto']+1) ?>">
							<input type="hidden" name="idizinpks" value="<?php echo $up['id'] ?>">
							<input type="hidden" name="ippc" value="<?php echo $up['ip'] ?>">
							<input type="hidden" name="tglawalup" value="<?php echo $up['tglawal'] ?>">
							<input type="hidden" name="tglakhirup" value="<?php echo $up['tglakhir'] ?>">
							<input type="hidden" name="noup" value="<?php echo $up['noip'] ?>">
							<input type="hidden" name="attachup" value="<?php echo $up['file'] ?>">
							<input type="hidden" name="userupdate" value="<?php echo $dataadmin['username'] ?>">
							<input type="hidden" name="tgljamupdate" value="<?php echo date('Y-m-d H:i:s') ?>">
							<input type="hidden" name="ippcup" value="<?php echo get_client_ip() ?>">
						</div>
						<div class="col s12 m8 l9">
							<div class="row right-align to-left mb-a">
								<button class="btn save" type="submit"><i class="material-icons left">save</i>Simpan</button>
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
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>