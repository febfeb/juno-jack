<?php
use common\models\Url;

$this->title = $barang->nama;

// Breadcrumbs berdasarkan hirarki kategorinya
$kategori = $barang->kategori;
$nested_kategori = [];
$nested_kategori[] = ['label' => $kategori->nama, 'url' => ["/".$kategori->url->url]];
while (isset($kategori->parent)) {
	$kategori = $kategori->parent;
	$nested_kategori[] = ['label' => $kategori->nama, 'url' => ["/".$kategori->url->url]];
}
$index = count($nested_kategori);
while($index) {
	$this->params['breadcrumbs'][] = $nested_kategori[--$index];
}
$this->params['breadcrumbs'][] = $this->title;

$url_barang = Url::find()->where(['jenis' => 'b', 'data_id' => $barang->id])->one();
?>
<h3><?= $barang->nama ?></h3>
<hr>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				Gambar Thumbnails: <?= $barang->barangThumbnailsCount ?><hr>
				<img src="images/barang/mac.jpg" alt="barang">
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				Informasi produk:<hr>
				Nama: <?= $barang->nama ?><br>
				Kode: <?= $barang->kode ?><br>
				Warna: <?= $barang->warna ?><br>
				Review: <?= $barang->review ?><br>
				Kelompok: <?= $barang->kelompok ?><br>
				Harga Beli: <?= $barang->harga_beli ?><br>
				Harga Normal: <?= $barang->harga_normal ?><br>
				Harga Promo: <?= $barang->harga_promo ?><br>
				Kategori: <?= $barang->kategori->nama ?><br>
				Overview 1: <?= $barang->overview_1 ?><br>
				Overview 2: <?= $barang->overview_2 ?><br>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				Add to cart<hr>
				<p><a href="#" class="btn btn-primary btn-xs" role="button">Add to cart</a>
				<a href="<?= $url_barang->url; ?>" class="btn btn-default btn-xs" role="button">Detail</a></p>
			</div>
		</div>
	</div>
</div>
