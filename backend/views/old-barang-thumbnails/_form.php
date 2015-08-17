<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Dosen;
use backend\models\JenisKegiatan;
use kartik\file\FileInput;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kegiatan-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

    <?= $form->field($model, 'barang_id')->hiddenInput(['value' => $barang->id])->label(false); ?>

    <?= $form->field($model, 'gambar')->widget(FileInput::classname(), [
        'options' => ['accept' => 'pdf/*'],
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
