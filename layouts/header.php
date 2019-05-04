<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php
				echo $this->setting->website_title
					. ' ' . ucwords($this->setting->sebutan_desa)
					. (($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : '')
					. get_dynamic_title_page_from_path();
			?>
		</title>
		<meta content="utf-8" http-equiv="encoding">
		<meta name="keywords" content="OpenSID,opensid,sid,SID,SID CRI,SID-CRI,sid cri,sid-cri,Sistem Informasi Desa,sistem informasi desa, desa <?php echo $desa['nama_desa'];?>">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:site_name" content="<?php echo $desa['nama_desa'];?>"/>
    <meta name="theme" content="Elenif" />
		<meta name="designer" content="Muhammad Andi Al-rizki" />
		<meta name="theme:designer" content="Muhammad Andi Al-rizki" />
		<meta name="theme:version" content="1.0" />
    <meta property="og:type" content="article"/>

		<?php if(isset($single_artikel)): ?>
	    <meta property="og:title" content="<?php echo $single_artikel["judul"];?>"/>
	    <meta property="og:url" content="<?php echo base_url()?>index.php/first/artikel/<?php echo $single_artikel['id'];?>"/>
	    <meta property="og:image" content="<?php echo base_url()?><?php echo LOKASI_FOTO_ARTIKEL?>sedang_<?php echo $single_artikel['gambar'];?>"/>
	    <meta property="og:description" content="<?php echo potong_teks($single_artikel['isi'], 300)?> ..."/>
			<meta name="description" content="<?php echo potong_teks($single_artikel['isi'], 300)?> ..."/>
	  <?php else: ?>
			<meta name="description" content="Website <?php echo ucwords($this->setting->sebutan_desa).' '.$desa['nama_desa'];?>"/>
		<?php endif; ?>
		
		<?php if(is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
			<link rel="shortcut icon" href="<?php echo base_url()?><?php echo LOKASI_LOGO_DESA?>favicon.ico" />
		<?php else: ?>
			<link rel="shortcut icon" href="<?php echo base_url()?>favicon.ico" />
		<?php endif; ?>
	  
	  <!-- <link type='text/css' href="<?php echo base_url()?>assets/front/css/first.css" rel='Stylesheet' /> -->
    
	  <!-- Styles untuk tema dan penyesuaiannya di folder desa -->
	  <link type="text/css" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/css/bootstrap.min.css' ?>" rel="stylesheet" />
	  <link type="text/css" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/css/core.min.css' ?>" rel="stylesheet" />
	  <link type="text/css" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/css/core-extras.min.css' ?>" rel="stylesheet" />
		<link type="text/css" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/plugins/fontawesome/css/all.min.css' ?>" rel="stylesheet" />
		<link type="text/css" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/plugins/fontawesome/css/fontawesome.min.css' ?>" rel="stylesheet" />

		<link type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" />

		<?php if (count($slide_galeri)>0 OR count($slide_artikel)>0): ?>
			<link rel="stylesheet" href="<?php echo base_url($this->theme_folder.'/'.$this->theme.'/css/owl.carousel.min.css') ?>">
			<link rel="stylesheet" href="<?php echo base_url($this->theme_folder.'/'.$this->theme.'/css/owl.theme.default.min.css') ?>">
	  <?php endif; ?>
	  <link rel="stylesheet" href="<?= base_url("assets/css/leaflet.css")?>">
	  <link rel="stylesheet" href="<?= base_url($this->theme_folder.'/'.$this->theme.'/plugins/jssocial/css/jssocials.css') ?>">
		<link rel="stylesheet" href="<?= base_url($this->theme_folder.'/'.$this->theme.'/plugins/jssocial/css/jssocials-theme-flat.css') ?>">
	  <link type="text/css" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme.'/css/elenif.css?live='.time() ?>" rel="stylesheet" />
	</head>
	<body class="bg-default">
		<div class="header-top">
			<div class="header-mid" style="margin-bottom: 0">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="logo">
								<img src="<?= LogoDesa($desa['logo']) ?>" alt="<?= ucfirst($this->setting->sebutan_desa).' '.ucwords($desa['nama_desa']) ?>" class="img-fluid">
							</div>
							<div class="detail">
								<span>
									Pemerintah <?= ucfirst($this->setting->sebutan_desa).' '.ucwords($desa['nama_desa']) ?>
								</span>
								<span>
									<?= ucfirst($this->setting->sebutan_kecamatan_singkat) ?>
									<?= ucwords($desa['nama_kecamatan']) ?>
									<?= ucfirst($this->setting->sebutan_kabupaten_singkat) ?>
									<?= ucwords($desa['nama_kabupaten']) ?>,
									<?= ucwords($data_config['nama_propinsi']) ?>,
									Indonesia
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<header class="bg-navbar">
			<div class="container">
	      <!-- Navigation -->
				<?php $this->load->view($folder_themes.'/partials/menu.tpl.php');?>
	      <!-- / Navigation -->
	    </div> <!-- .container -->

	  </header>
	  <?php 
			if(count($teks_berjalan)>0){
				$this->load->view($folder_themes.'/layouts/teks_berjalan.php');
			} 
		?>
