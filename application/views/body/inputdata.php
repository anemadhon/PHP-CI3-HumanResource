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
						<li class="menu-title-a-on"><a href="<?php echo site_url('input');?>" id="menu-a">Input Data</a></li>
						<li class="menu-title-b"><a href="<?php echo site_url('display');?>" id="menu-b">Data Karyawan</a></li>
					</ul>
					<div id="content-side">
						<p id="form-title-a">Form Data Karyawan</p>
						<p id="form-title-b">PT Ghita Avia Trans</p>
						<?php
						echo form_open_multipart('submit','autocomplete="off"');
						
						function get_client_ip() {
						    $ipaddress = '';
						    if (getenv('HTTP_CLIENT_IP'))
						        $ipaddress = getenv('HTTP_CLIENT_IP');
						    else if(getenv('HTTP_X_FORWARDED_FOR'))
						        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
						    else if(getenv('HTTP_X_FORWARDED'))
						        $ipaddress = getenv('HTTP_X_FORWARDED');
						    else if(getenv('HTTP_FORWARDED_FOR'))
						        $ipaddress = getenv('HTTP_FORWARDED_FOR');
						    else if(getenv('HTTP_FORWARDED'))
						       $ipaddress = getenv('HTTP_FORWARDED');
						    else if(getenv('REMOTE_ADDR'))
						        $ipaddress = getenv('REMOTE_ADDR');
						    else
						        $ipaddress = 'UNKNOWN';
						    return $ipaddress;
						}
						?>
						<div class="row space ml-lg">
							<div class="col s12 m8 l9">
								<div class="row">
							        <div class="col s12">
							        	<input id="inputID" type="text" class="browser-default text-input text-box-input" name="nikpt" placeholder="Nomor Induk Karyawan" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input id="inputNIK" type="text" class="browser-default text-input text-box-input" name="noktp" placeholder="Nomor Induk Kependudukan" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input id="inputNama" type="text" class="browser-default text-input text-box-input" name="namadiri" placeholder="Nama Lengkap" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input id="inputNPWP" type="text" class="browser-default text-input text-box-input" placeholder="NPWP">
							        	<input type="hidden" name="npwp" id="tonpwp">
							        </div>
								</div>
								<div class="row space-box">
							        <div class="col s6 space">
							        	<input id="inputTmpt" type="text" class="browser-default text-input text-box-input" name="tmptlahir" placeholder="Tempat Lahir">
							        </div>
							        <div class="col s6 space">
							        	<input id="inputTgl" type="text" class="browser-default text-input text-box-input" name="tgllahir" placeholder="Tanggal Lahir : DD-MM-YYYY">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input id="inputDiv" type="text" class="browser-default text-input text-box-input" placeholder="Divisi" name="divisi" list="div">
								    	<datalist id="div">
											<option value="AVSEC" class="text-box-input">
											<option value="FINANCE" class="text-box-input">
											<option value="HRD & LEGAL" class="text-box-input">
											<option value="IT DEVELOPMENT" class="text-box-input">
											<option value="MAINTENANCE" class="text-box-input">
											<option value="MANAJEMEN" class="text-box-input">
											<option value="OPERASIONAL" class="text-box-input">
											<option value="PURCHASING" class="text-box-input">
											<option value="QUALITY CONTROLL" class="text-box-input">
											<option value="SECURITY" class="text-box-input">
											<option value="SEKRETARIAT" class="text-box-input">
										</datalist>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input id="inputJab" type="text" class="browser-default text-input text-box-input" placeholder="Jabatan" name="jbtn">
							        </div>
								</div>
								<div class="row" id="bLisensi">
							        <div class="col s12">
							        	<input id="inputBatasLisen" type="text" class="browser-default text-input text-box-input" placeholder="Masa Lisensi" name="masali">
							        </div>
								</div>
								<div class="row space-box">
							        <div class="col s6 space">
							        	<input id="inputOn" type="text" class="browser-default text-input text-box-input" name="tglon" placeholder="Tanggal Aktif : DD-MM-YYYY">
							        </div>
							        <div class="col s6 space">
							        	<select name="statuspt" id="inputSK" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Pilih</option>
								    		<option value="SK1" class="text-box-input" selected>Aktif</option>
								    		<option value="SK1" class="text-box-input">Pengganti</option>
								    		<option value="SK2" class="text-box-input">Resign</option>
								    		<option value="SK3" class="text-box-input">Pecat</option>
								    		<option value="SK6" class="text-box-input">Meninggal</option>
								    		<option value="SK4" class="text-box-input">Skor / Rumahkan</option>
								    		<option value="SK5" class="text-box-input">Cuti</option>
								    	</select>
							        </div>
								</div>
								<div class="row" id="ganti">
							        <div class="col s12">
							        	<input id="ketPengganti" type="text" class="browser-default text-input text-box-input" placeholder="Keterangan Pengganti (Detail)" name="norekpt">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input id="inputTlp" type="text" class="browser-default text-input text-box-input" placeholder="Nomor Telepon Aktif" name="tlpon">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input id="inputTlpLain" type="text" class="browser-default text-input text-box-input" placeholder="Nomor Telepon Keluarga" name="tlpkel">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input id="inputIbu" type="text" class="browser-default text-input text-box-input" placeholder="Ibu Kandung" name="namaibu">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input id="expIdCard" type="text" class="browser-default text-input text-box-input" placeholder="Tgl Exp ID Card" name="expidcard" required>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<select name="nikah" id="inputStatus" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Status Pernikahan</option>
								    		<option value="TK" class="text-box-input">TK</option>
								    		<option value="K0" class="text-box-input">K/0</option>
								    		<option value="K1" class="text-box-input">K/1</option>
								    		<option value="K2" class="text-box-input">K/2</option>
								    		<option value="K3" class="text-box-input">K/3</option>
								    		<option value="K4" class="text-box-input">K/4</option>
								    		<option value="K5" class="text-box-input">K/5</option>
								    		<option value="K6" class="text-box-input">K/6</option>
								    	</select>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<select name="jeka" id="inputJK" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Jenis Kelamin</option>
								    		<option value="1" class="text-box-input">Laki-Laki</option>
								    		<option value="0" class="text-box-input">Perempuan</option>
								    	</select>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<select name="agama" id="inputAgama" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Agama</option>
								    		<option value="ISLAM" class="text-box-input">ISLAM</option>
								    		<option value="KATOLIK" class="text-box-input">KRISTEN-KATOLIK</option>
								    		<option value="PROTESTAN" class="text-box-input">KRISTEN-PROTESTAN</option>
								    		<option value="BUDHA" class="text-box-input">BUDHA</option>
								    		<option value="HINDU" class="text-box-input">HINDU</option>
								    	</select>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<select name="pendidikan" id="inputIlmu" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Pendidikan Terakhir</option>
								    		<option value="TK" class="text-box-input">TK</option>
								    		<option value="SD" class="text-box-input">SD</option>
								    		<option value="SMP" class="text-box-input">SMP</option>
								    		<option value="SMA/K/SEDERAJAT" class="text-box-input">SMA/K/SEDERAJAT</option>
								    		<option value="D3" class="text-box-input">D3</option>
								    		<option value="S1" class="text-box-input">S1</option>
								    		<option value="S2" class="text-box-input">S2</option>
								    		<option value="S3" class="text-box-input">S3</option>
								    	</select>
							        </div>
								</div>
								<div class="row space-box">
							        <div class="col s6 space">
							        	<input id="inputIG" type="text" class="browser-default text-input text-box-input" name="ig" value="www.instagram.com/-">
							        </div>
							        <div class="col s6 space">
							        	<input id="inputFB" type="text" class="browser-default text-input text-box-input" name="fb" value="www.facebook.com/-">
							        </div>
								</div>
								<div class="row space-box">
							        <div class="col s6 space">
							        	<input id="inputEmail" type="email" class="browser-default text-input text-box-input" name="email" placeholder="Email Aktif">
							        </div>
							        <div class="col s6 space">
							        	<input id="inputWA" type="text" class="browser-default text-input text-box-input mb-s" name="wa" placeholder="No. WhatsApp">
										<p>
											<label>
												<input type="checkbox" id="cekwa" class="filled-in">
												<span>Tandai Bila Sesuai No. Tlp</span>
											</label>
										</p>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<textarea name="alamat" id="inputAlamatKtp" class="browser-default text-input text-box-input" placeholder="Alamat KTP" rows="2"></textarea>
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<textarea name="alamatrmh" id="inputAlamatRmh" class="browser-default text-input text-box-input" placeholder="Alamat Domisili" rows="2"></textarea>
							        	<p>
											<label>
												<input type="checkbox" id="cekalamat" class="filled-in">
												<span>Tandai Bila Sesuai KTP</span>
											</label>
										</p>
							        </div>
								</div>
							</div>
							<div class="col s12 m4 l3">
								<div class="row">
							        <p class="attach-text mb-a"><strong>Unggah Lampiran</strong></p>
								</div>
					    		<div class="row space-box">
					    			<div class="space-file">
						    			<label for="upFoto" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Foto</p>
							    		</label>
							    		<input type="file" id="upFoto" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upKtp" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih KTP</p>
							    		</label>
							    		<input type="file" id="upKtp" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upNpwp" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih NPWP</p>
							    		</label>
							    		<input type="file" id="upNpwp" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upKk" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih KK</p>
							    		</label>
							    		<input type="file" id="upKk" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upSkck" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih SKCK</p>
							    		</label>
							    		<input type="file" id="upSkck" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upIjz" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Ijazah</p>
							    		</label>
							    		<input type="file" id="upIjz" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upLc" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Lisensi</p>
							    		</label>
							    		<input type="file" id="upLc" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upSft" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Sertifikat</p>
							    		</label>
							    		<input type="file" id="upSft" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upFakta" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Pakta Integritas</p>
							    		</label>
							    		<input type="file" id="upFakta" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upNaik" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Pengangkatan</p>
							    		</label>
							    		<input type="file" id="upNaik" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upSp" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Peringatan</p>
							    		</label>
							    		<input type="file" id="upSp" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upOut" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Pemberhentian</p>
							    		</label>
							    		<input type="file" id="upOut" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upSehat" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Sehat</p>
							    		</label>
							    		<input type="file" id="upSehat" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upTerlarang" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Pernyataan Bebas Org. Terlarang</p>
							    		</label>
							    		<input type="file" id="upTerlarang" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upRef" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Pernyataan Referensi</p>
							    		</label>
							    		<input type="file" id="upRef" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="upTerima" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih Surat Terima Karyawan</p>
							    		</label>
							    		<input type="file" id="upTerima" name="img[]" class="up-file" accept=".jpg,.jpeg,.png,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
							</div>
					    </div>
					    <div hidden>
							<input type="hidden" class="form-control form-control-sm text-box" name="userinput" id="user" value="<?php echo $dataadmin['username'] ?>" required hidden>
							<input type="hidden" class="form-control form-control-sm text-box" name="pcip" id="ip" value="<?php echo get_client_ip() ?>" required hidden>
						</div>
						<div class="col s12 m8 l9">
							<div class="row right-align to-left mb-a">
								<button class="btn save" type="submit"><i class="material-icons left">save</i>Simpan</button>
							</div>
						</div>
						<?php
						echo form_close();
						?>
					</div>
					<!-- Modal Alert Here -->
					<div id="modal" class="modal">
						<div class="modal-content">
							<h4 id="modal-content"></h4>
						</div>
						<div class="modal-footer">
							<a href="#!" class="modal-close btn save"><i class="material-icons modal-close">close</i></a>
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