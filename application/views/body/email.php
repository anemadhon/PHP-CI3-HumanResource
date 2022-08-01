<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  	<head>
	    <style>
	    	#border {
				border: 2px solid black;
				border-radius: 7px;
				padding: 12px;
	    	}
			#head {
			  font-size: 1.34rem;
			  line-height: 110%;
			  margin: 1.0933333333rem 0 1.34rem 0;
			  color: black;
			  text-decoration: underline;
			}
			#sub {
			  font-size: 1rem;
			  line-height: 110%;
			  margin: 0.7666666667rem 0 0.8rem 0;
			  color: black;
			}
			.sub {
			  font-size: 0.9rem;
			  line-height: 100%;
			  margin: 0.7666666667rem 0 0.8rem 0;
			  color: black;
			}
			.card {
			  position: relative;
			  margin: 0.5rem 0 1rem 0;
			  background-color: #19325a;
			  border-radius: 7px;
			  color: #e8e8e8;
			}
			.card .card-title {
			  font-size: 24px;
			  font-weight: 300;
			}
			.card .card-content {
			  padding: 24px;
			  border-radius: 7px;
			}
			.card .card-content p {
			  margin: 0;
			}
			.card .card-content .card-title {
			  display: block;
			  line-height: 32px;
			  margin-bottom: 8px;
			}
			.card .card-action {
			  background-color: inherit;
			  border-top: 1px solid rgba(160, 160, 160, 0.2);
			  position: relative;
			  padding-bottom: 2px;
			  border-radius: 7px;
			  text-align: center;
			}
			.card .card-action p {
			  color: #e8e8e8;
			  transition: color .3s ease;
			  text-transform: uppercase;
			}
	    </style>
  	</head>
  	<body>
  		<div id="border">
  			<p id="head"><strong>REMINDER PKS</strong></p>
	  		<p id="sub">Data Terlampir Sebagai Berikut :</p>
	  		<p class="sub">PKS</p>
			<?php 
			foreach ($dataadmin['reminder']->result() as $data){ 
				$on = $data->tglakhir;
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
	    			$count = $lb->format('%r%m Bulan ').$lb->format('%r%d Hari');
	    		} elseif ($lb->m==0) {
	    			$count = $lb->format('%r%y Tahun ').$lb->format('%r%d Hari');
	    		} elseif ($lb->d==0) {
	    			$count = $lb->format('%r%y Tahun ').$lb->format('%r%m Bulan');
	    		} else {
	    			$count = $lb->format('%r%y Tahun ').$lb->format('%r%m Bulan ').$lb->format('%r%d Hari');
	    		}
	    		/*$hariminus = (int)$lb->format('%r%d');
				$bulanminus = (int)$lb->format('%r%m');
	    		if ($count=='2 Bulan' || $count=='1 Bulan' || ($lb->y==0 && $lb->m < 2) && ($hariminus > 0 || $bulanminus > 0)) {*/
	    		$countIntSeparatorLisensi = explode(', ', $count);
				$countIntBulanLisensi = explode(' ', $countIntSeparatorLisensi[0]);
				if (((int)$countIntBulanLisensi[0] > 0 && (int)$countIntBulanLisensi[0] <= 2 && ($countIntBulanLisensi[1] == 'Bulan' || $countIntBulanLisensi[1] == 'Hari')) || ((int)$countIntBulanLisensi[0] < 0)) {
			?>
			<div class="card">
				<div class="card-content">
					<span class="card-title"><strong><?php echo $data->instansi ?></strong></span>
					<p><?php echo $data->perihal ?></p>
				</div>
				<div class="card-action">
					<p><?php echo date_format(date_create($data->tglakhir), "d-m-Y").' ('.$count.') Lagi'; ?></p>
				</div>
			</div>
			<?php 
				} 
			}
			?>
  		</div>
	</body>
</html>