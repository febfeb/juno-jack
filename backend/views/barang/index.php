<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <?= Html::a('Tambah Barang', ['create'], ['class' => 'pull-right btn btn-success']) ?>
            </header>

            <div class="main-box-body clearfix">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'kode',
                        'nama',
                        'barangWarna.nama',
                        'kategori.nama',
                        'harga_normal',
                        ['attribute' => 'barangThumbnailsLink', 'format' => 'raw'],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>