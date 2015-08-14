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
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Tambah Halaman', ['create'], ['class' => 'pull-right btn btn-success']) ?>
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

                        //['class' => 'yii\grid\ActionColumn'],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}{update}{delete}',
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span> ', ['view', 'id' => $model->id], ['class' => 'btn btn-info btn-sm']).' ';
                                },
                                'update' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span> ', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']).' ';
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span> ', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger btn-sm', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]);
                                },
                            ]
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>