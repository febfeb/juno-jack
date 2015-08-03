<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <p><?= Html::a('Tambah Barang', ['create'], ['class' => 'pull-right btn btn-sm btn-success']) ?></p>
        <h2><?= Html::encode($this->title) ?></h2>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
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