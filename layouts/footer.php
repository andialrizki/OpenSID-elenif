<footer>
	<div class="container mt-3 mb-1">
		<div class="row mb-3">
			<div class="col-md-4 col-sm-6 col-12 text-left mb-3">
				<span class="d-block font-weight-bold">TENTANG</span>
				<span class="text-muted"><?= ucfirst($this->setting->sebutan_desa).' '.ucwords($desa['nama_desa']) ?> adalah desa yang terletak di </span>
				<span class="text-muted">
					<?= ucfirst($this->setting->sebutan_kecamatan) ?>
					<?= ucwords($desa['nama_kecamatan']) ?>, 
					<?= ucfirst($this->setting->sebutan_kabupaten) ?>
					<?= ucwords($desa['nama_kabupaten']) ?>, Propinsi
					<?= ucwords($data_config['nama_propinsi']) ?>.
				</span>
				<span class="text-muted">
					Kantor Desa Beralamat di <?= ucfirst($desa['alamat_kantor']) ?>, <?= ucwords($desa['nama_desa']) ?>
				</span>
			</div>
			<div class="col-md-4 col-sm-6 col-12 text-left mb-3">
				<span class="d-block font-weight-bold mb-1">KATEGORI</span>
				<a href="<?= site_url('first/kategori/1') ?>" class="item-kategori badge badge-outline-primary">Berita Desa</a> 
				<a href="<?= site_url('first/kategori/2') ?>" class="item-kategori badge badge-outline-primary">Produk</a> 
				<a href="<?= site_url('first/kategori/4') ?>" class="item-kategori badge badge-outline-primary">Agenda</a> 
				<a href="<?= site_url('first/kategori/5') ?>" class="item-kategori badge badge-outline-primary">Peraturan</a> 
				<a href="<?= site_url('first/kategori/6') ?>" class="item-kategori badge badge-outline-primary">Laporan</a>
				<a href="<?= site_url('first/kategori/8') ?>" class="item-kategori badge badge-outline-primary">Panduan Layanan</a>
			</div>
			<div class="col-md-4 col-sm-12 col-12 mb-3 text-left">
				<span class="d-block font-weight-bold">DATA STATISTIK</span>
				<?php foreach($menu_atas[nested_array_search(24, $menu_atas)]['submenu'] as $data) : ?>
					<a href="<?= $data['link'] ?>" class="item-kategori badge badge-outline-primary"><?= $data['nama'] ?></a> 
				<?php endforeach ?>	
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="col-12 mt-2 mb-0">
					<a href="<?= site_url('siteman') ?>" class="font-weight-bold p-2" style="letter-spacing: 1px; border-bottom: 1px solid #ddd;">LOGIN ADMIN</a>
				</div>
				<div class="copyright text-muted mt-3">
					<span>Tema <a href="https://github.com/andialrizki/OpenSID-elenif" target="_blank">Elenif</a> oleh <a href="https://andialrizki.github.io" target="_blank">Muhammad Andi Al-rizki</a></span>
					<span>Bermesin <a href="https://github.com/OpenSID/OpenSID" target="_blank">OpenSID</a> <?= AmbilVersi(); ?> yang dikembangkan oleh <a href="https://www.facebook.com/groups/OpenSID" target="_blank">Komunitas OpenSID</a></span>	
					<span>&copy; <?= date('Y') ?> - All Right Reserved.</span>
				</div>
			</div>
		</div>
	</div>
</footer>