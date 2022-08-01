		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4" id="side-bar">
					<div class="nav-btn" onclick="navbtn()">
						Randi Windarsah<span class="span-title"><img src="<?php echo base_url('assets/img/icon-nav.png');?>" alt="icon-nav" class="img-fluid" width="20"></span>
					</div>
					<ul class="ulli">
						<li class="li-menu">Basis Data<span class="span-li"><img src="<?php echo base_url('assets/img/icon-db.png');?>" alt="icon-db" class="img-fluid" width="25"></span></li>
						<li class="li-menu">Penggajian<span class="span-li"><img src="<?php echo base_url('assets/img/icon-gaji.png');?>" alt="icon-gaji" class="img-fluid" width="25"></span></li>
						<li class="li-menu">Pengaturan<span class="span-li"><img src="<?php echo base_url('assets/img/icon-set.png');?>" alt="icon-set" class="img-fluid" width="25"></span></li>
						<li class="li-menu">Keluar<span class="span-li"><img src="<?php echo base_url('assets/img/icon-out.png');?>" alt="icon-out" class="img-fluid" width="25"></span></li>
					</ul>
				</div>
				<div class="col-md-8" id="content-bar">
					<div id="title-content">
						<div class="menu-title-a text-center">Input Data</div>
						<div class="menu-title-b text-center">Data Karyawan</div>
					</div>
					<div id="content-side" class="mt-5">
						<div class="row ml-5 mb-1" id="form-title-a">Form Data Karyawan</div>
						<div class="row ml-5 mb-3" id="form-title-b">PT Ghita Avia Trans</div>
						<form class="ml-5">
							<div class="form-group row">
							    <label for="inputID" class="col-sm-2 col-form-label form-control-sm">ID</label>
							    <div class="col-sm-7">
							    	<input type="text" class="form-control form-control-sm text-box" id="inputID" placeholder="ID Perusahaan">
							    </div>
							    <div class="col-sm-3">
							    	<input type="submit" class="form-control form-control-sm btn-save" value="Unggah Lampiran">
							    </div>
						  	</div>
						  	<div class="form-group row">
							    <label for="inputNIK" class="col-sm-2 col-form-label form-control-sm">NIK</label>
							    <div class="col-sm-7">
							    	<input type="text" class="form-control form-control-sm text-box" id="inputNIK" placeholder="NIK">
							    </div>
							    <div class="col-sm-3">
							    	<input type="text" class="form-control form-control-lg text-box text-center" placeholder="&#xF067; Foto"  style="font-family:Arial, FontAwesome">
							    </div>
						  	</div>
						  	<div class="form-group row">
							    <label for="inputNama" class="col-sm-2 col-form-label form-control-sm">Nama Lengkap</label>
							    <div class="col-sm-7">
							    	<input type="text" class="form-control form-control-sm text-box" id="inputNama" placeholder="Nama Lengkap">
							    </div>
							    <div class="col-sm-3">
							    	<input type="text" class="form-control form-control-lg text-box text-center" placeholder="&#xF067; KTP"  style="font-family:Arial, FontAwesome">
							    </div>
						  	</div>
						  	<div class="form-group row">
							    <div class="col-sm-9 text-right">
							    	<button type="submit" class="btn btn-save ">Simpan</button>
							    </div>
						  	</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		<script type="text/javascript">
	        $(document).ready(function () {
	            $('.nav-btn').on('click', function () {
	                $('#side-bar').toggleClass('on-side');
	                $('#content-bar').toggleClass('on-content');
	            });
	        });
	    </script>
	</body>