<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="main-content">
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-8">
				<?php if($single_artikel["id"]) : ?>
					<div class="card artikel" id="<?= 'artikel-'.$single_artikel['judul']?>">
						<div class="card-body">
							<h4 class="h4"><?= $single_artikel["judul"]?></h4>
							<hr>
							<p class="text-muted">
								<i class="fa fa-clock-o mr-1"></i> <span class="mr-2"><?= tgl_indo2($single_artikel['tgl_upload']);?></span>
								<i class="fa fa-user mr-1"></i> <span class="mr-2"><?= $single_artikel['owner']?></span>
								<?php if (trim($single_artikel['kategori']) != '') : ?>
									<i class='fa fa-tag mr-1'></i> <a href="<?= site_url('first/kategori/'.$single_artikel['id_kategori'])?>" class="text-muted"><?= $single_artikel['kategori']?></a>
								<?php endif; ?>
							</p>
							<hr>
							<?php if($single_artikel['gambar']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$single_artikel['gambar'])): ?>
								<figure>
									<img src="<?= AmbilFotoArtikel($single_artikel['gambar'],'sedang')?>" class="img-fluid">
								</figure>
							<?php endif; ?>
							<article class="mt-2"><?= $single_artikel["isi"]?></article>

							<?php	if($single_artikel['dokumen']!='' and is_file(LOKASI_DOKUMEN.$single_artikel['dokumen'])): ?>
								<div class="bg-light px-3 py-2 mb-2" style="border-left: 2px solid #007bff">
									<span class="font-weight-bold">Lampiran :</span> <a href="<?= base_url().LOKASI_DOKUMEN.$single_artikel['dokumen']?>" title=""><?= $single_artikel['link_dokumen']?></a>
								</div>
							<?php endif; ?>
							<?php if($single_artikel['gambar1']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$single_artikel['gambar1'])): ?>
								<figure>
									<img src="<?= AmbilFotoArtikel($single_artikel['gambar1'],'sedang')?>" class="img-fluid">
								</figure>
							<?php endif; ?>
							<?php if($single_artikel['gambar2']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$single_artikel['gambar2'])): ?>
								<figure>
									<img src="<?= AmbilFotoArtikel($single_artikel['gambar2'],'sedang')?>" class="img-fluid">
								</figure>
							<?php endif; ?>
							<?php if($single_artikel['gambar3']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$single_artikel['gambar3'])): ?>
								<figure>
									<img src="<?= AmbilFotoArtikel($single_artikel['gambar3'],'sedang')?>" class="img-fluid">
								</figure>
							<?php endif; ?>
							<div id="share" class="my-3 py-3 text-center" style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd"></div>

							<?php if(is_array($komentar)) : ?>
							<?php 
							$kdt = array();
							foreach ($komentar as $data) {
								if ($data['enabled'] == 1) {
									array_push($kdt, $data);
								}
							}
							?>
							<?php if(count($kdt) > 0) : ?>
								<div class="py-2 pl-4 bg-light align-middle d-flex align-items-center" style="border-left: 2px solid #007bff">
									<div class="h6 m-0"><?= count($kdt) ?> Komentar atas artikel <?= $single_artikel["judul"]?></div>
								</div>
								<div class="direct-chat-messages">
									<?php foreach($kdt as $data) : ?>
										<div class="direct-chat-msg">
		                  <div class="direct-chat-info clearfix">
		                    <a href="javascript:void(0)" class="direct-chat-name float-left"><?= $data['owner'] ?></a>
		                    <span class="direct-chat-timestamp float-right"><i class="fa fa-clock-o mr-1"></i> <?= tgl_indo2($data['tgl_upload']); ?></span>
		                  </div>
		                  <div class="direct-chat-img">
		                  	<i class="fa fa-user fa-lg p-2 rounded-circle bg-light"></i>
		                  </div>
		                  <div class="direct-chat-text">
		                    <?= $data['komentar'] ?>                 
		                  </div>
		                </div>
									<?php endforeach ?>
								</div>
								<hr>
							<?php endif ?>
						<?php endif ?>
							<div class="form-group group-komentar" id="kolom-komentar">
								<?php if($single_artikel['boleh_komentar']): ?>
									<div class="card shadow-sm border border-default">
										<div class="card-header py-2 px-3 mb-2">
											<div class="h6 m-0 py-2"><i class="fa fa-comments mr-1"></i>	Formulir Komentar</div>
										</div>
										<!-- Tampilkan hanya jika 'flash_message' ada -->
										<?php $label = !empty($_SESSION['validation_error']) ? 'alert-danger' : 'alert-success'; ?>
										<?php if ($flash_message): ?>
											<div class="card-header alert <?= $label?> mx-2"><?= $flash_message?></div>
											<?php unset($_SESSION['validation_error']); ?>
										<?php endif; ?>
										<div class="card-body py-3 px-3">
											<form id="form-komentar" name="form" action="<?= site_url('first/add_comment/'.$single_artikel['id'])?>" method="POST" onSubmit="return validasi(this);">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Nama<span class="text-danger">*</span></label>
													<div class="col-lg-9">
														<input class="form-control input-sm" type="text" required name="owner" maxlength="30" value="<?= !empty($_SESSION['post']['owner']) ? $_SESSION['post']['owner'] : $_SESSION['nama'] ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">No. HP<span class="text-danger">*</span></label>
													<div class="col-lg-9">
														<input class="form-control input-sm" type="text" required placeholder="" name="no_hp" maxlength="30" value="<?= $_SESSION['post']['no_hp']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Alamat email</label>
													<div class="col-lg-9">
														<input class="form-control input-sm" type="text" placeholder="" name="email" maxlength="30" value="<?= $_SESSION['post']['email']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Komentar<span class="text-danger">*</span></label>
													<div class="col-lg-9">
														<textarea class="form-control" rows="5" required name="komentar"><?= $_SESSION['post']['komentar'] ?></textarea>
													</div>
												</div>
												<div class="row">
													<div class="offset-lg-3 col-lg-9">
														<img id="captcha" src="<?= base_url('securimage/securimage_show.php') ?>" alt="CAPTCHA Image"/ class="img-fluid border border-black">
													</div>
												</div>
												<div class="row mb-2">
													<div class="offset-lg-3 col-lg-9">
														<a href="#!" onclick="document.getElementById('captcha').src = '<?= base_url("securimage/securimage_show.php?")?>'+Math.random(); return false"><small>[ Ganti Gambar ]</small></a>
													</div>
												</div>
												<div class="row">
													<div class="offset-lg-3 col-lg-9">
														<input class="form-control input-sm" type="text" required name="captcha_code" maxlength="6" value="<?= $_SESSION['post']['captcha_code'] ?>"/>
														<span class="d-block">
															Isikan kode di gambar
														</span>
													</div>
												</div>
												<div class="row">
													<div class="offset-lg-3 mt-3 col-lg-10">
														<button class="btn btn-primary btn-md" type="submit"><i class="fa fa-check-circle mr-2"></i> KIRIM KOMENTAR</button><br>
														<small class="font-weight-light font-italic">(Komentar baru terbit setelah disetujui Admin)</small>
													</div>
												</div>
											</form>
										</div>
									</div>
								<?php else: ?>
									<span class="d-block alert alert-warning px-2 py-3"><i class="fa fa-exclamation-triangle pl-1 pr-2"></i> Komentar untuk artikel ini telah ditutup.</span>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php else: ?>
					<div class="artikel" id="artikel-blank">
						<div class="card">
							<div class="card-header bg-danger text-white"><h4 class="h4 mb-1 text-white">Maaf, data tidak ditemukan</h4></div>
							<div class="card-body">
								Anda telah terdampar di halaman yang datanya tidak ada lagi di web ini. Mohon periksa kembali, atau laporkan kepada kami.
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-md-4">
				<?php $this->load->view($folder_themes.'/partials/side.right.php'); ?>
			</div>
		</div>
	</div>
	<?php $this->load->view($folder_themes. '/layouts/footer.php'); ?>
	<script>
		$("#share").jsSocials({
			showLabel: false,
  		showCount: false,
			shares: ["email", "twitter","facebook", "googleplus", "line", "whatsapp"],
			shareIn: 'blank'
		});
	</script>
</div>