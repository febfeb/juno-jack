<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $barang backend\models\Kegiatan */

$this->title = $barang->nama;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6"><?= Html::a('<span class="glyphicon glyphicon-menu-left"></span> Kembali', ['index'], ['class' => 'btn btn-warning']) ?><hr></div>
            <div class="col-md-6" style="text-align: right;"><br>
                <?= Html::a('<span class="glyphicon glyphicon-picture"></span> Gambar', ['barang-thumbnails/index', 'klp' => $barang->kelompok], ['class' => 'btn btn-default btn-sm']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'klp' => $barang->kelompok], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'klp' => $barang->kelompok], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
        <hr>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Kode</th>
                    <td><?= $barang->kode ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?= $barang->nama ?></td>
                </tr>
                <tr>
                    <th>Pilihan Warna</th>
                    <td><?= $barang->warnaRgb ?></td>
                </tr>
                <tr>
                    <th>Review</th>
                    <td><?= $barang->review ?></td>
                </tr>
                <tr>
                    <th>Kelompok</th>
                    <td><?= $barang->kelompok ?></td>
                </tr>
                <tr>
                    <th>Harga Beli</th>
                    <td><?= $barang->harga_beli ?></td>
                </tr>
                <tr>
                    <th>Harga Normal</th>
                    <td><?= $barang->harga_normal ?></td>
                </tr>
                <tr>
                    <th>Harga Promo</th>
                    <td><?= $barang->harga_promo ?></td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td><?= $barang->kategori->nama ?></td>
                </tr>
                <tr>
                    <th>Overview 1</th>
                    <td><?= $barang->overview_1 ?></td>
                </tr>
                <tr>
                    <th>Overview 2</th>
                    <td><?= $barang->overview_2 ?></td>
                </tr>
            </tbody>
        </table>        
    </div>
</div>