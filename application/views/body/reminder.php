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
						<p id="form-title-a">Data PKS Yang Mendekati Masa Berakhir & Telah Lewat Batas Akhir</p>
						<p id="form-title-b"><a href="<?php echo site_url('data-pks/display');?>" id="menu-a"><i class="material-icons left">arrow_back</i>Kembali</a></p>
						<div class="row">
							<?php
							foreach ($dataadmin['reminder']->result() as $reminder) {
					    		$on = $reminder->tglakhir;
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
								if ((int)$countIntBulanLisensi[0] <= 2 && (int)$countIntBulanLisensi[0] > 0 && ($countIntBulanLisensi[1] == 'Bulan' || $countIntBulanLisensi[1] == 'Hari')) {
							?>
							<div class="col s12 m6">
								<div class="card btn-save ml-lg" style="border-radius: 40px">
									<div class="card-content" style="height: 13rem;">
										<span class="card-title"><strong><?php echo $reminder->instansi ?></strong></span>
										<p><?php echo $reminder->perihal ?></p>
									</div>
									<div class="card-action" style="height: 4rem; border-radius: 0 0 40px 40px">
										<small><?php echo date_format(date_create($reminder->tglakhir), "d-m-Y").' ('.$count.')'; ?></small>
									</div>
								</div>
							</div>
							<?php
								}
							}
							?>
						</div>
						<div class="row">
							<?php
							foreach ($dataadmin['reminder']->result() as $reminder) {
					    		$on = $reminder->tglakhir;
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
								if ((int)$countIntBulanLisensi[0] < 0) {
							?>
							<div class="col s12 m6">
								<div class="card btn-save red ml-lg" style="border-radius: 40px">
									<div class="card-content" style="height: 13rem;">
										<span class="card-title"><strong><?php echo $reminder->instansi ?></strong></span>
										<p><?php echo $reminder->perihal ?></p>
									</div>
									<div class="card-action" style="height: 4rem; border-radius: 0 0 40px 40px">
										<small><?php echo date_format(date_create($reminder->tglakhir), "d-m-Y").' ('.$count.')'; ?></small>
									</div>
								</div>
							</div>
							<?php
								}
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