<?php

use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Kegiatan;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\KegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grafik Kegiatan Berdasarkan Jenisnya';
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="js/chart.js"></script>

<br>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div id="nodata"></div>
                <div id="canvas-holder">
                    <canvas id="chart-area" width="250" height="250"/>
                </div>
            </div>
            <div class="col-md-8">
                <h3><?= Html::encode($this->title) ?></h3>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Jenis Kegiatan</th>
                            <th>Jumlah Kegiatan</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $number=1;
                        foreach ($jenisKegiatan as $jenis) {
                            $jumlahDosen = intval(Kegiatan::find()->where(['jenis_kegiatan_id' => $jenis->id])->count());
                            $jumlahKegiatan = intval(Kegiatan::find()->count());
                            
                            if ($jumlahKegiatan == 0) {
                                $persentase = 0;
                            } else {
                                $persentase = ($jumlahDosen/$jumlahKegiatan)*100;
                            }
                            ?>
                            <tr>
                                <td><?= $number++ ?></td>
                                <td><?= $jenis->nama ?></td>
                                <td><?= $jumlahDosen ?> Kegiatan <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Lihat Kegiatan', ['laporan/kegiatan', 'JenisKegiatan[id]' => $jenis->id], ['target' => '_blank']) ?></td>
                                <td><?= number_format($persentase, 2) ?> %</td>
                            </tr>
                            <?php
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
$arrColor = ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"];
$arrHighlight = ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"];
$i=0;
?>

var pieData = [
    <?php
    $totalJumlahKegiatan = 0;
    foreach ($jenisKegiatan as $jenis)
    {
        $jumlahKegiatan = Kegiatan::find()->where(['jenis_kegiatan_id' => $jenis->id])->count();
        $totalJumlahKegiatan += $jumlahKegiatan;
        echo '
        {
            value: '.$jumlahKegiatan.',
            color: "'.$arrColor[$i].'",
            highlight: "'.$arrHighlight[$i].'",
            label: "'.$jenis->nama.'"
        },
        ';
        $i++;
    }
    ?>
    ];

    <?php if ($totalJumlahKegiatan == 0) { ?>
    document.getElementById("nodata").innerHTML = '<div class="alert alert-danger"><strong>TIDAK ADA DATA</strong>. Jika pesan error ini muncul, berarti sistem tidak bisa menggenerate grafik karena tidak ada data yang bisa ditampilkan atau persentase semua data adalah nol. Silakan filter dengan data yang relevan.</div>';
    <?php } ?>
    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);
    };
</script>