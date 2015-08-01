<?php
use common\models\Url;
use yii\helpers\Html;

$this->title = $kategori->nama;

// Breadcrumbs berdasarkan hirarki kategorinya
$nested_kategori = [];
while (isset($kategori->parent)) {
	$kategori = $kategori->parent;
	$nested_kategori[] = ['label' => $kategori->nama, 'url' => ["/".$kategori->url->url]];
}
$index = count($nested_kategori);
while($index) {
	$this->params['breadcrumbs'][] = $nested_kategori[--$index];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<h3>Barang-barang Pada Kategori <?= ucfirst($this->title) ?></h3><hr>
<?php if (count($sub_kategori) > 0) { ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Sub Kategori <?= ucfirst($kategori->nama) ?></div>
			<div class="panel-body">
				<?php
				foreach ($sub_kategori as $sub) {
					echo Html::a($sub->nama, ['/'.$sub->url->url], ['class' => 'btn btn-success btn-xs']) . ' ';
				}
				?>
			</div>
		</div>		
	</div>
</div>
<?php } ?>
<div class="row">
	<?php
	foreach($barangs as $barang){
	$url_barang = Url::find()->where(['jenis' => 'b', 'data_id' => $barang->id])->one();
	?>
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail" style="min-height: 350px;">
			<img src="images/barang/mac.jpg" alt="barang">
			<div class="caption">
				<h3><?= $barang->nama ?></h3>
				<p>Rp. <?= $barang->harga_normal ?><br>
				Kategori: <?= Html::a($barang->kategori->nama, ['/'.$barang->kategori->url->url]) ?></p>
				<p><a href="#" class="btn btn-primary btn-xs" role="button">Add to cart</a>
				<a href="<?= $url_barang->url; ?>" class="btn btn-default btn-xs" role="button">Detail</a></p>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
