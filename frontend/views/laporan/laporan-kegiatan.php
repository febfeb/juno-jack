<?php

use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Kegiatan;
use backend\models\JenisKegiatan;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\KegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$header = '';
$jenis_kegiatan_id = '';

if (Yii::$app->request->get('JenisKegiatan') != '') {
    $jenis_kegiatan = JenisKegiatan::find()->where(['id' => Yii::$app->request->get('JenisKegiatan')])->one();
    if (count($jenis_kegiatan) > 0) {
        $jenis_kegiatan_id = $jenis_kegiatan->id;
        $header .= 'Laporan Jenis Kegiatan: ' . $jenis_kegiatan->nama;
    } else {
        $header .= 'Laporan Semua Kegiatan';
    }

    // Jika ada parameter, maka model ganti ini.
    $query = Kegiatan::find()->where(['jenis_kegiatan_id' => $jenis_kegiatan_id]);
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);
} else {
    $header .= 'Laporan Semua Jenis Kegiatan';
}
$this->title = $header;
$this->params['breadcrumbs'][] = $this->title;
?>


<br>
<div class="panel panel-default">
    <div class="panel-body">

        <?php if (Yii::$app->request->get('JenisKegiatan') == null) { ?>
        <br>
        <div class="row">
            <div class="col-md-6">
                <?= Html::a('<span class="glyphicon glyphicon-refresh"></span> Refresh', ['kegiatan'], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-export"></span> Cetak Laporan', ['print-kegiatan-dosen'], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>            
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['method' => 'get']); ?>
                        <div class="col-md-10"><?= $form->field($jenis, 'id')->dropDownList(JenisKegiatan::getJenisKegiatanList())->label('Jenis Kegiatan') ?></div>
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
                <?= Html::a('<span class="glyphicon glyphicon-refresh"></span> Refresh', ['kegiatan'], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-export"></span> Cetak Laporan Kegiatan Jenis '.JenisKegiatan::findOne(Yii::$app->request->get('JenisKegiatan'))->nama, ['print-kegiatan-dosen', 'jenis_kegiatan_id' => Yii::$app->request->get('JenisKegiatan')], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
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
                'jenisKegiatan.nama',
                'nama',
                'waktu_mulai',
                'waktu_selesai',
                'statusString',

                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
