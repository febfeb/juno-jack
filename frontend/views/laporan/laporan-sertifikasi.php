<?php

use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Sertifikasi;
use backend\models\JenisSertifikasi;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SertifikasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$header = '';
$jenis_sertifikasi_id = '';

if (Yii::$app->request->get('JenisSertifikasi') != '') {
    $jenis_sertifikasi = JenisSertifikasi::find()->where(['id' => Yii::$app->request->get('JenisSertifikasi')])->one();
    if (count($jenis_sertifikasi) > 0) {
        $jenis_sertifikasi_id = $jenis_sertifikasi->id;
        $header .= 'Laporan Jenis Sertifikasi: ' . $jenis_sertifikasi->nama;
    } else {
        $header .= 'Laporan Semua Sertifikasi';
    }

    // Jika ada parameter, maka model ganti ini.
    $query = Sertifikasi::find()->where(['jenis_sertifikasi_id' => $jenis_sertifikasi_id]);
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);
} else {
    $header .= 'Laporan Semua Jenis Sertifikasi';
}
$this->title = $header;
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<div class="panel panel-default">
    <div class="panel-body">

        <?php if (Yii::$app->request->get('JenisSertifikasi') == null) { ?>
        <br>
        <div class="row">
            <div class="col-md-6">
                <?= Html::a('<span class="glyphicon glyphicon-refresh"></span> Refresh', ['sertifikasi'], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-export"></span> Cetak Laporan', ['print-sertifikasi-dosen'], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>            
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['method' => 'get']); ?>
                        <div class="col-md-10"><?= $form->field($jenis, 'id')->dropDownList(JenisSertifikasi::getJenisSertifikasiList())->label('Jenis Sertifikasi') ?></div>
                        <div class="col-md-2"><br><?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Filter', ['class' => 'btn btn-success']).'&nbsp;' ?></div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <?= Html::a('<span class="glyphicon glyphicon-refresh"></span> Refresh', ['sertifikasi'], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-export"></span> Cetak Laporan Sertifikasi Jenis '.JenisSertifikasi::findOne(Yii::$app->request->get('JenisSertifikasi'))->nama, ['print-sertifikasi-dosen', 'jenis_sertifikasi_id' => Yii::$app->request->get('JenisSertifikasi')], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>            
            </div>
        </div>
        <?php } ?>

        <h2><?= Html::encode($this->title) ?></h2>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'dosen.nama',
                'jenisSertifikasi.nama',
                'nama',
                'waktu_mulai',
                'waktu_selesai',
                'statusString',

                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
