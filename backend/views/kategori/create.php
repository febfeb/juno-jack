<?php
use yii\helpers\Html;

$this->title = 'Tambah Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-6">
        <div class="main-box">
            <header class="main-box-header clearfix">
                
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