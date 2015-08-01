<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SimpananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Data Dosen';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-export"></span> Cetak Laporan', ['print-data-dosen'], ['class' => 'btn btn-primary pull-right', 'target' => '_blank']) ?>
        </p>

        <h2><?= Html::encode($this->title) ?></h2>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'nama',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'telepon',
                'alamat',

                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>