<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JenisKegiatan;
use common\models\Halaman;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

    <?= $form->field($model, 'letak_menu_id')->hiddenInput(['value' => $letakMenu->id])->label(false) ?>

    <?= $form->field($model, 'halaman_id')->dropDownList(Halaman::getHalamanList()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
