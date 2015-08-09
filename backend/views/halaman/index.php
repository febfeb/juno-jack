<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Halaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <?= Html::a('Tambah Halaman', ['create'], ['class' => 'pull-right btn btn-success']) ?>
            </header>

            <div class="main-box-body clearfix">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'judul',
                        'waktu',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>