<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <link rel="shortcut icon" href="<?php echo base_url('assets/img/gatfav.ico');?>">
	    <link rel="stylesheet" href="<?php echo base_url('assets/css/materialize_hrd_login.css');?>">
	    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css');?>">

	    <title>HRD GATRANS</title>
  	</head>
  	<body>
	    <div class="container">
	    	<div class="row">
				<div class="col s12 m5 push-m9" id="box">
					<div class="row">
				        <div class="col s12 mb">
				        	<img src="<?php echo base_url('assets/img/bg-gat-login.png');?>" alt="logo-gatrans" class="responsive-img">
				        </div>
					</div>
					<div class="row">
				        <div class="col s12 mb">
				        	<img src="<?php echo base_url('assets/img/bg-text-log.png');?>" alt="deskripsi" class="responsive-img">
				        </div>
					</div>
					<?php
						echo form_open('log-check');
					?>
					<div class="row">
				        <div class="input-field col s12 space">
				        	<input id="username" type="text" class="validate" name="akunuser" required autofocus>
							<label for="username">USERNAME</label>
							<span class="helper-text" data-error="Tidak Boleh Kosong"></span>
				        </div>
					</div>
					<div class="row">
				        <div class="input-field col s12">
				        	<input id="password" type="password" class="validate" name="passuser" required>
							<label for="password">PASSWORD</label>
							<span class="helper-text" data-error="Tidak Boleh Kosong"></span>
				        </div>
					</div>
					<button class="btn white" type="submit"><span class="login-text">Login</span></button>
					<?php
						echo form_close();
					?>
				</div>
			</div>
	    </div>
	    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
	    <script type="text/javascript" src="<?php echo base_url('assets/js/materialize.js');?>"></script>
	    <script type="text/javascript" src="<?php echo base_url('assets/js/login.js');?>"></script>
	</body>
</html>