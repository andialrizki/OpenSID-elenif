<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="main-content">
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body album">
						<?php if($gallery) : ?>
							<div class="galeri-wrapper">
								<?php foreach($gallery as $data) : ?>
									<?php if(is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])) : ?>
										<a href="<?= AmbilGaleri($data['gambar'],'sedang') ?>" class="item-foto" data-fancybox="images" data-caption="<?= $data['nama'] ?>">
											<img src="<?= AmbilGaleri($data['gambar'],'kecil') ?>" alt="<?= $data['nama'] ?>" class="img-fluid" title="<?= $data['nama'] ?>">
										</a>
									<?php endif ?>
								<?php endforeach ?>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<?php $this->load->view($folder_themes.'/partials/side.right.php'); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view($folder_themes. '/layouts/footer.php'); ?>