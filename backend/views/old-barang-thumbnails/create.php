<?php
use yii\helpers\Html;

$this->title = 'Tambah';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['barang/index']];
$this->params['breadcrumbs'][] = ['label' => $barang->nama, 'url' => ['barang/view', 'id' => $barang->id]];
$this->params['breadcrumbs'][] = ['label' => 'Thumbnails', 'url' => ['barang-thumbnails/index', 'id' => $barang->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="row">
    <div class="col-md-6">
		<div class="panel panel-default">
		    <div class="panel-body">
			    <h2><?= Html::encode($this->title) ?></h2>
			    <?= $this->render('_form', [
			        'model' => $model,
			        'barang' => $barang,
			    ]) ?>
			</div>
		</div>
	</div>
    <div class="col-md-6">
		<div class="panel panel-default">
		    <div class="panel-body">
		    	<h3>Panduan pengisian form</h3>
		    	<ul>
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
		    	</ul>
			</div>
		</div>
	</div>
</div>