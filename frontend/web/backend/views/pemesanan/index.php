<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\_search\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <div class="filter-block pull-right">
                    <?= Html::a('Tambah Pemesanan', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </header>
            <div class="main-box-body clearfix">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'waktu',
            'user_id',
            'nama_lengkap',
            'telepon',
            // 'alamat:ntext',
            // 'negara',
            // 'kode_pos',
            // 'total',
            // 'pemesanan_status_id',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'responsive' => true,
        'hover' => true,
        'bootstrap' => true,
    ]); ?>
            </div>
        </div>
    </div>
</div>
