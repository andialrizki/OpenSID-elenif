<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<nav class="navbar navbar-expand-lg navbar-light px-0">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <div class="main-menu mx-auto">

      <ul class="navbar-nav">
        <li class="<?php echo ($this->uri->uri_string() == "first"?"active":'') ?>">
          <a class="pagess" href="<?php echo site_url('first') ?>">Beranda <span class="sr-only">(current)</span></a>
        </li>
        <?php foreach($menu_atas as $data){ ?>
  				<li class="dropdown">
  					<a class="pagess dropdown-toggle" data-toggle="dropdown" href="<?php echo $data['link']?>" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $data['nama']; //if(count($data['submenu'])>0) { echo "<span class='caret'></span>"; } ?>
  					</a>
  					<?php if(count($data['submenu'])>0): ?>
  						<div class="dropdown-menu">
  							<?php foreach($data['submenu'] as $submenu): ?>
  								<a class="dropdown-item" href="<?php echo $submenu['link']?>"><?php echo $submenu['nama']?></a>
  							<?php endforeach; ?>
  						</div>
  					<?php endif; ?>
  				</li>
  			<?php }?>
      </ul>
    </div>
  </div>
</nav>
