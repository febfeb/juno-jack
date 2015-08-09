<?php
use yii\helpers\Html;

$this->title = 'Tambah Halaman';
$this->params['breadcrumbs'][] = ['label' => $letakMenu->nama, 'url' => ['index', 'lmid' => $letakMenu->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="row">
    <div class="col-md-6">
		<div class="panel panel-default">
		    <div class="panel-body">
			    <?= $this->render('_form', [
			        'model' => $model,
			        'letakMenu' => $letakMenu,
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
		    	</ul>
			</div>
		</div>
	</div>
</div>