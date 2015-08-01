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

    <?= $form->field($model, 'dosen_id')->dropDownList(Dosen::getDosenList()) ?>

    <?= $form->field($model, 'jenis_kegiatan_id')->dropDownList(JenisKegiatan::getJenisKegiatanList()) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'semester')->dropDownList(['Ganjil' => 'Ganjil', 'Genap' => 'Genap']) ?>

    <?= $form->field($model, 'tahun_ajaran')->dropDownList([
        '2014/2015' => '2014/2015',
        '2015/2016' => '2015/2016',
        '2016/2017' => '2016/2017',
        '2017/2018' => '2017/2018',
        '2018/2019' => '2018/2019',
        '2019/2010' => '2019/2010',
        '2020/2021' => '2020/2021',
        '2021/2022' => '2021/2022',
        '2022/2023' => '2022/2023',
        '2023/2024' => '2023/2024',
        ]) ?>

    <?= $form->field($model, 'waktu_mulai')->widget(DateTimePicker::className(), [
        'name' => 'waktu_mulai',
        'type' => DateTimePicker::TYPE_INPUT,
        'value' => '2015-01-01 00:00:00',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd h:i:s'
        ]
    ]) ?>

    <?= $form->field($model, 'waktu_selesai')->widget(DateTimePicker::className(), [
        'name' => 'waktu_selesai',
        'type' => DateTimePicker::TYPE_INPUT,
        'value' => '2015-01-01 00:00:00',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd h:i:s'
        ]
    ]) ?>

    <?= $form->field($model, 'tempat')->textInput(['maxlength' => 255]) ?>
    
    <?= $form->field($model, 'bidang_kegiatan')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'anggota')->textInput(['maxlength' => 255]) ?>

    <?php // = $form->field($model, 'sk')->textInput(['maxlength' => 50]) ?>
    <?= $form->field($model, 'sk')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]) ?>

    <?= $form->field($model, 'narasumber')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'sumber_anggaran')->textInput(['maxlength' => 50]) ?>

    <?php //= $form->field($model, 'file_laporan')->textInput(['maxlength' => 50]) ?>
    <?= $form->field($model, 'file_laporan')->widget(FileInput::classname(), [
        'options' => ['accept' => 'pdf/*'],
    ]) ?>


    <?= $form->field($model, 'status')->dropDownList(['1' => 'Selesai', '0' => 'Sedang Berlangsung']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
