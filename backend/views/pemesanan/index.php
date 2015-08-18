<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\_search\PemesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan';
$this->params['breadcrumbs'][] = $this->title;

$filter_status = yii\helpers\ArrayHelper::map(common\models\PemesananStatus::find()->all(), "id", "nama");

?>


<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
            </header>
            <div class="main-box-body clearfix">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'waktu',
                        'nama_lengkap',
                        'telepon',
                        'alamat',
                        // 'negara',
                        // 'kode_pos',
                        // 'total',
                        ["attribute" => "pemesanan_status_id", "value" => "pemesananStatus.nama", "filter" => $filter_status],

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
