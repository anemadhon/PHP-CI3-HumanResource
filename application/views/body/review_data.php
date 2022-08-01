<!-- data akta -->
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
						<li class="menu-title-a-on"><a href="<?php echo site_url('akta');?>" id="menu-a">Akta</a></li>
						<li class="menu-title-b"><a href="<?php echo site_url('pks');?>" id="menu-b">Perjanjian</a></li>
						<li class="menu-title-c"><a href="<?php echo site_url('izin');?>" id="menu-c">Perizinan</a></li>
					</ul>
					<div id="content-side" class="mt-5">
						<p id="form-title-a">Legalitas - Akta</p>
						<p id="form-title-b">PT Ghita Avia Trans</p>
						<div class="row space-btn space mb-b">
					    	<div class="col s12 m6">
					    		<?php echo form_open('pdf-akta','target="_blank"') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Pdf</button>
									<input type="hidden" id="pdf" name="pdf">
								<?php echo form_close() ?>
							    <?php echo form_open('excel-akta') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Excel</button>
									<input type="hidden" id="excel" name="excel">
								<?php echo form_close() ?>
							    <a href="<?php echo site_url('data-akta/display');?>" class="btn save col s12 m3 mb-s"><i class="material-icons left">refresh</i>Refresh</a>
					    	</div>
					    	<div class="col s12 m6 pad">
					    		<?php 
								$attr = array('method'=>'get','autocomplete'=>'off','class'=>'form-inline');
								echo form_open('caridata-akta',$attr); 
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
					  	if ($this->input->get('kw')){ 
					  		$angka = '-'.$dataadmin['akta']->num_rows().'-';
					  		$kw = '-'.$this->input->get('kw').'-';
					  	?>
					  	<p id="search-result">Hasil Pencarian : Ditemukan <?php echo $angka; ?> Data untuk Kata Kunci <?php echo $kw; ?></p>
					  	<?php 
					  	}
						?>
						<?php if ($dataadmin['akta']->num_rows() > 0){ ?>
						<table class="responsive-table table-style mb-a">
					        <thead>
							    <tr>
							    	<th scope="col" class="center">No.</th>
							    	<th scope="col" class="center">No. Legal</th>
							    	<th scope="col" class="center">Perihal</th>
							    	<th scope="col" class="center">Notaris</th>
							    	<th scope="col" class="center">Tgl Buat</th>
							    	<th scope="col" class="center">Aksi</th>
							    </tr>
						  	</thead>
							<tbody>
								<?php
								$no = $this->uri->segment('3') + 1;
								foreach ($dataadmin['akta']->result() as $akta){ 
								?>
							    <tr>
							    	<td scope="row" class="center"><?php echo $no; ?></td>
							    	<td scope="row" class="center"><?php echo $akta->nolegal; ?></td>
							    	<td scope="row"><?php echo $akta->perihal; ?></td>
							    	<td scope="row"><?php echo $akta->notaris; ?></td>
							    	<td scope="row" class="center"><?php echo date_format(date_create($akta->tglbuat), "d-m-Y"); ?></td>
							    	<td class="center"><button type="submit" class="btn-small btn save detail"><i class="material-icons left">visibility</i>Lihat</button></td>
							    </tr>
							    <tr class="detailview" style="display: none;">
									<td colspan="6">
							    		<div class="row">
							    			<div class="col s3 m2">Tempat Buat</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $akta->tmptbuat; ?></span></div>
							    		</div>
							    		<?php
							    		$file = explode('/',$akta->attach);
							    		$file = $file[6];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Softfile</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $file ?></span></div>
							    			<input type="hidden" class="resource" value="<?php echo site_url($akta->attach);?>">
							    		</div>
							    	</td>
							    </tr>
							    <?php 
							    	$no++;
								} 
								?>
							</tbody>
						</table>
						<div class="right">
					    	<?php echo $this->pagination->create_links(); ?>
					    </div>
					    <?php } else { ?>
						<p class="empty-data center">Tidak Ditemukan Data</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Alert Here -->
		<div id="modal" class="modal">
			<div class="modal-content"></div>
			<a href="#!" class="btn save right modal-close mb-a to-left"><i class="material-icons modal-close right">close</i>Tutup</a>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>

<!-- data izin -->
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
					<div id="content-side" class="mt-5">
						<?php 
						$remind = array();
						if ($dataadmin['reminder_izin']->num_rows()>0){ 
							foreach ($dataadmin['reminder_izin']->result() as $re) {
								$on = $re->tglakhir;
					    		$tglon = new DateTime($on);
					    		$today = new DateTime();
					    		$lb = $today->diff($tglon);
					    		if ($lb->y==0 && $lb->m==0) {
					    			$count = $lb->d.' Hari';
					    		} elseif ($lb->y==0 && $lb->d==0) {
					    			$count = $lb->m.' Bulan ';
					    		} elseif ($lb->m==0 && $lb->d==0) {
					    			$count = $lb->y.' Tahun ';
					    		} elseif ($lb->y==0) {
					    			$count = $lb->m.' Bulan '.$lb->d.' Hari';
					    		} elseif ($lb->m==0) {
					    			$count = $lb->y.' Tahun '.$lb->d.' Hari';
					    		} elseif ($lb->d==0) {
					    			$count = $lb->y.' Tahun '.$lb->m.' Bulan ';
					    		} else {
					    			$count = $lb->y.' Tahun '.$lb->m.' Bulan '.$lb->d.' Hari';
					    		}
					    		$hariminus = (int)$lb->format('%r%d');
					    		$bulanminus = (int)$lb->format('%r%m');
					    		if ($count=='2 Bulan' || $count=='1 Bulan' || ($lb->y==0 && $lb->m < 2) && ($hariminus > 0 || $bulanminus > 0)) {
					    			$remind[] = $on;
					    		}
							}
						?>
						<div class="row">
					    	<div class="col s12 m6">
					    		<p id="form-title-a">Legalitas - Perizinan</p>
								<p id="form-title-b">PT Ghita Avia Trans</p>
					    	</div>
						<?php
							if (count($remind)>0) {
						?>
					    	<div class="col s12 m6">
					    		<div class="collection space-notif">
									<a href="<?php echo site_url('reminder-izin');?>" class="collection-item"><span class="new badge"><?php echo count($remind) ?></span>Reminder Perizinan</a>
								</div>
					    	</div>
						<?php 
							}
						} 
						?>
						</div>
						<div class="row space-btn space mb-b">
					    	<div class="col s12 m6">
					    		<?php echo form_open('pdf-izin','target="_blank"') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Pdf</button>
									<input type="hidden" id="pdf" name="pdf">
								<?php echo form_close() ?>
							    <?php echo form_open('excel-izin') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Excel</button>
									<input type="hidden" id="excel" name="excel">
								<?php echo form_close() ?>
							    <a href="<?php echo site_url('data-izin/display');?>" class="btn save col s12 m3 mb-s"><i class="material-icons left">refresh</i>Refresh</a>
					    	</div>
					    	<div class="col s12 m6 pad">
					    		<?php 
								$attr = array('method'=>'get','autocomplete'=>'off','class'=>'form-inline');
								echo form_open('caridata-izin',$attr); 
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
					  	if ($this->input->get('kw')){ 
					  		$angka = '-'.$dataadmin['data-izin']->num_rows().'-';
					  		$kw = '-'.$this->input->get('kw').'-';
					  	?>
					  	<p id="search-result">Hasil Pencarian : Ditemukan <?php echo $angka; ?> Data untuk Kata Kunci <?php echo $kw; ?></p>
					  	<?php 
					  	}
						?>
						<?php if ($dataadmin['data-izin']->num_rows() > 0){ ?>
						<table class="responsive-table table-style mb-a">
					        <thead>
							    <tr>
							    	<th scope="col" class="center">No.</th>
							    	<th scope="col" class="center">Perihal</th>
							    	<th scope="col" class="center">Tgl Berakhir</th>
							    	<th scope="col" colspan="2" class="center">Aksi</th>
							    </tr>
						  	</thead>
							<tbody>
								<?php
								$no = $this->uri->segment('3') + 1;
								foreach ($dataadmin['data-izin']->result() as $ip){ 
									$on = $ip->tglakhir;
						    		$tglon = new DateTime($on);
						    		$today = new DateTime();
						    		$lb = $today->diff($tglon);
						    		if ($lb->y==0 && $lb->m==0) {
						    			$count = $lb->d.' Hari';
						    		} elseif ($lb->y==0 && $lb->d==0) {
						    			$count = $lb->m.' Bulan ';
						    		} elseif ($lb->m==0 && $lb->d==0) {
						    			$count = $lb->y.' Tahun ';
						    		} elseif ($lb->y==0) {
						    			$count = $lb->m.' Bulan '.$lb->d.' Hari';
						    		} elseif ($lb->m==0) {
						    			$count = $lb->y.' Tahun '.$lb->d.' Hari';
						    		} elseif ($lb->d==0) {
						    			$count = $lb->y.' Tahun '.$lb->m.' Bulan ';
						    		} else {
						    			$count = $lb->y.' Tahun '.$lb->m.' Bulan '.$lb->d.' Hari';
						    		}
						    		$hariminus = (int)$lb->format('%r%d');
					    			$bulanminus = (int)$lb->format('%r%m');
						    		if ($ip->tglakhir<=date("Y-m-d")) {
						    			$end = '';
						    		} else {
						    			$end = date_format(date_create($ip->tglakhir), "d-m-Y");
						    		}
								?>
							    <tr>
							    	<?php if ($lb->y == 0 && $lb->m < 2 && ($hariminus > 0 || $bulanminus > 0)) { ?>
							    	<td scope="row" class="center" style="color: red; font-weight: bold;"><?php echo $no; ?></td>
							    	<td scope="row" style="color: red; font-weight: bold;"><?php echo $ip->perihal; ?></td>
							    	<td scope="row" class="center" style="color: red; font-weight: bold;"><?php echo $end; ?></td>
							    	<?php } else { ?>
									<td scope="row" class="center"><?php echo $no; ?></td>
							    	<td scope="row"><?php echo $akta->perihal; ?></td>
							    	<td scope="row" class="center"><?php echo $end; ?></td>
							    	<?php } ?>
							    	<td class="center"><button type="submit" class="btn-small btn save detail"><i class="material-icons left">visibility</i>Lihat</button></td>
							    	<td class="center">
							    		<a href="<?php echo site_url('izin-up/').$ip->id.'/'.$ip->ip ?>"><button type="submit" class="btn-small btn save detail"><i class="material-icons left">edit</i>Ubah</button></a>
							    	</td>
							    </tr>
							    <tr class="detailview" style="display: none;">
									<td colspan="5">
										<div class="row">
							    			<div class="col s3 m2">No. Peizinan</div>
							    			<?php 
							    			if ($ip->nopks==''){ 
							    				$nopks = '-';
							    			} else {
							    				$nopks = $ip->nopks;
							    			}
							    			?>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $nopks; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Instansi</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $ip->instansi; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Tgl Buat</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo date_format(date_create($ip->tglbuat), "d-m-Y"); ?></span></div>
							    		</div>
							    		<?php
							    		$file = explode('/',$ip->file);
								    	$file = $file[6];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Softfile</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $file ?></span></div>
							    			<input type="hidden" class="resource" value="<?php echo site_url($ip->file);?>">
							    		</div>
							    	</td>
							    </tr>
							    <?php 
							    	$no++;
								} 
								?>
							</tbody>
						</table>
						<div class="right">
					    	<?php echo $this->pagination->create_links(); ?>
					    </div>
					    <?php } else { ?>
						<p class="empty-data center">Tidak Ditemukan Data</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Alert Here -->
		<div id="modal" class="modal">
			<div class="modal-content"></div>
			<a href="#!" class="btn save right modal-close mb-a to-left"><i class="material-icons modal-close right">close</i>Tutup</a>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>

<!-- data pks -->
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
						<li class="menu-title-b-on"><a href="<?php echo site_url('pks');?>" id="menu-b">Perjanjian</a></li>
						<li class="menu-title-c"><a href="<?php echo site_url('izin');?>" id="menu-c">Perizinan</a></li>
					</ul>
					<div id="content-side" class="mt-5">
						<?php 
						$remind = array();
						if ($dataadmin['reminder']->num_rows()>0){ 
							foreach ($dataadmin['reminder']->result() as $re) {
								$on = $re->tglakhir;
					    		$tglon = new DateTime($on);
					    		$today = new DateTime();
					    		$lb = $today->diff($tglon);
					    		if ($lb->y==0 && $lb->m==0) {
					    			$count = $lb->d.' Hari';
					    		} elseif ($lb->y==0 && $lb->d==0) {
					    			$count = $lb->m.' Bulan ';
					    		} elseif ($lb->m==0 && $lb->d==0) {
					    			$count = $lb->y.' Tahun ';
					    		} elseif ($lb->y==0) {
					    			$count = $lb->m.' Bulan '.$lb->d.' Hari';
					    		} elseif ($lb->m==0) {
					    			$count = $lb->y.' Tahun '.$lb->d.' Hari';
					    		} elseif ($lb->d==0) {
					    			$count = $lb->y.' Tahun '.$lb->m.' Bulan ';
					    		} else {
					    			$count = $lb->y.' Tahun '.$lb->m.' Bulan '.$lb->d.' Hari';
					    		}
					    		$hariminus = (int)$lb->format('%r%d');
					    		$bulanminus = (int)$lb->format('%r%m');
					    		if ($count=='2 Bulan' || $count=='1 Bulan' || ($lb->y==0 && $lb->m < 2) && ($hariminus > 0 || $bulanminus > 0)) {
					    			$remind[] = $on;
					    		}
							}
						?>
						<div class="row">
					    	<div class="col s12 m6">
					    		<p id="form-title-a">Legalitas - Perjanjian Kerja Sama</p>
								<p id="form-title-b">PT Ghita Avia Trans</p>
					    	</div>
						<?php
							if (count($remind)>0) {
						?>
					    	<div class="col s12 m6">
					    		<div class="collection space-notif">
									<a href="<?php echo site_url('reminder');?>" class="collection-item"><span class="new badge"><?php echo count($remind) ?></span>Reminder PKS</a>
								</div>
					    	</div>
						<?php 
							}
						} 
						?>
						</div>
						<div class="row space-btn space mb-b">
					    	<div class="col s12 m6">
					    		<?php echo form_open('pdf-pks','target="_blank"') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Pdf</button>
									<input type="hidden" id="pdf" name="pdf">
								<?php echo form_close() ?>
							    <?php echo form_open('excel-pks') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Excel</button>
									<input type="hidden" id="excel" name="excel">
								<?php echo form_close() ?>
							    <a href="<?php echo site_url('data-pks/display');?>" class="btn save col s12 m3 mb-s"><i class="material-icons left">refresh</i>Refresh</a>
					    	</div>
					    	<div class="col s12 m6 pad">
					    		<?php 
								$attr = array('method'=>'get','autocomplete'=>'off','class'=>'form-inline');
								echo form_open('caridata-pks',$attr); 
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
					  	if ($this->input->get('kw')){ 
					  		$angka = '-'.$dataadmin['data-ip']->num_rows().'-';
					  		$kw = '-'.$this->input->get('kw').'-';
					  	?>
					  	<p id="search-result">Hasil Pencarian : Ditemukan <?php echo $angka; ?> Data untuk Kata Kunci <?php echo $kw; ?></p>
					  	<?php 
					  	}
						?>
						<?php if ($dataadmin['data-ip']->num_rows() > 0){ ?>
						<table class="responsive-table table-style mb-a">
					        <thead>
							    <tr>
							    	<th scope="col" class="center">No.</th>
							    	<th scope="col" class="center">Instansi</th>
							    	<th scope="col" class="center">Jenis PKS</th>
							    	<th scope="col" class="center">Perihal</th>
							    	<th scope="col" class="center">Tgl Berakhir</th>
							    	<th scope="col" colspan="2" class="center">Aksi</th>
							    </tr>
						  	</thead>
							<tbody>
								<?php
								$no = $this->uri->segment('3') + 1;
								foreach ($dataadmin['data-ip']->result() as $ip){ 
									$on = $ip->tglakhir;
						    		$tglon = new DateTime($on);
						    		$today = new DateTime();
						    		$lb = $today->diff($tglon);
						    		if ($lb->y==0 && $lb->m==0) {
						    			$count = $lb->d.' Hari';
						    		} elseif ($lb->y==0 && $lb->d==0) {
						    			$count = $lb->m.' Bulan ';
						    		} elseif ($lb->m==0 && $lb->d==0) {
						    			$count = $lb->y.' Tahun ';
						    		} elseif ($lb->y==0) {
						    			$count = $lb->m.' Bulan '.$lb->d.' Hari';
						    		} elseif ($lb->m==0) {
						    			$count = $lb->y.' Tahun '.$lb->d.' Hari';
						    		} elseif ($lb->d==0) {
						    			$count = $lb->y.' Tahun '.$lb->m.' Bulan ';
						    		} else {
						    			$count = $lb->y.' Tahun '.$lb->m.' Bulan '.$lb->d.' Hari';
						    		}
						    		$hariminus = (int)$lb->format('%r%d');
				    				$bulanminus = (int)$lb->format('%r%m');
				    				if ($ip->tglbuat==$ip->tglakhir) {
				    					$end = '';
				    				} else {
				    					$end = date_format(date_create($ip->tglakhir), "d-m-Y");
				    				}
								?>
							    <tr>
							    	<?php if ($lb->y == 0 && $lb->m < 2 && ($hariminus > 0 || $bulanminus > 0)) { ?>
							    	<td scope="row" class="center" style="color: red; font-weight: bold;"><?php echo $no; ?></td>
							    	<td scope="row" style="color: red; font-weight: bold;"><?php echo $ip->instansi; ?></td>
							    	<td scope="row" style="color: red; font-weight: bold;"><?php echo $ip->ket; ?></td>
							    	<td scope="row" style="color: red; font-weight: bold;"><?php echo $ip->perihal; ?></td>
							    	<td scope="row" class="center" style="color: red; font-weight: bold;"><?php echo $end; ?></td>
							    	<?php } else { ?>
							    	<td scope="row" class="center"><?php echo $no; ?></td>
							    	<td scope="row"><?php echo $ip->instansi; ?></td>
							    	<td scope="row"><?php echo $ip->ket; ?></td>
							    	<td scope="row"><?php echo $ip->perihal; ?></td>
							    	<td scope="row" class="center"><?php echo $end; ?></td>
							    	<?php } ?>
							    	<td class="center"><button type="submit" class="btn-small btn save detail"><i class="material-icons left">visibility</i>Lihat</button></td>
							    	<td class="center">
							    		<a href="<?php echo site_url('pks-up/').$ip->id.'/'.$ip->ip ?>"><button type="submit" class="btn-small btn save detail"><i class="material-icons left">edit</i>Ubah</button></a>
							    	</td>
							    </tr>
							    <tr class="detailview" style="display: none;">
									<td colspan="7">
										<div class="row">
							    			<div class="col s3 m2">No. Peizinan</div>
							    			<?php 
							    			if ($ip->nopks==''){ 
							    				$nopks = '-';
							    			} else {
							    				$nopks = $ip->nopks;
							    			}
							    			?>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $nopks; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Tgl Buat</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo date_format(date_create($ip->tglbuat), "d-m-Y"); ?></span></div>
							    		</div>
							    		<?php
							    		$file = explode('/',$ip->file);
								    	$file = $file[6];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Softfile</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $file ?></span></div>
							    			<input type="hidden" class="resource" value="<?php echo site_url($ip->file);?>">
							    		</div>
							    	</td>
							    </tr>
							    <?php 
							    	$no++;
								} 
								?>
							</tbody>
						</table>
						<div class="right">
					    	<?php echo $this->pagination->create_links(); ?>
					    </div>
					    <?php } else { ?>
						<p class="empty-data center">Tidak Ditemukan Data</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Alert Here -->
		<div id="modal" class="modal">
			<div class="modal-content"></div>
			<a href="#!" class="btn save right modal-close mb-a to-left"><i class="material-icons modal-close right">close</i>Tutup</a>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>

<!-- data karyawan -->
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
						<li class="menu-title-a"><a href="<?php echo site_url('input');?>" id="menu-a">Input Data</a></li>
						<li class="menu-title-b-on"><a href="<?php echo site_url('display');?>" id="menu-b">Data Karyawan</a></li>
					</ul>
					<div id="content-side" class="mt-5">
						<?php  
						$dataultah = array();
						$nohbd = 1;
						foreach ($dataadmin['hbd']->result() as $hbd) {
							$tl_umur = explode('-', $hbd->tl);
							$tln_umur = explode('-', $hbd->tlnotif);
							$umur = date('Y')-$tl_umur[0];
							$hari = $tl_umur[2]-date('d');
		    				if ($hari>0 && $hari<8 || $hari==0) {
		    					$dataultah[] = $hari;
		    				}
		    			}
		    			?>
						<div class="row">
					    	<div class="col s12 m6">
					    		<p id="form-title-a">Tabel Data Karyawan</p>
								<p id="form-title-b">PT Ghita Avia Trans</p>
					    	</div>
						<?php
						if (count($dataultah)>0) { 
						?>
					    	<div class="col s12 m6">
					    		<div class="collection space-notif">
									<a href="<?php echo site_url('reminder');?>" class="collection-item"><span class="new badge"><?php echo count($remind) ?></span>Notifikasi Ulang Tahun Karyawan</a>
								</div>
					    	</div>
						<?php 
						}
						//} 
						?>
						</div>
						<div class="row space-btn space mb-b">
					    	<div class="col s12 m6">
					    		<?php echo form_open('pdf','target="_blank"') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Pdf</button>
									<input type="hidden" id="pdf" name="pdf">
								<?php echo form_close() ?>
							    <?php echo form_open('excel') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Excel</button>
									<input type="hidden" id="excel" name="excel">
								<?php echo form_close() ?>
							    <?php echo form_open('pdf-cv','target="_blank"') ?>
									<button type="submit" class="btn save col s12 m3"><i class="material-icons left">print</i>CV</button>
									<input type="hidden" id="cv" name="cv">
								<?php echo form_close() ?>
					    	</div>
					    	<div class="col s12 m6 pad">
					    		<?php 
								$attr = array('method'=>'get','autocomplete'=>'off','class'=>'form-inline');
								echo form_open('caridata',$attr); ?>
									<div class="pade">
										<?php if ($this->input->get('kw')){ ?>
								    	<input type="text" class="col s12 m5 browser-default text-box-search" value="<?php echo $this->input->get('kw') ?>" id="kw" name="kw">
								    	<?php } else { ?>
										<input type="text" class="col s12 m5 browser-default text-box-search" placeholder="Cari Data..." id="kw" name="kw">
								    	<?php } ?>
									</div>
								    <select name="urut" id="urut" class="col s12 m4 browser-default select-box-search">
										<option value="" class="text-box-input">Urutkan</option>
										<?php 
										if ($this->input->get('urut')=='namadiri'){ 
											$u = 'Nama';
										?>
										<option value="namadiri" class="text-box-input" selected>Nama</option>
										<?php } else { ?>
										<option value="namadiri" class="text-box-input">Nama</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='divisi'){ 
											$u = 'Divisi';
										?>
										<option value="divisi" class="text-box-input" selected>Divisi</option>
										<?php } else { ?>
										<option value="divisi" class="text-box-input">Divisi</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='jbtn'){ 
											$u = 'Jabatan';
										?>
										<option value="jbtn" class="text-box-input" selected>Jabatan</option>
										<?php } else { ?>
										<option value="jbtn" class="text-box-input">Jabatan</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='statuspt'){ 
											$u = 'Status';
										?>
										<option value="statuspt" class="text-box-input" selected>Status</option>
										<?php } else { ?>
										<option value="statuspt" class="text-box-input">Status</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='pendidikan'){ 
											$u = 'Pendidikan';
										?>
										<option value="pendidikan" class="text-box-input" selected>Pendidikan</option>
										<?php } else { ?>
										<option value="pendidikan" class="text-box-input">Pendidikan</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='tglon'){ 
											$u = 'Tahun Masuk';
										?>
										<option value="tglon" class="text-box-input" selected>Tahun Masuk</option>
										<?php } else { ?>
										<option value="tglon" class="text-box-input">Tahun Masuk</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='20'){ 
											$u = 'Usia < 20';
										?>
										<option value="20" class="text-box-input" selected>Usia < 20</option>
										<?php } else { ?>
										<option value="20" class="text-box-input">Usia < 20</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='2030'){ 
											$u = 'Usia Antara 20 - 30';
										?>
										<option value="2030" class="text-box-input" selected>Usia 20 - 30</option>
										<?php } else { ?>
										<option value="2030" class="text-box-input">Usia 20 - 30</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='3040'){ 
											$u = 'Usia Antara 30 - 40';
										?>
										<option value="3040" class="text-box-input" selected>Usia 30 - 40</option>
										<?php } else { ?>
										<option value="3040" class="text-box-input">Usia 30 - 40</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='4050'){ 
											$u = 'Usia Antara 40 - 50';
										?>
										<option value="4050" class="text-box-input" selected>Usia 40 - 50</option>
										<?php } else { ?>
										<option value="4050" class="text-box-input">Usia 40 - 50</option>
										<?php } ?>
										<?php 
										if ($this->input->get('urut')=='50'){ 
											$u = 'Usia > 50';
										?>
										<option value="50" class="text-box-input" selected>Usia > 50</option>
										<?php } else { ?>
										<option value="50" class="text-box-input">Usia > 50</option>
										<?php } ?>
									</select>
									<button type="submit" class="btn search col s12 m3"><i class="material-icons left">search</i>Cari</button>
								<?php echo form_close(); ?>
					    	</div>
					    </div>
					    <?php 
					  	if ($this->input->get('kw')){ 
					  		$angka = '-'.$dataadmin['display']->num_rows().'-';
					  		$kw = '-'.$this->input->get('kw').'-';
					  		if ($this->input->get('urut')) {
					  			$urut = ' Berdasarkan -'.$u.'-';
					  		} else {
					  			$urut = '';
					  		}
					  	?>
					  	<p id="search-result">Hasil Pencarian : Ditemukan <?php echo $angka; ?> Data untuk Kata Kunci <?php echo $kw; ?></p>
					  	<?php 
					  	}
						?>
						<?php if ($dataadmin['display']->num_rows() > 0){ ?>
						<table class="responsive-table table-style mb-a">
					        <thead>
							    <tr>
							    	<th scope="col">
										<p>
											<label>
												<input type="checkbox" id="cb-all" class="filled-in">
												<span>All</span>
											</label>
										</p>
									</th>
							    	<th scope="col" class="center">No.</th>
							    	<th scope="col" class="center">ID</th>
							    	<th scope="col" class="center">Nama</th>
							    	<th scope="col" class="center">Divisi</th>
							    	<th scope="col" class="center">Jabatan</th>
							    	<th scope="col" class="center">Status</th>
							    	<th scope="col" class="center">Tgl Aktif</th>
							    	<th scope="col" class="center" colspan="2">Aksi</th>
							    </tr>
						  	</thead>
							<tbody>
								<?php
								$no = $this->uri->segment('3') + 1;
								foreach ($dataadmin['display']->result() as $data){  
								?>
							    <tr>
							    	<td>
							    		<p>
											<label>
												<input type="checkbox" id="cb" class="filled-in" name="cb[]" value="<?php echo $data->ktp; ?>">
												<span></span>
											</label>
										</p>
							    	</td>
							    	<td scope="row" class="center"><?php echo $no; ?></td>
							    	<td scope="row" class="center"><?php echo $data->nik; ?></td>
							    	<td scope="row"><?php echo $data->nama; ?></td>
							    	<td scope="row"><?php echo $data->div; ?></td>
							    	<td scope="row"><?php echo $data->jbtn; ?></td>
							    	<td scope="row" class="center">
							    		<?php
							    		if ($data->status=='SK1') {
					    					$status = 'AKTIF';
					    				} elseif ($data->status=='SK2') {
					    					$status = 'TIDAK AKTIF';
					    				} elseif ($data->status=='SK3') {
					    					$status = 'TIDAK AKTIF';
					    				} elseif ($data->status=='SK4') {
					    					$status = 'SKOR';
					    				} elseif ($data->status=='SK5') {
					    				 	$status = 'CUTI';
					    				} elseif ($data->status=='SK6') {
					    				 	$status = 'TIDAK AKTIF';
					    				} else {
					    					$status = 'KOSONG';
					    				}
							    		echo $status;
							    		?>
							    	</td>
							    	<td scope="row" class="center">
							    		<?php 
							    		if ($data->on=='0000-00-00') {
							    			$on = date("Y-m-d");
							    		} else {
							    			$on = $data->on;
							    		}
							    		$tglon = new DateTime($on);
							    		$today = new DateTime();
							    		$lb = $today->diff($tglon);
							    		if ($lb->y==0 && $lb->m==0) {
							    			$lamakerja = $lb->d.' Hari';
							    		} elseif ($lb->y==0 && $lb->d==0) {
							    			$lamakerja = $lb->m.' Bulan ';
							    		} elseif ($lb->m==0 && $lb->d==0) {
							    			$lamakerja = $lb->y.' Tahun ';
							    		} elseif ($lb->y==0) {
							    			$lamakerja = $lb->m.' Bulan '.$lb->d.' Hari';
							    		} elseif ($lb->m==0) {
							    			$lamakerja = $lb->y.' Tahun '.$lb->d.' Hari';
							    		} elseif ($lb->d==0) {
							    			$lamakerja = $lb->y.' Tahun '.$lb->m.' Bulan ';
							    		} else {
							    			$lamakerja = $lb->y.' Tahun '.$lb->m.' Bulan '.$lb->d.' Hari';
							    		}
							    		echo date_format(date_create($on), "d-m-Y");
							    		?>
							    	</td>
							    	<td class="center"><button type="submit" class="btn-small btn save detail"><i class="material-icons left">visibility</i>Lihat</button></td>
							    	<td class="center">
							    		<a href="<?php echo site_url('update/'.$data->ktp) ?>"><button type="submit" class="btn-small btn save detail"><i class="material-icons left">edit</i>Ubah</button></a>
							    		<input type="hidden" name="ktp" value="<?php echo $data->ktp; ?>">
							    	</td>
							    </tr>
							    <tr class="detailview" style="display: none;">
									<td colspan="10">
										<div class="row">
							    			<div class="col s3 m2">NIK</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->ktp; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">NPWP</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->npwp; ?></span></div>
							    		</div>
										<div class="row">
							    			<div class="col s3 m2">TTL</div>
							    			<?php  
							    			if ($data->tl=='0000-00-00') {
								    			$tl = date("Y-m-d");
								    		} else {
								    			$tl = $data->tl;
								    		}
								    		if ($data->t=='') {
								    			$t = 'INDONESIA';
								    		} else {
								    			$t = $data->t;
								    		}
							    			?>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $t.', '.date_format(date_create($tl), "d-m-Y").' / ('.$data->umur.' Tahun)'; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Lama Kerja</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $lamakerja; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">No. Tlp Aktif</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->tlp; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">No. Tlp Keluarga</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->tlpkel; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Agama</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->agama; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Jenis Kelamin</div>
							    			<?php  
							    			if ($data->jk=='1') {
						    					$jk = 'LAKI-LAKI';
						    				} else {
						    					$jk = 'PEREMPUAN';
						    				}
							    			?>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $jk; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Alamat KTP</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->alamat; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Alamat Domisili</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->domisili; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Ibu Kandung</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->ibu; ?></span></div>
							    		</div>
							    		<?php if ($data->rek!='' && $data->rek!='-'){ ?>
							    			<div class="row">
								    			<div class="col s3 m2">Ket. Aktif</div>
								    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->rek; ?></span></div>
								    		</div>
							    		<?php } ?>
							    		<?php if ($data->div=='AVSEC'){ ?>
							    			<div class="row">
								    			<div class="col s3 m2">Berlaku Lisensi</div>
								    			<?php  
								    			$lisen1 = explode('/',$data->lisenlink);
								    			$lisen = $lisen1[5];
								    			if ($lisen=='kosong') {
									    			$lisensi = '-';
									    		} else {
									    			$lisensi = date_format(date_create($data->lisensi), "d-m-Y");
									    		}
								    			?>
								    			<div class="col s5 m2"><span class="truncate">: <?php echo $lisensi; ?></span></div>
								    		</div>
							    		<?php } ?>
							    		<div class="row">
							    			<div class="col s3 m2">Status Pernikahan</div>
							    			<?php  
							    			if ($data->nikah=='TK') {
						    					$nikah = 'BELUM MENIKAH';
						    				} elseif ($data->nikah=='K0') {
						    					$nikah = 'SUDAH MENIKAH, BELUM MEMILIKI ANAK';
						    				} elseif ($data->nikah=='K1') {
						    					$nikah = 'SUDAH MENIKAH, ANAK 1';
						    				} elseif ($data->nikah=='K2') {
						    					$nikah = 'SUDAH MENIKAH, ANAK 2';
						    				} elseif ($data->nikah=='K3') {
						    					$nikah = 'SUDAH MENIKAH, ANAK 3';
						    				} elseif ($data->nikah=='K4') {
						    					$nikah = 'SUDAH MENIKAH, ANAK 4';
						    				} elseif ($data->nikah=='K5') {
						    					$nikah = 'SUDAH MENIKAH, ANAK 5';
						    				} elseif ($data->nikah=='K6') {
						    					$nikah = 'SUDAH MENIKAH, ANAK 6';
						    				} else {
						    					$nikah = 'KOSONG';
						    				}
							    			?>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $nikah; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Status Karyawan</div>
							    			<?php  
							    			if ($data->status=='SK1') {
						    					$status = 'AKTIF';
						    				} elseif ($data->status=='SK2') {
						    					$status = 'TIDAK AKTIF (RESIGN) PADA TANGGAL '.date_format(date_create($data->off), "d-m-Y");
						    				} elseif ($data->status=='SK3') {
						    					$status = 'TIDAK AKTIF (PECAT) PADA TANGGAL '.date_format(date_create($data->off), "d-m-Y");
						    				} elseif ($data->status=='SK4') {
						    					$status = 'SKOR / RUMAHKAN SAMPAI TANGGAL '.date_format(date_create($data->off), "d-m-Y");
						    				} elseif ($data->status=='SK5') {
						    				 	$status = 'CUTI SAMPAI TANGGAL '.date_format(date_create($data->off), "d-m-Y");
						    				} elseif ($data->status=='SK6') {
						    				 	$status = 'TIDAK AKTIF (MENINGGAL DUNIA) PADA TANGGAL '.date_format(date_create($data->off), "d-m-Y");
						    				} else {
						    					$status = 'KOSONG';
						    				}
							    			?>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $status; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s3 m2">Pendidikan Terakhir</div>
							    			<div class="col s5 m2"><span class="truncate">: <?php echo $data->ilmu; ?></span></div>
							    		</div>
							    		<?php
							    		$foto1 = explode('/',$data->fotolink);
							    		$foto = $foto1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Foto</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $foto ?></span></div>
							    			<?php if ($foto=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/foto-'.$foto);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->fotolink);?>">
							    		</div>
							    		<?php
							    		$ktp1 = explode('/',$data->ktplink);
								    	$ktp = $ktp1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">KTP</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $ktp ?></span></div>
							    			<?php if ($ktp=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/ktp-'.$ktp);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->ktplink);?>">
							    		</div>
							    		<?php
							    		$npwp1 = explode('/',$data->npwplink);
								    	$npwp = $npwp1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">NPWP</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $npwp ?></span></div>
							    			<?php if ($npwp=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/npwp-'.$npwp);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->npwplink);?>">
							    		</div>
							    		<?php
							    		$kk1 = explode('/',$data->kklink);
								    	$kk = $kk1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">KK</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $kk ?></span></div>
							    			<?php if ($kk=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/kk-'.$kk);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->kklink);?>">
							    		</div>
										<?php
							    		$skck1 = explode('/',$data->skcklink);
								    	$skck = $skck1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">SKCK</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $skck ?></span></div>
							    			<?php if ($skck=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/skck-'.$skck);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->skcklink);?>">
							    		</div>
										<?php
							    		$ijz1 = explode('/',$data->ijazlink);
								    	$ijz = $ijz1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Ijazah</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $ijz ?></span></div>
							    			<?php if ($ijz=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/ijazah-'.$ijz);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->ijazlink);?>">
							    		</div>
							    		<?php
							    		$lisen1 = explode('/',$data->lisenlink);
								    	$lisen = $lisen1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Lisensi</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $lisen ?></span></div>
							    			<?php if ($lisen=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/lisensi-'.$lisen);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->lisenlink);?>">
							    		</div>
										<?php
							    		$serti1 = explode('/',$data->sertilink);
								    	$serti = $serti1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Sertifikat</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $serti ?></span></div>
							    			<?php if ($serti=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/sertifikat-'.$serti);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->sertilink);?>">
							    		</div>
							    		<?php
							    		$fakta1 = explode('/',$data->faktalink);
								    	$fakta = $fakta1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Pakta Integritas</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $fakta ?></span></div>
							    			<?php if ($fakta=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/fakta-'.$fakta);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->faktalink);?>">
							    		</div>
							    		<?php
							    		$naik1 = explode('/',$data->naiklink);
								    	$naik = $naik1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Surat Pengangkatan</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $naik ?></span></div>
							    			<?php if ($naik=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/suratnaik-'.$naik);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->naiklink);?>">
							    		</div>
							    		<?php
							    		$sp1 = explode('/',$data->splink);
								    	$sp = $sp1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Surat Peringatan</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $sp ?></span></div>
							    			<?php if ($sp=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/sp-'.$sp);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->splink);?>">
							    		</div>
							    		<?php
							    		$out1 = explode('/',$data->outlink);
								    	$out = $out1[5];
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Surat Pemberhentian</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $out ?></span></div>
							    			<?php if ($out=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/suratout-'.$out);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->outlink);?>">
							    		</div>
							    		<?php  
							    		if ($data->sehatlink=='') {
							    			$sehat='kosong';
							    		} else {
							    			$sehat1 = explode('/',$data->sehatlink);
							    			$sehat = $sehat1[5];
							    		}
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Surat Sehat</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $sehat ?></span></div>
							    			<?php if ($sehat=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/suratsehat-'.$sehat);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->sehatlink);?>">
							    		</div>
							    		<?php 
							    		if ($data->laranglink=='') {
							    		 	$larang = 'kosong';
							    		} else {
							    			$larang1 = explode('/',$data->laranglink);
							    			$larang = $larang1[5];
							    		}
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Pernyataan Bebas Org. Terlarang</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $larang ?></span></div>
							    			<?php if ($larang=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/terlarang-'.$larang);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->laranglink);?>">
							    		</div>
							    		<?php  
							    		if ($data->reflink=='') {
							    			$ref = 'kosong';
							    		} else {
							    			$ref1 = explode('/',$data->reflink);
							    			$ref = $ref1[5];
							    		}
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Surat Referensi</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $ref ?></span></div>
							    			<?php if ($ref=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/referensi-'.$ref);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->reflink);?>">
							    		</div>
							    		<?php  
							    		if ($data->terimalink=='') {
							    			$terima = 'kosong';
							    		} else {
							    			$terima1 = explode('/',$data->terimalink);
							    			$terima = $terima1[5];
							    		}
							    		?>
							    		<div class="row">
							    			<div class="col s3 m2">Surat Terima Karyawan</div>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $terima ?></span></div>
							    			<?php if ($terima=='kosong'){ ?>
						    					<div class="col s1"></div>
						    				<?php } else { ?>
						    					<div class="col s1"><a href="<?php echo site_url('download/terima-'.$terima);?>" style="text-decoration: none;color: black;">Download</a></div>
						    				<?php } ?>
							    			<input type="hidden" class="resource" value="<?php echo site_url($data->terimalink);?>">
							    		</div>
							    	</td>
							    </tr>
							    <?php 
							    	$no++;
								} 
								?>
							</tbody>
						</table>
						<div class="right">
					    	<?php echo $this->pagination->create_links(); ?>
					    </div>
					    <?php } else { ?>
						<p class="empty-data center">Tidak Ditemukan Data</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Alert Here -->
		<div id="modal" class="modal">
			<div class="modal-content"></div>
			<a href="#!" class="btn save right modal-close mb-a to-left"><i class="material-icons modal-close right">close</i>Tutup</a>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>