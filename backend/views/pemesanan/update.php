<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */

$this->title = 'Edit Pemesanan: ' . ' ' . $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_lengkap, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
        	<header class="main-box-header clearfix">
                <div class="filter-block pull-right">
                    <?=  \common\components\Tombol::back(); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">
                <?=  $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
