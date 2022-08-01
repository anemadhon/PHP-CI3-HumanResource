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
						<li class="menu-title-a-on"><a href="<?php echo site_url('display');?>" id="menu-a"><i class="material-icons left">arrow_back</i>Kembali</a></li>
					</ul>
					<?php  
					$dataultah = array();
					$nohbd = 1;
					foreach ($dataadmin['hbd']->result() as $hbd) {
						$tl_umur = explode('-', $hbd->tl);
						$tln_umur = explode('-', $hbd->tlnotif);
						$umur = date('Y')-$tl_umur[0];
						$hari = $tl_umur[2]-date('d');
				    				if ($hari>0 && $hari<8 || $hari==0) {
				    					$dataultah[] = $hari.'//'.$umur.'//'.$hbd->nama.'//'.$hbd->t.'//'.$hbd->tl.'//'.$hbd->jbtn.'//'.$hbd->fotolink;
				    				}
				    			}
				    			$bulan = array('01'  => 'Januari',
			    							'02'  => 'Februai',
			    							'03' => 'Maret',
			    							'04' => 'April',
			    							'05' => 'Mei',
			    							'06' => 'Juni',
			    							'07' => 'Juli',
			    							'08' => 'Agustus',
			    							'09' => 'September',
			    							'10' => 'Oktober',
			    							'11' => 'November',
			    							'12' => 'Desember');
					?>
					<div id="content-side">
						<p id="form-title-a" class="mb-b">Data Karyawan Yang Ulang Tahun Bulan <?php echo $bulan[date('m')] ?></p>
						<div class="row">
							<?php  
							asort($dataultah); 
							foreach ($dataultah as $datahbd) {
								$data = explode('//', $datahbd);
								$fotodiri = explode('/', $data[6]);
								$foto = $fotodiri[5];
								if ($foto == 'kosong') {
									$urlfoto = base_url('assets/img/user.jpg');
								} else {
									$urlfoto = base_url($data[6]);
								}
							?>
							<div class="col s12 m4 l3">
								<div class="card ml-lg">
									<div class="card-image">
										<img src="<?php echo $urlfoto ?>" class="materialboxed" data-caption="<?php echo $data[2] ?>" width="200" style="height: 18rem;">
									</div>
									<div class="card-content" style="height: 9rem;">
										<p><?php echo $data[3].', '.date_format(date_create($data[4]), "d-m-Y").' / '.$data[1].' Tahun' ?></p>
										<p><small><?php echo $data[5] ?></small></p>
									</div>
									<div class="card-action" style="height: 7rem;">
										<?php if ($data[0]==0){ ?>
										<p>Selamat Ulang Tahun <strong><?php echo $data[2] ?></strong></p>
								        <?php } else { ?>
								        <p><?php echo $data[0].' Hari Menuju Hari Bahagia nya '.$data[2] ?></p>
								        <?php } ?>
									</div>
								</div>
							</div>
							<?php
							} 
							?>
						</div>
			
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>