<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6"><h2><?= Html::encode($this->title) ?></h2></div>
            <div class="col-md-6" style="text-align: right;"><br>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'nama',
                        'kode',
                        'warna',
                        'review',
                        'kelompok',
                        'harga_beli',
                        'harga_normal',
                        'harga_promo',
                        'kategori.nama',
                        'overview_1',
                        'overview_2',
                        
                    ],
                ]) ?>                
            </div>
            <div class="col-md-3">
                <?php
                if (count($thumbnails) == 0) {
                    echo '<div class="col-md-12"><div class="alert alert-danger" role="alert">Tidak ada gambar</div></div>';
                    echo Html::a('Lihat Thumbnails', ['barang-thumbnails/index', 'id' => $model->id], ['class' => 'btn btn-success']);
                } else {
                    foreach($thumbnails as $thumbnail){
                ?>
                    <div class="thumbnail">
                        <?= Html::img('uploads/thumbnails/'.$thumbnail->url) ?>
                        <div class="caption">
                            <p>
                            <?= Html::a('Hapus', ['barang-thumbnails/delete', 'id' => $thumbnail->id], ['class' => 'btn btn-danger btn-xs', 'data-method' => 'post', 'data-confirm' => 'Are you sure?']) ?>
                            <!--<a href="#" class="btn btn-danger btn-xs" role="button">Hapus</a>-->
                            </p>
                        </div>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>