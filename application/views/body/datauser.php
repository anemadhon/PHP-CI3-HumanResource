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
					<div id="title-content"></div>
					<div id="content-side" class="mt-5">
						<p id="form-title-a">Form Update Data User</p>
						<p id="form-title-b">PT Ghita Avia Trans</p>
						<?php
						echo form_open('user','autocomplete="off"')
						?>
						<div class="row space ml-lg">
							<div class="col s12 m8 l9">
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" name="akunuser" id="akun" value="<?php echo $dataadmin['datauser']['akunuser'] ?>">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" name="namauser" id="nama" value="<?php echo $dataadmin['datauser']['namauser'] ?>">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="password" class="browser-default text-input text-box-input" name="passlama" id="pl" value="" placeholder="Password Lama" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="password" class="browser-default text-input text-box-input" id="pb" value="" placeholder="Password Baru" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="password" class="browser-default text-input text-box-input" name="passbaru" id="konfir" value="" placeholder="Konfirmasi Password Baru" required>
							        </div>
								</div>
							</div>
						</div>
						<div class="col s12 m8 l9">
							<div class="row right-align to-left mb-a">
								<button class="btn save" type="submit"><i class="material-icons left">save</i>Ubah</button>
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