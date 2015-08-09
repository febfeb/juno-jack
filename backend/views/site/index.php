<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Admin Visi Focus';
$this->params['breadcrumbs'][] = $this->title;
?>

<br><br><br><br>
<center>
    <h2>
        Backend E-Commerce<br>
        Visi Focus<br>
        Indonesia
    </h2>
</center>
<br><br><br><br><br>
<center>
    <div class="row">
        <div class="col-md-4">
            <font color="#fff">
            <h3>Data Barang</h3>
            <p>Untuk Mengatur Nama Barang, Harga dan Warna, klik di sini. </p>
            <p><?= Html::a('Data Barang', ['barang/index'], ['class' => 'btn btn-danger']) ?></p>
            </font>
        </div>
        <div class="col-md-4">
            <font color="#fff">
            <h3>Pembelian</h3>
            <p>Untuk Melihat Pembelian Barang, Harga dan Warna, klik di sini </p>
            <p><?= Html::a('Pembelian', ['pembelian/index'], ['class' => 'btn btn-danger']) ?></p>
            </font>
        </div>
        <div class="col-md-4">
            <font color="#fff">
            <h3>Penjualan</h3>
            <p>Untuk Melihat Penjualan Barang, Harga dan Warna, klik di sini </p>
            <p><?= Html::a('Penjualan', ['penjualan/index'], ['class' => 'btn btn-danger']) ?></p>
            </font>
        </div>
    </div>
</center>