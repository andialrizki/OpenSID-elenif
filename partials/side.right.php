<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="card mb-3">
	<div class="card-body p-3">
	<form method=get action="<?php echo site_url('first');?>">
		<div class="input-group with-addon-icon-left mb-1">
      <input type="text" name="cari" class="form-control" placeholder="Cari artikel..." value="<?= html_escape($_GET['cari']); ?>" required=""> 
      <span class="input-group-append">
        <button class="btn input-group-text">
          <i class="fa fa-search"></i>
        </button>
      </span>
    </div>
	</form>
	</div>
</div>

<!-- Tampilkan Widget -->
<?php

if($w_cos){
	$arr = [
		'box' => 'card',
		'class="card ' => 'class="card mb-3 card-widget ',
		'card-body' => 'card-body p-2 ',
		'card-title' => 'card-title h5 m-0  text-white',
		'card-header' => 'card-header bg-primary px-3 py-3'];
	foreach($w_cos as $data){
		if($data["jenis_widget"] == 1){
			echo str_replace(array_keys($arr), array_values($arr), $this->load->view("widgets/".trim($data['isi']), null, true));
		} elseif($data["jenis_widget"] == 2){
			include(LOKASI_WIDGET.trim($data['isi']));
		} else {
			?>
			<div class="card">
				<div class="card-header">
					<h3 class="card-title"><?= strip_tags($data['judul']) ?></h3>
				</div>
				<div class="card-body">
					<?= html_entity_decode($data['isi'])  ?>
				</div>
			</div>
			<?php
		}
	}
}

?>
