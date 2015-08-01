<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;

use backend\models\Pelanggan;
use backend\models\Simpanan;
use backend\models\TransaksiSimpanan;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SimpananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$header = '';
$pelanggan_id = '';
$simpanan_id = '';

if (Yii::$app->request->post('Simpanan') != '') {
    $simpanan = Simpanan::find()->where(['id' => Yii::$app->request->post('Simpanan')])->one();
    if (count($simpanan) > 0) {
        $jenisSimpanan = $simpanan->jumlah;
        $simpanan_id = $simpanan->id;
    }

    // Jika ada parameter, maka model ganti ini.
    $query = TransaksiSimpanan::find()->where(['simpanan_id' => Yii::$app->request->post('Simpanan')]);
    $model = new ActiveDataProvider([
        'query' => $query,
    ]);

    if (Yii::$app->request->post('Pelanggan')) {
        $pelanggan = Pelanggan::find()->where(['id' => Yii::$app->request->post('Pelanggan')])->one();
        $pelanggan_id = $pelanggan->id;
        if (count($simpanan) > 0) {
            $header .= 'Laporan ' . $simpanan->jenisSimpanan->jenis_simpanan . ' ' . $pelanggan->nama . ' (' . $simpanan->jumlah . ')';
        } else {
            $header .= 'Pilih simpanan yang dilakukan oleh ' . $pelanggan->nama . ' !';
        }
    }
    $this->title = $header;

} else {
    $this->title = 'Laporan Semua Transaksi Simpanan Semua Pelanggan';
}

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="simpanan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cetak Laporan', ['print-transaksi-simpanan', 'simpanan_id' => $simpanan_id], ['class' => 'btn btn-primary btn-xs pull-right', 'target' => '_blank']) ?>
    </p>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    $form = ActiveForm::begin(['method' => 'post']);

                    echo $form->field($dataPelanggan, 'id')->dropDownList($dataPelanggan->pelangganList, ['id' => 'pelanggan-id'])->label('Nama Pelanggan');

                    echo $form->field($dataSimpanan, 'id')->widget(DepDrop::className(), [
                        //'type' => DepDrop::TYPE_SELECT2,
                        'options' => ['id' => 'simpanan_id'],
                        'pluginOptions' => [
                            'depends' => ['pelanggan-id'],
                            'placeholder' => 'Pilih transaksi simpanan',
                            'url' => Url::to(['/transaksi-simpanan/simpanan-json']),
                            'initialize' => true,
                        ]
                    ])->label('Simpanan Yang Dilakukan Pelanggan Terpilih');

                    echo Html::submitButton('Tampilkan Laporan', ['class' => 'btn btn-success']);
                    
                    ActiveForm::end();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $model,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'simpanan.pelanggan.nama',
            'tanggal',
            'jumlahRupiah',
            'keterangan',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
