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
						<li class="menu-title-a-on"><a href="<?php echo site_url('gaji');?>" id="menu-a">Slip Gaji</a></li>
						<li class="menu-title-b"><a href="<?php echo site_url('lembur');?>" id="menu-a">Slip Lembur</a></li>
					</ul>
					<div id="content-side">
						<p id="form-title-a">Import File - Slip Gaji (Laman untuk Development)</p>
						<p id="form-title-b">PT Ghita Avia Trans</p>
						<div class="row ml-lg">
			    			<div class="space-file">
				    			<label for="import" class="col s12 m10 text-file text-box-input">
						        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih File</p>
					    		</label>
					    		<input type="file" name="import" id="import" class="up-file" hidden required>
			    			</div>
						</div>
						<div class="col s12 m10">
							<div class="row right-align to-left mb-a">
								<button class="btn save" type="submit"><i class="material-icons left">file_upload</i>Unggah</button>
							</div>
						</div>
					    <table class="responsive-table table-style mb-a">
					        <thead>
							    <tr>
							    	<th>
							    		<p>
											<label>
												<input type="checkbox" id="cb-all" class="filled-in">
												<span class="white-text">All</span>
											</label>
										</p>
							    	</th>
							    	<th scope="col" class="center">No.</th>
							    	<th scope="col" class="center">Nama</th>
							    	<th scope="col" class="center">Jabatan</th>
							    </tr>
						  	</thead>
							<tbody>
								<?php
								$no=0;
								for ($i=0; $i < 5; $i++) {  
								?>
							    <tr>
							    	<td>
							    		<p>
											<label>
												<input type="checkbox" class="filled-in cb">
												<span></span>
											</label>
										</p>
							    	</td>
							    	<td scope="row" class="center"><?php echo $no; ?></td>
							    	<td scope="row"><?php echo 'A'; ?></td>
							    	<td scope="row"><?php echo 'B'; ?></td>
							    </tr>
							    <?php 
							    	$no++;
								} 
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>