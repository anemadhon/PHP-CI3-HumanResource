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
						<li class="menu-title-a"><a href="<?php echo site_url('gaji');?>" id="menu-a">Slip Gaji</a></li>
						<li class="menu-title-b-on"><a href="<?php echo site_url('lembur');?>" id="menu-a">Slip Lembur</a></li>
					</ul>
					<div id="content-side">
						<p id="form-title-a">Import File - Slip Lembur</p>
						<p id="form-title-b">PT Ghita Avia Trans</p>
						<?php 
						if ($dataadmin['uploaded']->num_rows() == 0 && $this->input->get('kw')==''){ 
							echo form_open_multipart('import-lembur','autocomplete="off"'); 
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
						<div class="row ml-lg">
			    			<div class="space-file">
				    			<label for="import" class="col s12 m10 text-file text-box-input">
						        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih File</p>
					    		</label>
					    		<input type="file" name="import" id="import" class="up-file" hidden required>
					    		<input type="hidden" name="pcinput" value="<?php echo get_client_ip() ?>">
			    			</div>
						</div>
						<div class="col s12 m10">
							<div class="row right-align to-left mb-a">
								<button class="btn save" type="submit"><i class="material-icons left">file_upload</i>Unggah</button>
							</div>
						</div>
						<?php echo form_close(); ?>
						<?php } else { ?>
						<div class="row space-btn space mb-a">
					    	<div class="col s12 m6">
					    		<?php echo form_open('slip-lembur/pdf','target="_blank"') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Pdf</button>
									<input type="hidden" id="idlembur" name="idlembur">
								<?php echo form_close() ?>
								<?php echo form_open('hapus-lembur') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">delete</i>Hapus Data</button>
								<?php echo form_close() ?>
					    	</div>
					    	<div class="col s12 m6 pad">
					    		<?php 
								$attr = array('method'=>'get','autocomplete'=>'off','class'=>'form-inline');
								echo form_open('carilembur',$attr); 
								?>
								<div class="pade">
									<?php if ($this->input->get('kw')){ ?>
							    	<input type="text" class="col s12 m9 browser-default text-box-search mb-s" value="<?php echo $this->input->get('kw') ?>" id="kw" name="kw">
							    	<?php } else { ?>
									<input type="text" class="col s12 m9 browser-default text-box-search mb-s" placeholder="Cari Data..." id="kw" name="kw">
							    	<?php } ?>
								</div>
								<button type="submit" class="btn search col s12 m3 mb-s"><i class="material-icons left">search</i>Cari</button>
								<?php echo form_close(); ?>
					    	</div>
					    </div>
					    <?php 
					    if ($dataadmin['uploaded']->num_rows() > 0){ 
					    	if ($this->input->get('kw')){ 
						  		$angka = '-'.$dataadmin['uploaded']->num_rows().'-';
						  		$kw = '-'.$this->input->get('kw').'-';
					    ?>
					    <p id="search-result">Hasil Pencarian : Ditemukan <?php echo $angka; ?> Data untuk Kata Kunci <?php echo $kw; ?></p>
					    <?php } ?>
					    <?php //echo $this->pagination->create_links(); ?>
					    <table class="responsive-table table-style mb-a">
					        <thead>
							    <tr>
							    	<th scope="col">
										<label>
											<input type="checkbox" id="cb-all" class="filled-in">
											<span></span>
										</label>
									</th>
							    	<th scope="col" class="center">No.</th>
							    	<th scope="col" class="center">Nama</th>
							    	<th scope="col" class="center">Jabatan</th>
							    	<th scope="col" class="center">Aksi</th>
							    </tr>
						  	</thead>
							<tbody>
								<?php
								$no = $this->uri->segment('3') + 1;
								foreach ($dataadmin['uploaded']->result() as $data){ 
								?>
							    <tr>
							    	<td>
							    		<p>
											<label>
												<input type="checkbox" class="filled-in cb" name="cb[]" value="<?php echo $data->idlembur; ?>">
												<span></span>
											</label>
										</p>
							    	</td>
							    	<td scope="row" class="center"><?php echo $no; ?></td>
							    	<td scope="row"><?php echo $data->nama; ?></td>
							    	<td scope="row"><?php echo $data->jabatan; ?></td>
							    	<td class="center">
							    		<a href="<?php echo site_url('cetak-slip-lembur/'.$data->idlembur) ?>" target="_blank"><button type="submit" class="btn-small btn save"><i class="material-icons left">print</i>Cetak</button></a>
										<input type="hidden" name="idgaji" value="<?php echo $data->idlembur; ?>">
							    	</td>
							    </tr>
							    <?php 
							    	$no++;
								} 
								?>
							</tbody>
						</table>
					    <?php } else { ?>
						<p class="empty-data center">Tidak Ditemukan Data</p>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>