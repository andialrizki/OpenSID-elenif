<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
	function tampil_artikel(id_artikel){
		href = window.location.href;
		first = '/first';
		url = href.substring(0,href.indexOf(first)+first.length)+'/artikel/'+id_artikel;
		window.location = url;
	}
</script>
<section class="slider">
	<div class="owl-carousel owl-theme" id="head-slider">
		<?php foreach ($slider_gambar['gambar'] as $gambar) : ?>
	  	<?php if(is_file($slider_gambar['lokasi'].'sedang_'.$gambar['gambar'])) : ?>
	  		<div class="item">
	  			<img data-src="<?php echo base_url().$slider_gambar['lokasi'].'sedang_'.$gambar['gambar']?>" class="img-fluid owl-lazy">
			  </div>
		   <?php endif; ?>
	   <?php endforeach; ?>
	</div>
</section>