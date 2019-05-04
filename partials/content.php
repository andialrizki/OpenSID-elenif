<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="main-content">
	<?php if (count($slide_galeri)>0 OR count($slide_artikel)>0): ?>
		<?php $this->load->view($folder_themes."/layouts/slider.php") ?>
	<?php endif; ?>
	<?php if(empty($judul_kategori)): ?>
		<div class="services-area pt-5 pb-5">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                 <div class="section-headline text-center mb-2">
		                    <h3 class="text-white">INFORMASI DESA</h3>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		       		<div class="col-sm-3 col-12">
		                <div class="single-services">
		                    <a class="service-images" href="<?= site_url('first/kategori/1') ?>">
		                        <i class="fa fa-newspaper-o"></i>
		                    </a>
		                    <div class="service-content mt-4">
		                        <h4><a href="<?= site_url('first/kategori/1') ?>">Berita</a></h4>
		                    </div>
		                </div>
		          </div>
		          <div class="col-sm-3 col-12">
		              <div class="single-services">
		                  <a class="service-images" href="<?= site_url('first/kategori/5') ?>">
		                      <i class="fa fa-legal"></i>
		                  </a>
		                  <div class="service-content mt-4">
		                      <h4><a href="<?= site_url('first/kategori/5') ?>">Peraturan</a></h4>
		                  </div>
		              </div>
		          </div>
		          <div class="col-sm-3 col-12">
		              <div class="single-services">
		                  <a class="service-images" href="<?= site_url('first/kategori/2') ?>">
		                      <i class="fa fa-book"></i>
		                  </a>
		                  <div class="service-content mt-4">
		                      <h4><a href="<?= site_url('first/kategori/2') ?>">Produk</a></h4>
		                  </div>
		              </div>
		          </div>
		          <div class="col-sm-3 col-12">
		              <div class="single-services">
		                  <a class="service-images" href="<?= site_url('first/kategori/6') ?>">
		                     <i class="fa fa-line-chart"></i>
		                  </a>
		                  <div class="service-content mt-4">
		                    <h4><a href="<?= site_url('first/kategori/6') ?>">Laporan</a></h4>
		                  </div>
		              </div>
		          </div>
		        </div>
		    </div>
		</div>
	<?php endif; ?>
	<?php if ($headline): ?>
		<?php $abstrak_headline = potong_teks($headline['isi'], 300) ?>
		<div class="container mt-4">
			<div class="col-12">
				<div class="headline">
					<div class="jumbotron jumbotron-fluid">
						<div class="d-flex justify-content-between">
							<?php if(is_file(LOKASI_FOTO_ARTIKEL .'kecil_'.$headline['gambar'])) : ?>
								<div class="headline-gambar d-none d-lg-block">
									<img src="<?= AmbilFotoArtikel($headline['gambar'], 'kecil') ?>" alt="<?= $headline['judul'] ?>" title="<?= $headline['judul'] ?>" class="img-fluid">
								</div>
							<?php endif ?>
							<div class="headline-berita">
								<h2 class="judul-artikel"><a href="<?= site_url('first/artikel/'.$headline[id]); ?>"><?= $headline['judul'] ?></a></h2>
									<p><?= $abstrak_headline ?>...</p>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!--
	 List Konten
	 -->
	<?php $title = (!empty($judul_kategori))? $judul_kategori : "Artikel Terkini" ?>

	<?php if (is_array($title)): ?>
		<?php foreach ($title as $item): ?>
			<?php $title= $item ?>
		<?php endforeach; ?>
	<?php endif; ?>
	<div class="container-fluid">
		<div class="row">
		<div class="col-12 p-5">
			<h4 class="card-title text-secondary mb-3 text-center">
				<?= $title ?>
			</h4>
			<div class="row">
				<div class="col-12">
					<?php if ($artikel): ?>
						<div class="card-columns">
							<?php foreach ($artikel as $data): ?>
								<?php $abstrak = potong_teks($data['isi'], 300) ?>
								<div class="card">
									<div class="card-image">
										<a href="<?= site_url("first/artikel/$data[id]") ?>">
											<?php if ($data['gambar']!=''): ?>
												<?php if (is_file(LOKASI_FOTO_ARTIKEL."kecil_".$data['gambar'])): ?>
													<img src="<?= AmbilFotoArtikel($data['gambar'],'kecil') ?>" class="card-img-top" alt="<?= $data["judul"] ?>"/>
												<?php else: ?>
													<img src="<?= base_url('assets/images/404-image-not-found.jpg') ?>" class="card-img-top" alt="<?= $data["judul"] ?>" />
												<?php endif;?>
											<?php endif; ?>
										</a>
									</div>
						      <div class="card-body p-3">
						      	<div style="border-bottom: 1px solid #eee" class="mb-2">
							      	<a href="<?= site_url("first/artikel/$data[id]") ?>" class="h6 mb-2"><?= $data["judul"] ?></a>
										</div>
										<?php if (trim($data['kategori']) != ''): ?>
											<a href="<?= site_url('first/kategori/'.$data['id_kategori']) ?>" class="badge badge-primary">#<?= $data['kategori'] ?></a></span><br>
										<?php endif; ?>
										<?= $abstrak ?>
									</div>
									<div class="card-footer px-3">
							      <small class="text-muted">
							      	<i class="fa fa-clock-o mr-1"></i> <?= tgl_indo2($data['tgl_upload']) ?> oleh <span class="font-italic"><?= $data['owner'] ?></span>
							      </small>
							    </div>
							  </div>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<div class="text-center"><h3 class="h3">Maaf, belum ada data</h3></div>
						<div class="text-center">
							<p>Belum ada artikel yang dituliskan dalam <?= $title ?></p>
							<p>Silakan kunjungi situs web kami dalam waktu dekat.</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		</div>
	</div>
	<?php if ($artikel): ?>
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<ul class="pagination justify-content-center mb-1">
						<?php if ($paging->start_link): ?>
							<li class="page-item"><a href="<?= site_url("first/".$paging_page."/$paging->start_link" . $paging->suffix) ?>" class="page-link" title="Halaman Pertama"><i class="fa fa-fast-backward"></i>&nbsp;</a></li>
						<?php endif; ?>
						<?php if ($paging->prev): ?>
							<li class="page-item"><a href="<?= site_url("first/".$paging_page."/$paging->prev" . $paging->suffix) ?>" class="page-link" title="Halaman Sebelumnya"><i class="fa fa-backward"></i>&nbsp;</a></li>
						<?php endif; ?>

						<?php foreach ($pages as $i): ?>
							<li <?= ($p == $i) ? 'class="page-item active"' : "" ?>>
								<a href="<?= site_url("first/".$paging_page."/$i" . $paging->suffix) ?>" class="page-link" title="Halaman <?= $i ?>"><?= $i ?></a>
							</li>
						<?php endforeach; ?>

						<?php if ($paging->next): ?>
							<li class="page-item"><a href="<?= site_url("first/".$paging_page."/$paging->next" . $paging->suffix) ?>" class="page-link" title="Halaman Selanjutnya"><i class="fa fa-forward"></i>&nbsp;</a></li>
						<?php endif; ?>
						<?php if ($paging->end_link): ?>
							<li class="page-item"><a href="<?= site_url("first/".$paging_page."/$paging->end_link" . $paging->suffix) ?>" class="page-link" title="Halaman Terakhir"><i class="fa fa-fast-forward"></i>&nbsp;</a></li>
						<?php endif; ?>
					</ul>
					<p>Halaman <?= $p ?> dari <?= $paging->end_link ?></p>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if(empty($judul_kategori)): ?>
		<?php if($w_gal) : ?>
			<div class="services-area bg-primary pt-5 pb-5">
		    <div class="container">
		      <div class="row">
		        <div class="col-12">
		          <div class="section-headline text-center mb-5">
		            <h3 class="text-white">GALERI</h3>
		          </div>
		        </div>
		      </div>
		      <div class="row">
		      	<div class="col-12">
							<div class="galeri-wrapper">
								<?php foreach(array_slice($w_gal, 0, 8) as $data) : ?>
									<?php if(is_file(LOKASI_GALERI . "kecil_" . $data['gambar'])) : ?>
										<?php $link = site_url('first/sub_gallery/'.$data['id']) ?>
										<a href="<?= $link ?>" class="item-foto">
											<img src="<?= AmbilGaleri($data['gambar'],'kecil') ?>" alt="<?= $data['nama'] ?>" class="img-fluid" title="<?= $data['nama'] ?>">
										</a>
									<?php endif ?>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>
		<div class="apbdes pt-5 pb-5" style="background: #343a40">
			<div class="container">
				<div class="col-12 px-0">
					<div class="row widget mx-auto justify-content-center">
						<div class="col-lg-4 px-1 px-lg-3 mb-3">
							<div class="card">
								<div class="card-header bg-primary">
									<h4 class="card-title text-white mb-1">Anggaran Tahun 2019</h4>
								</div>
								<div class="card-body">
									<div class="mb-2">
										<span class="small font-weight-bold">Pendapatan Asli Desa</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp2.027.234,-</span><span>0,10%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:0.10%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Alokasi Dana Desa</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp810.320.900,-</span><span>41,38%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:41.38%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Dana Desa</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp930.500.000,-</span><span>47,51%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:47.51%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Bagi Hasil Pajak & Retribusi Daerah (PBH)</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp32.235.400,-</span><span>1,64%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:1.64%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Pendapatan Lain-Lain</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp1.929.850,-</span><span>0,09%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:0.09%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">SILPA Tahun Sebelumnya</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp183.131.404,-</span><span>9,35%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:9.35%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Total Pendapatan 2019</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp1.958.214.938,-</span><span>100%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-info progress-bar-animated" style="width:100%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 px-1 px-lg-3 mb-3">
							<div class="card">
								<div class="card-header bg-danger">
									<h4 class="card-title text-white mb-1">APBDes Tahun 2018</h4>
								</div>
								<div class="card-body">
									<div class="mb-2">
										<span class="small font-weight-bold">Perkiraan Bunga Bank</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp1.031.928,-</span><span>0,06%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:0.06%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Alokasi Dana Desa</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp762.338.900,-</span><span>47,21%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:47.21%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Dana Desa</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp792.869.000,-</span><span>49,10%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:49.10%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Bagi Hasil Pajak & Retribusi Daerah (PBH)</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp49.632.100,-</span><span>1,64%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:1.64%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Pendapatan Lain-Lain</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp8.644.116,-</span><span>3,07%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:3.07%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">SILPA Tahun Sebelumnya</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp6.683.956,-</span><span>0,41%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:0.41%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Total APBDes 2018</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp1.621.200.000,-</span><span>100%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-info progress-bar-animated" style="width:100%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 px-1 px-lg-3 mb-3">
							<div class="card">
								<div class="card-header bg-warning">
									<h4 class="card-title text-white mb-1">Realisasi APBDes 2018</h4>
								</div>
								<div class="card-body">
									<div class="mb-2">
										<span class="small font-weight-bold">Penyelenggaraan Pemerintahan Desa</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp578.096.393,-</span><span>90,04%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:90.04%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Pelaksanaan Pembangunan Desa</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp494.994.125,-</span><span>95,77%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:95.77%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Pembinaan Kemasyarakatan</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp94.195.800,-</span><span>69,98%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:69.98%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Pemberdayaan Masyarakat</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp196.680.200,-</span><span>77,81%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:77.81%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Bidang Tak Terduga</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp0</span><span>0%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:0.0%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Pengeluaran Pembiayaan (SIL)</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp75.000.000,-</span><span>100%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width:100%"></div>
										</div>
									</div>
									<div class="mb-2">
										<span class="small font-weight-bold">Total Realisasi APBDes 2018</span>
										<div class="d-flex justify-content-between w-100 pb-2 small">
											<span>Rp1.438.966.518,-</span><span>88,75%</span>
										</div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped bg-info progress-bar-animated" style="width:88.75%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
