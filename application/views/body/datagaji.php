		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4" id="side-bar">
					<div class="nav-btn">
						<a href="<?php echo site_url('datauser');?>" style="text-decoration: none;color: white;" class="li-menu"><i class="fa fa-user"></i> <?php echo $dataadmin['username'] ?></a><span class="span-title"><img src="<?php echo base_url('assets/img/icon-nav.png');?>" alt="icon-nav" class="img-fluid" width="20"></span>
					</div>
					<ul class="ulli">
						<a href="<?php echo site_url('input');?>" style="text-decoration: none;"><li class="li-menu"><i class="fa fa-database"></i> Basis Data<span class="span-li"><img src="<?php echo base_url('assets/img/icon-db.png');?>" alt="icon-db" class="img-fluid" width="25"></span></li></a>
						<?php if ($dataadmin['username'] == 'Kang Randi' || $dataadmin['username'] == '@anemadhon' || $dataadmin['username'] == 'Faisal G'){ ?>
						<a href="<?php echo site_url('gaji');?>" style="text-decoration: none;"><li class="li-menu"><i class="fa fa-money"></i> Penggajian<span class="span-li"><img src="<?php echo base_url('assets/img/icon-gaji.png');?>" alt="icon-gaji" class="img-fluid" width="25"></span></li></a>	
						<?php } else { ?>
						<li class="li-menu"><i class="fa fa-money"></i> Penggajian<span class="span-li"><img src="<?php echo base_url('assets/img/icon-gaji.png');?>" alt="icon-gaji" class="img-fluid" width="25"></span></li>
						<?php } ?>
						<li class="li-menu"><i class="fa fa-cog"></i> Pengaturan<span class="span-li"><img src="<?php echo base_url('assets/img/icon-set.png');?>" alt="icon-set" class="img-fluid" width="25"></span></li>
						<a href="<?php echo site_url('logout');?>"><li class="li-menu"><i class="fa fa-sign-out"></i> Keluar<span class="span-li"><img src="<?php echo base_url('assets/img/icon-out.png');?>" alt="icon-out" class="img-fluid" width="25"></span></li></a>
					</ul>
				</div>
				<div class="col-md-8" id="content-bar">
					<div id="title-content">
						<div class="menu-title-a text-center"><a href="<?php echo site_url('input');?>" id="menu-a">Input Data</a></div>
						<div class="menu-title-b-on text-center"><a href="<?php echo site_url('display');?>" id="menu-b">Data Karyawan</a></div>
					</div>
					<div id="content-side" class="mt-5">
						<div class="row mt-4 male-text" id="form-title-a">Import Data Penggajian</div>
						<div class="row mb-4 male-text" id="form-title-b">PT Ghita Avia Trans</div>
						<?php if ($dataadmin['uploaded']->num_rows() == 0){ ?>
						<div class="row mb-4 male-text" id="form-title-a">Belum Ada Data</div>	
						<?php } else { ?>
						<div class="row mb-5 justify-content-end" id="form-title-b">
							<!-- <div class="col-md-5"></div> -->
							<?php echo form_open('pdf','target="_blank"') ?>
								<button type="submit" class="btn btn-save text-center mr-3"><i class="fa fa-print"></i> Cetak</button>
								<input type="hidden" id="pdf" name="pdf">
							<?php echo form_close() ?>
							<?php echo form_open('excel') ?>
								<button type="submit" class="btn btn-save text-center mr-5"><i class="fa fa-print"></i> Export</button>
								<input type="hidden" id="excel" name="excel">
							<?php echo form_close() ?>
							<?php 
							$attr = array('method'=>'get','autocomplete'=>'off','class'=>'form-inline');
							echo form_open('caridata',$attr); ?>
      							<input type="text" class="form-control text-box-input text-left mr-2" placeholder="Cari Data..." id="kw" name="kw">
      							<button type="submit" class="btn btn-save text-left"><i class="fa fa-search"></i> Cari</button>
							<?php echo form_close(); ?>
						</div>
						<div class="table-responsive-md male-text">
							<table class="table table-striped mb-3 all-data">
							  	<thead class="btn-save text-center">
								    <tr>
								    	<th scope="col" id="no-head">All <input type="checkbox" id="cb-all"></th>
								    	<th scope="col" id="no-head">No.</th>
								    	<th scope="col" id="nama-head">Nama</th>
								    	<th scope="col" id="jab-head">Jabatan</th>
								    	<th scope="col" id="aksi-head">Aksi</th>
								    </tr>
							  	</thead>
								<tbody>
									<?php 
									$no=1;
									foreach ($dataadmin['uploaded']->result() as $data){ 
									?>
								    <tr>
								    	<td scope="row" class="text-center no-body"><input type="checkbox" class="cb" name="cb[]" value="<?php echo $data->idgaji; ?>"></td>
								    	<td scope="row" class="text-center no-body"><?php echo $no; ?></td>
								    	<td class="nama-body"><?php echo $data->nama; ?></td>
								    	<td class="jab-body"><?php echo $data->jabatan; ?></td>
								    	<td class="text-center aksi-body">
								    		<a href="<?php echo site_url('cetak-slip/'.$data->idgaji) ?>"><button type="submit" class="btn btn-save"><i class="fa fa-print"></i> Cetak</button></a>
											<input type="hidden" name="idgaji" value="<?php echo $data->idgaji; ?>">
								    	</td>
								    </tr>
								    <?php 
								    	$no++;
									} 
									?>
								</tbody>
							</table>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
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
		<script>
			$(document).ready(function(){
			    var btn = document.getElementsByClassName('show');
			    var src = document.getElementsByClassName('src');

			    for (let i = 0; i < btn.length; i++) {

			        let btnsrc = btn[i];
			        let text = src[i];

			        btnsrc.addEventListener( 'click', getSrc, false );

			        function getSrc( event ) {
			            $(".modal-body .for-src").attr('src',text.value);
			            $(".modal-body .for-src").attr('width','465');
			            $(".modal-body .for-src").attr('height','500');
			        }
			    }  
			});
			$(document).ready(function(){
			    var all = document.getElementById('cb-all');
			    var cb = document.getElementsByClassName('cb');
			    var jmlcb = cb.length;
			    var jml = '';
			    var ar = '';

			    for (let i = 0; i < jmlcb; i++) {

			        let check = cb[i];

			        all.addEventListener('click', getVal, false);
			        check.addEventListener( 'click', getValRow, false );

			        function getVal( event ) {
			            if (all.checked==true) {
			            	$('.cb').attr('checked', true);
			            	jml += check.value+'/';
				            $('#pdf').val(jml);
				            $('#excel').val(jml);
			            } else {
			            	$('.cb').attr('checked', false);
			            	jml = '';
			            	$('#pdf').val(jml);
				            $('#excel').val(jml);
			            }
			        }

			        function getValRow( event ) {
			        	if (check.checked==true) {
			        		jml += check.value+'/';
			        		$('#pdf').val(jml);
			            	$('#excel').val(jml);
			        	} else {
			        		jml = jml.split(check.value+'/');
			        		jml += jml;
			        		ar = jml.split(',');
			        		jml = ar[1];
			        		$('#pdf').val(jml);
			            	$('#excel').val(jml);
			        	}
			        }
			    }  
			});
		</script>
	</body>