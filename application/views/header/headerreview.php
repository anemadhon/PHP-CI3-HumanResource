<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="shortcut icon" href="<?php echo base_url('assets/img/gatfav.ico');?>">
	    <link rel="stylesheet" href="<?php echo base_url('assets/css/materialize_hrd.css');?>">
	    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles_.css');?>">
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	    <title>HRD GATRANS</title>
  	</head>
  	<body>
  		<div class="navbar-fixed">
	        <nav class="white nav-bg">
		        <div class="nav-wrapper">
					<a href="#!" class="brand-logo left"><img src="<?php echo base_url('assets/img/gatlogo.png');?>" alt="logo-gatrans" class="responsive-img gat-logo"></a>
					<a href="#!" class="brand-logo right hide-on-med-and-down"><img src="<?php echo base_url('assets/img/text-hrd.png');?>" alt="hrd-header" class="responsive-img hrd-img"></a>
					<a href="#!" data-target="mobile" class="sidenav-trigger right"><i class="icon-space material-icons black-text">menu</i></a>
		        </div>
	        </nav>
	    </div>
		<ul class="sidenav" id="mobile">
			<li>
				<div class="user-view">
					<div class="background navbar-color"></div>
					<img class="responsive-img" src="<?php echo base_url('assets/img/text-hrd.png');?>">
				</div>
			</li>
			<li><div class="divider"></div></li>
			<li><a href="<?php echo site_url('datauser');?>"><i class="material-icons">account_circle</i><?php echo $dataadmin['username'] ?></a></li>
			<li><div class="divider"></div></li>
			<li><div class="mb-a"></div></li>
			<li><div class="divider"></div></li>
			<li class="grey lighten-1"><a href="<?php echo site_url('input');?>"><i class="material-icons">folder_shared</i>Basis Data</a></li>
			<li><div class="divider"></div></li>
			<?php if ($dataadmin['username'] == 'Kang Randi' || $dataadmin['username'] == '@anemadhon' || $dataadmin['username'] == 'Faisal G'){ ?>
			<li class="grey lighten-1"><a href="<?php echo site_url('gaji');?>"><i class="material-icons">monetization_on</i>Slip</a></li>
			<li><div class="divider"></div></li>
			<?php } ?>
			<li class="grey lighten-1"><a href="<?php echo site_url('akta');?>"><i class="material-icons">assignment</i>Legalitas</a></li>
			<li><div class="divider"></div></li>
			<li class="grey lighten-1"><a href="<?php echo site_url('tp');?>"><i class="material-icons">group_work</i>Traine Program</a></li>
			<li><div class="mb-b"></div></li>
			<li><div class="divider"></div></li>
			<li class="grey lighten-1"><a href="<?php echo site_url('logout');?>"><i class="material-icons">assignment_return</i>Keluar</a></li>
		</ul>