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
					<div id="content-side">
						<?php 
						$remind = array();
						if ($dataadmin['reminder']->num_rows()>0){ 
							echo $dataadmin['reminder']->num_rows();
							foreach ($dataadmin['reminder']->result() as $re) {
								$on = $re->tglakhir;
					    		$tglon = new DateTime($on);
					    		$today = new DateTime();
					    		$lb = $today->diff($tglon);
					    		if ($lb->y==0 && $lb->m==0) {
					    			$count = $lb->format('%r%d Hari');
					    		} elseif ($lb->y==0 && $lb->d==0) {
					    			$count = $lb->format('%r%m Bulan');
					    		} elseif ($lb->m==0 && $lb->d==0) {
					    			$count = $lb->format('%r%y Tahun');
					    		} elseif ($lb->y==0) {
					    			$count = $lb->format('%r%m Bulan, ').$lb->format('%r%d Hari');
					    		} elseif ($lb->m==0) {
					    			$count = $lb->format('%r%y Tahun, ').$lb->format('%r%d Hari');
					    		} elseif ($lb->d==0) {
					    			$count = $lb->format('%r%y Tahun, ').$lb->format('%r%m Bulan');
					    		} else {
					    			$count = $lb->format('%r%y Tahun, ').$lb->format('%r%m Bulan, ').$lb->format('%r%d Hari');
					    		}
					    		/*$hariminus = (int)$lb->format('%r%d');
								$bulanminus = (int)$lb->format('%r%m');
					    		if ($count=='2 Bulan' || $count=='1 Bulan' || ($lb->y==0 && $lb->m < 2) && ($hariminus > 0 || $bulanminus > 0)) {*/
					    		$countIntSeparatorLisensi = explode(', ', $count);
								$countIntBulanLisensi = explode(' ', $countIntSeparatorLisensi[0]);
								if ((int)$countIntBulanLisensi[0] > 0 && (int)$countIntBulanLisensi[0] <= 2 && ($countIntBulanLisensi[1] == 'Bulan' || $countIntBulanLisensi[1] == 'Hari')) {
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
							//print_r($remind);
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
						<div class="row space-btn space mb-a">
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
						<?php echo $this->pagination->create_links(); ?>
						<table class="responsive-table table-style mb-a">
					        <thead>
							    <tr>
							    	<th scope="col" class="center">No.</th>
							    	<th scope="col" class="center">Instansi</th>
							    	<th scope="col" class="center">Jenis PKS</th>
							    	<th scope="col" class="center">Perihal</th>
							    	<th scope="col" class="center">Tgl Berakhir</th>
							    	<th scope="col" class="center" colspan="2">Aksi</th>
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
							    		<a href="<?php echo site_url('pks-up/').$ip->id.'/'.$ip->ip ?>"><button type="submit" class="btn-small btn save"><i class="material-icons left">edit</i>Ubah</button></a>
							    	</td>
							    </tr>
							    <tr class="detailview" style="display: none;">
									<td colspan="7">
										<div class="row">
							    			<div class="col s4 m2">No. Peizinan</div>
							    			<?php 
							    			if ($ip->nopks==''){ 
							    				$nopks = '-';
							    			} else {
							    				$nopks = $ip->nopks;
							    			}
							    			?>
							    			<div class="col s5 m4"><span class="truncate">: <?php echo $nopks; ?></span></div>
							    		</div>
							    		<div class="row">
							    			<div class="col s4 m2">Tgl Buat</div>
							    			<div class="col s5 m3"><span class="truncate">: <?php echo date_format(date_create($ip->tglbuat), "d-m-Y"); ?></span></div>
							    		</div>
							    		<?php
							    		$file = explode('/',$ip->file);
								    	$file = $file[6];
							    		?>
							    		<div class="row">
							    			<div class="col s4 m2">Softfile</div>
							    			<?php if ($file==''){ ?>
							    			<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: Kosong</span></div>
							    			<input type="hidden" class="resource" value="">
							    			<?php } else { ?>
											<div class="col s4 m8 modal-trigger" data-target="modal"><span class="truncate show">: <?php echo $file ?></span></div>
											<input type="hidden" class="resource" value="<?php echo site_url($ip->file);?>">
							    			<?php } ?>
							    		</div>
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