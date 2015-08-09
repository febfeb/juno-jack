<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = $letakMenu->nama;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <?= Html::a('Tambah Halaman', ['create', 'lmid' => $letakMenu->id], ['class' => 'pull-right btn btn-success']) ?>
            </header>

            <div class="main-box-body clearfix">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'halaman.judul',
                        'urutan',
                        ['attribute' => 'ubahUrutan', 'format' => 'raw'],

                        //['class' => 'yii\grid\ActionColumn'],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}{update}{delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span> ', ['view', 'lmid' => $model->letakMenu->id, 'id' => $model->id], ['title' => 'View']);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span> ', ['update', 'lmid' => $model->letakMenu->id, 'id' => $model->id], ['title' => 'Update']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span> ', ['delete', 'lmid' => $model->letakMenu->id, 'id' => $model->id, 'urutan' => $model->urutan], ['title' => 'Delete', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]);
                            },
                        ]
                    ],

                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>