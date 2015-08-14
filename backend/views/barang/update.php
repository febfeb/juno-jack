<?php
use yii\helpers\Html;

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['barang/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-6">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <?= Html::a('<span class="glyphicon glyphicon-menu-left"></span> Kembali', ['view', 'klp' => $model->kelompok], ['class' => 'btn btn-warning']) ?><hr>
            </header>
            <div class="main-box-body clearfix">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <?= $this->render('panduan') ?>
    </div>
</div>