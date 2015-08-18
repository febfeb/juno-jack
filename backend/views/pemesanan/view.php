<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */

$this->title = $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
        	<header class="main-box-header clearfix">
                <div class="filter-block pull-right">
                    <?= Html::a('<i class=\'fa fa-pencil\'></i> Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('<i class=\'fa fa-trash-o\'></i> Hapus', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?=  \common\components\Tombol::back(); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'waktu',
                        'nama_lengkap',
                        'telepon',
                        'alamat:ntext',
                        'negara',
                        'kode_pos',
                        'total',
                        'pemesananStatus.nama',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
