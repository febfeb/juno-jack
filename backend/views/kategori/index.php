<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Url;

$this->title = 'Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <?= Html::a('Tambah Kategori', ['create'], ['class' => 'pull-right btn btn-success']) ?>
            </header>

            <div class="main-box-body clearfix">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'nama',
                    ['attribute' => 'parentString', 'label' => 'Parent'],
                    'tingkat',
                    'jumlah_barang',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            </div>
        </div>
    </div>
</div>