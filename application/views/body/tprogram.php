<!-- 		<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4" id="side-bar">
			<div class="nav-btn">
				<a href="<?php echo site_url('datauser');?>" style="text-decoration: none;color: white;" class="li-menu"><i class="fa fa-user"></i> <?php echo $dataadmin['username'] ?></a><span class="span-title"><img src="<?php echo base_url('assets/img/icon-nav.png');?>" alt="icon-nav" class="img-fluid" width="20"></span>
			</div>
			<ul class="ulli">
				<a href="<?php echo site_url('input');?>" style="text-decoration: none;" data-toggle="tooltip" data-placement="right" title="Basis Data"><li class="li-menu"><i class="fa fa-database"></i> Basis Data<span class="span-li"><img src="<?php echo base_url('assets/img/icon-db.png');?>" alt="icon-db" class="img-fluid" width="25"></span></li></a>
				<?php if ($dataadmin['username'] == 'Kang Randi' || $dataadmin['username'] == '@anemadhon' || $dataadmin['username'] == 'Faisal G'){ ?>
				<a href="<?php echo site_url('gaji');?>" style="text-decoration: none;" data-toggle="tooltip" data-placement="right" title="Slip"><li class="li-menu"><i class="fa fa-money"></i> Slip<span class="span-li"><img src="<?php echo base_url('assets/img/icon-gaji.png');?>" alt="icon-lembur" class="img-fluid" width="25"></span></li></a>	
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
				<div class="row justify-content-end">
					<div class="d-flex bd-highlight col-xl-4 col-lg-5 col-md-6 col-sm-8 col-9 btn-save">
						<div class="p-2 bd-highlight">Notifikasi Training Program</div>
						<div class="p-2 bd-highlight badge badge-light my-2"><strong><?php //echo count($dataultah) ?></strong></div>
						<div class="ml-auto p-2 bd-highlight"><a href="<?php echo site_url('tp');?>" id="menu-a"><strong> Lihat</strong></a></div>
					</div>
				</div>
				<div class="row mt-4 male-text" id="form-title-a">Training Program Karyawan</div>
				<div class="row male-text" id="form-title-b">PT Ghita Avia Trans</div>
				<div class="row mb-3 justify-content-end" id="form-title-b">
				    <div class="col-sm-1 mr-3 text-right">
				    	<?php echo form_open('pdf','target="_blank"') ?>
							<button type="submit" class="btn btn-save text-center"><i class="fa fa-print"></i> Cetak</button>
							<input type="hidden" id="pdf" name="pdf">
						<?php echo form_close() ?>
				    </div>
				    <div class="col-sm-1 mr-4 text-right">
						<?php echo form_open('excel') ?>
							<button type="submit" class="btn btn-save text-center"><i class="fa fa-print"></i> Export</button>
							<input type="hidden" id="excel" name="excel">
						<?php echo form_close() ?>
				    </div>
				    <div class="col-sm-1 mr-5 text-right">
				    	<?php echo form_open('pdf-cv','target="_blank"') ?>
							<button type="submit" class="btn btn-save text-center"><i class="fa fa-print"></i> CV</button>
							<input type="hidden" id="cv" name="cv">
						<?php echo form_close() ?>
				    </div>
				    <?php 
					$attr = array('method'=>'get','autocomplete'=>'off','class'=>'form-inline');
					echo form_open('caridatatp',$attr); ?>
					<div class="col-sm-9 input-group">
			    		<div class="input-group-prepend">
			    			<?php if ($this->input->get('kw')){ ?>
					    	<input type="text" class="input-group-text form-control text-box-input text-left" value="<?php echo $this->input->get('kw') ?>" id="kw" name="kw">
					    	<?php } else { ?>
							<input type="text" class="input-group-text form-control text-box-input text-left" placeholder="Cari Data..." id="kw" name="kw">
					    	<?php } ?>
				        </div>
				        <select name="urut" id="urut" class="form-control text-box-input">
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
			    	</div>
				    <div class="col-sm-1 text-right">
      							<button type="submit" class="btn btn-save text-left"><i class="fa fa-search"></i> Cari</button>
				    </div>
				    <?php echo form_close(); ?>
			  	</div>
			  	<?php 
			  	if ($this->input->get('kw')){ 
			  		$angka = '-'.$dataadmin['tepe']->num_rows().'-';
			  		$kw = '-'.$this->input->get('kw').'-';
			  		if ($this->input->get('urut')) {
			  			$urut = ' Berdasarkan -'.$u.'-';
			  		} else {
			  			$urut = '';
			  		}
			  	?>
			  	<div class="row male-text mb-3" id="form-title-b">Hasil Pencarian : Ditemukan <?php echo $angka; ?> Data untuk Kata Kunci <?php echo $kw; ?><?php echo $urut; ?></div>
			  	<?php } ?>
			  	<div class="table-responsive-md male-text border-table">
					<table class="table table-sm table-striped mb-3">
					  	<thead class="btn-save text-center">
						    <tr>
						    	<th scope="col" id="no-head">No.</th>
						    	<th scope="col" id="ins-head">Nama</th>
						    	<th scope="col" id="akhir-head">Jabatan</th>
						    	<th scope="col" colspan="2" id="act-head">Aksi</th>
						    </tr>
					  	</thead>
						<tbody>
							<?php
							$no = $this->uri->segment('3') + 1;
							foreach ($dataadmin['tepe']->result() as $tp){ 
								/*$on = $tp->tglakhir;
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
					    		}*/
							?>
						    <tr>
						    	<?php //if ($lb->y == 0 && $lb->m < 3) { ?>
						    	<td scope="row" class="text-center no-body" style="color: red; font-weight: bold;"><?php echo $no; ?></td>
						    	<td scope="row" class="text-center ins-body" style="color: red; font-weight: bold;"><?php //echo $ip->instansi; ?></td>
						    	<td scope="row" class="text-center akhir-body" style="color: red; font-weight: bold;"><?php //echo date_format(date_create($ip->tglakhir), "d-m-Y"); ?></td>
						    	<?php //} else { ?>
						    	<td scope="row" class="text-center no-body"><?php echo $no; ?></td>
						    	<td scope="row" class="text-left ins-body"><?php echo $tp->nama; ?></td>
						    	<td scope="row" class="text-left akhir-body"><?php echo $tp->jbtn; ?></td>
						    	<?php //} ?>
						    	<?php if ($tp->div=='AVSEC' || $tp->jbtn=='MANAGER AVSEC'){ ?>
						    	<td class="text-center act-body"><button type="submit" class="btn btn-sm btn-save detail"><i class="fa fa-eye"></i> Lihat</button></td>
						    	<td class="text-center act-body">
						    		<a href="<?php echo site_url('tp-up/').$tp->ktp ?>"><button type="submit" class="btn btn-sm btn-save"><i class="fa fa-edit"></i> Update</button></a>
						    	</td>
						    	<?php } else { ?>
								<td class="text-center act-body"><button type="submit" class="btn btn-sm btn-save detail"><i class="fa fa-eye"></i> Lihat</button></td>
								<td class="text-center act-body"><div class="btn btn-sm btn-save"><i class="fa fa-edit"></i> Update</div></td>
						    	<?php } ?>
						    </tr>
						    <tr class="detailview" style="display: none;">
						    	<td colspan="5">
						    		<div class="row">
						    			<div class="col-sm-3">Tipe SKP</div>
						    			<div class="col-sm-8"><span class="ml-text">:</span><span class="mr-text"><?php echo '' ?></span></div>
						    		</div>
						    		<div class="row">
						    			<div class="col-sm-3">No. SKP</div>
						    			<div class="col-sm-8"><span class="ml-text">:</span><span class="mr-text"><?php echo '' ?></span></div>
						    		</div>
						    		<div class="row">
						    			<div class="col-sm-3">Valid</div>
						    			<div class="col-sm-8"><span class="ml-text">:</span><span class="mr-text"><?php echo '' ?></span></div>
						    		</div>
						    		<div class="row">
						    			<div class="col-sm-3">Plan Program</div>
						    			<div class="col-sm-8"><span class="ml-text">:</span><span class="mr-text"><?php echo '' ?></span></div>
						    		</div>
						    		<div class="row">
						    			<div class="col-sm-3">No. HP</div>
						    			<div class="col-sm-8"><span class="ml-text">:</span><span class="mr-text"><?php echo $tp->tlp ?></span></div>
						    		</div>
						    		<div class="row">
						    			<div class="col-sm-3">Jenis Training</div>
						    			<div class="col-sm-8"><span class="ml-text">:</span><span class="mr-text"><?php echo '' ?></span></div>
						    		</div>
						    		<div class="row">
						    			<div class="col-sm-3">Tgl Pelaksanaan</div>
						    			<div class="col-sm-8"><span class="ml-text">:</span><span class="mr-text"><?php echo '' ?></span></div>
						    		</div>
						    	</td>
						    </tr>
						    <?php 
						    	$no++;
							} 
							?>
						</tbody>
					</table>
				</div>
				<div class="row mb-3 justify-content-end">
				    <div class="col-sm-5 text-right">
				    	<?php echo $this->pagination->create_links(); ?>
				    </div>
			  	</div>
			</div>
		</div>
	</div>
</div>
Modal
<div class="modal fade bd-example-modal-lg modal-pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Berkas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <embed class="for-src">
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/action.js');?>"></script>
	</body> -->
		<!-- Modal Alert Here -->
		<div id="modal" class="modal">
			<div class="modal-content">
				<h4 id="modal-content"></h4>
			</div>
			<div class="modal-footer">
				<a href="#" class="modal-close btn save"><i class="material-icons modal-close">close</i></a>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>