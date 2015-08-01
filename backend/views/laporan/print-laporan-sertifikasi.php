<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = $title;
?>


<div class="laporan">

    <br>
    <h2><?= Html::encode($this->title) ?></h2>

    <?= GridView::widget([
        'layout'=>"{items}",
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'dosen.nama', 'label' => 'Nama Dosen'],
            ['attribute' => 'jenisSertifikasi.nama', 'label' => 'Jenis Sertifikasi'],
            ['attribute' => 'nama', 'label' => 'Nama Sertifikasi'],
            ['attribute' => 'waktu_mulai', 'label' => 'Mulai'],
            ['attribute' => 'waktu_selesai', 'label' => 'Selesai'],
            ['attribute' => 'statusString', 'label' => 'Status'],
            //['attribute' => 'fotoKecil', 'label' => 'Foto', 'format' => 'raw'],
        ],
    ]); ?>

</div>

<style type="text/css">
.laporan{margin-top:90px}h2{text-align:center}table{max-width:100%;background-color:transparent;border-collapse:collapse;border-spacing:0}.table{width:100%;margin-bottom:20px}.table td,.table th{padding:8px;line-height:20px;text-align:left;vertical-align:top;border-top:1px solid #000}.table th{font-weight:700}.table thead th{vertical-align:bottom;background-color:#ddd}.table caption+thead tr:first-child td,.table caption+thead tr:first-child th,.table colgroup+thead tr:first-child td,.table colgroup+thead tr:first-child th,.table thead:first-child tr:first-child td,.table thead:first-child tr:first-child th{border-top:0}.table tbody+tbody{border-top:2px solid #000}.table .table{background-color:#fff}.table-condensed td,.table-condensed th{padding:4px 5px}.table-bordered{border:1px solid #000;border-collapse:separate;border-left:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0}.table-bordered td,.table-bordered th{border-left:1px solid #000}
</style>