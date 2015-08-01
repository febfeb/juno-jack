<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kegiatan Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6"><h2><?= Html::encode($this->title) ?></h2></div>
            <div class="col-md-6" style="text-align: right;"><br>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'dosen.nama',
                'jenisKegiatan.nama',
                'nama',
                'semester',
                'tahun_ajaran',
                'waktu_mulai',
                'waktu_selesai',
                'tempat',
                'bidang_kegiatan',
                'anggota',
                ['attribute' => 'skLink', 'format' => 'raw'],
                'narasumber',
                'sumber_anggaran',
                ['attribute' => 'fileLaporanLink', 'format' => 'raw'],
                'statusString',
            ],
        ]) ?>
    </div>
</div>