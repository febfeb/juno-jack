<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Admin Juno';
$this->params['breadcrumbs'][] = $this->title;
?>

<br><br><br><br>
<center><h2>Backend E-Commerce<br>
Juno Jack<br>
Indonesia</h2></center>
<br><br><br><br><br>
<center>
	<div class="row">
		<div class="col-md-4">
			<font color="#fff">
				<h3>Data Barang</h3>
				<p>Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia </p>
				<p><?= Html::a('Data Barang', ['dosen/index'], ['class' => 'btn btn-danger']) ?></p>
			</font>
		</div>
		<div class="col-md-4">
			<font color="#fff">
				<h3>Pembelian</h3>
				<p>Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia </p>
				<p><?= Html::a('Pembelian', ['kegiatan/index'], ['class' => 'btn btn-danger']) ?></p>
			</font>
		</div>
		<div class="col-md-4">
			<font color="#fff">
				<h3>Penjualan</h3>
				<p>Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia Juno jack E-commerce Indonesia </p>
				<p><?= Html::a('Penjualan', ['sertifikasi/index'], ['class' => 'btn btn-danger']) ?></p>
			</font>
		</div>
	</div>
</center>