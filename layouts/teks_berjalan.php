<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container px-0">
	<div style="background-color: #E7E7E7!important; color: #848688; height: 30px;" class="marquee">
		<?php foreach($teks_berjalan AS $data) {?>
			<span><?php echo $data['isi']?></span>  &nbsp; &nbsp; &middot; &nbsp; 
		<?php }?>
	</div>
</div>
