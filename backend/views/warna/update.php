<?php
use yii\helpers\Html;

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Toko', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['barang/view', 'id' => $model->id]];
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
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
		    		<li>Nama adalah nama asli kegiatan. Nama tidak boleh disingkat</li>
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