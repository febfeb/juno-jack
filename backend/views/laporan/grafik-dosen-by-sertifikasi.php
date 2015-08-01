<?php

use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Sertifikasi;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SertifikasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$header = '';
$jenis_sertifikasi_id = '';

if (Yii::$app->request->post('Sertifikasi') != '') {
    $tahun_ajaran = Yii::$app->request->post('Sertifikasi')['tahun_ajaran'];
    $header .= 'Grafik Dosen Dengan Sertifikasi Terbanyak ('.$tahun_ajaran.')';
} else {
    $header .= 'Grafik Dosen Dengan Sertifikasi Terbanyak (Semua Tahun)';
}
$this->title = $header;
$this->params['breadcrumbs'][] = $this->title;

$tahunList = [
    'semua' => 'Semua Tahun',
    '2014/2015' => '2014/2015',
    '2015/2016' => '2015/2016',
    '2016/2017' => '2016/2017',
    '2017/2018' => '2017/2018',
    '2018/2019' => '2018/2019',
    '2019/2010' => '2019/2010',
    '2020/2021' => '2020/2021',
    '2021/2022' => '2021/2022',
    '2022/2023' => '2022/2023',
    '2023/2024' => '2023/2024',
];
?>

<script src="js/chart.js"></script>

<br>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div id="nodata"></div>
                <canvas id="canvas" height="450" width="600"></canvas>
            </div>
            <div class="col-md-6">
                <?php if (Yii::$app->request->post('Sertifikasi') == '') { ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['method' => 'post']); ?>
                        <div class="col-md-10"><?= $form->field($sertifikasi, 'tahun_ajaran')->dropDownList($tahunList)->label('Tahun Ajaran') ?></div>
                        <div class="col-md-2"><br><?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Filter', ['class' => 'btn btn-success']).'&nbsp;' ?></div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <?php } ?>
                <h3>
                <?php
                if (Yii::$app->request->post('Sertifikasi') != '') {
                    echo Html::encode($this->title) . ' ' . Html::a('<span class="glyphicon glyphicon-refresh"></span> Refresh', ['grafik-dosen-by-sertifikasi'], ['class' => 'btn btn-primary']);
                } else {
                    echo Html::encode($this->title);
                }
                ?>
                </h3>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Tahun Ajaran</th>
                            <th>Nama Dosen</th>
                            <th>Jumlah Sertifikasi</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $number=0;
                        $tahun_ajaran = 'semua';
                        foreach ($dosen as $dos) {
                            $number++;
                            if ($number <= 10) {
                                if (Yii::$app->request->post('Sertifikasi') != '') {
                                    $tahun_ajaran = Yii::$app->request->post('Sertifikasi')['tahun_ajaran'];
                                    
                                    $jumlahDosen = intval(Sertifikasi::find()->where(['dosen_id' => $dos->id, 'tahun_ajaran' => $tahun_ajaran])->count());
                                    $jumlahSertifikasi = intval(Sertifikasi::find()->where(['tahun_ajaran' => $tahun_ajaran])->count());
                                } else {
                                    $jumlahDosen = intval(Sertifikasi::find()->where(['dosen_id' => $dos->id])->count());
                                    $jumlahSertifikasi = intval(Sertifikasi::find()->count());
                                }
                                
                                if ($jumlahSertifikasi == 0) {
                                    $persentase = 0;
                                } else {
                                    $persentase = ($jumlahDosen/$jumlahSertifikasi)*100;
                                }
                                $jumlahSertifikasi = Sertifikasi::find()->where(['dosen_id' => $dos->id])->count();
                                ?>

                                <tr>
                                    <td><?= $number ?></td>
                                    <td><?= $tahun_ajaran ?></td>
                                    <td><?= $dos->nama ?></td>
                                    <td><?= $jumlahDosen ?> Sertifikasi</td>
                                    <td><?= number_format($persentase, 2) ?> %</td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
<?php
$i=0;
$labels = '';
$datas = '';
$jumlahDosen = 0;
$totalJumlahDosen = 0;
foreach ($dosen as $dos) {
    $i++;
    if ($i<=10) {
        $labels .= '"'.$dos->nama.'", ';
        if (Yii::$app->request->post('Sertifikasi') != '') {
            $tahun_ajaran = Yii::$app->request->post('Sertifikasi')['tahun_ajaran'];
            $jumlahDosen = intval(Sertifikasi::find()->where(['dosen_id' => $dos->id, 'tahun_ajaran' => $tahun_ajaran])->count());
            $datas .= '"'.$jumlahDosen.'", ';
        } else {
            $jumlahDosen = intval(Sertifikasi::find()->where(['dosen_id' => $dos->id])->count());
            $datas .= '"'.$jumlahDosen.'", ';
        }
        $totalJumlahDosen += $jumlahDosen;
    }
}
?>
var barChartData = {
        labels : [<?= $labels ?>],
        datasets : [
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,0.8)",
                highlightFill : "rgba(151,187,205,0.75)",
                highlightStroke : "rgba(151,187,205,1)",
                data : [<?= $datas ?>]
            }
        ]
    }

    <?php if ($totalJumlahDosen == 0) { ?>
    document.getElementById("nodata").innerHTML = '<div class="alert alert-danger"><strong>TIDAK ADA DATA</strong>. Jika pesan error ini muncul, berarti sistem tidak bisa menggenerate grafik karena tidak ada data yang bisa ditampilkan atau persentase semua data adalah nol. Silakan filter dengan data yang relevan.</div>';
    <?php } ?>
    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx).Bar(barChartData, {
            responsive : true
        });
    }

</script>