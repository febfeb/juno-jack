<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JenisKegiatan;
use kartik\file\FileInput;
use kartik\widgets\DateTimePicker;

use common\models\Warna;
use common\models\Toko;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kegiatan-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'keterangan_buka')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
