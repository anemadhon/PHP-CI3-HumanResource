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
					<div id="content-side">
						<p id="form-title-a">Legalitas - Akta</p>
						<p id="form-title-b">PT Ghita Avia Trans</p>
						<div class="row space-btn space mb-a">
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
						<?php echo $this->pagination->create_links(); ?>
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