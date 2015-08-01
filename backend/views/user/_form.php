<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

<div class="row">
	<div class="col-lg-6">

        <div class="panel panel-default">
            
            <div class="panel-body">

			    <?= $form->field($model, 'username')->textInput() ?>
			    <?= $form->field($model, 'email')->textInput() ?>
			    <?= $form->field($model, 'password_hash')->passwordInput() ?>

			    <?= $form->field($model, 'nama')->textInput() ?>
			    <?= $form->field($model, 'tempat_lahir')->textInput() ?>
				<?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(), [
			  	    'name' => 'tanggal_lahir',
				    'type' => DatePicker::TYPE_INPUT,
				    'value' => '2015-01-01',
				    'pluginOptions' => [
				        'format' => 'yy-mm-dd'
				    ]
				]) 
				?>
			    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan']) ?>
			    <?= $form->field($model, 'telepon')->textInput() ?>
			    <?= $form->field($model, 'alamat')->textInput() ?>
			    <?= $form->field($model, 'image')->widget(FileInput::className(), [
		            'options' => ['accept' => 'image/*'],
		            'pluginOptions' => ['allowedFileExtensions' => ['jpg', 'png']]
		        ]) ?>
			    <?= $form->field($model, 'role_id')->dropDownList($model->roleList, ['prompt' => 'Pilih role']) ?>

			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>
			</div>

		</div>

	</div>

	<div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                Berikut adalah penjelasan ketentuan pengisian identitas diri anda.
                <ul>
                    <li>Nama Lengkap adalah nama lengkap pegawai, diawali dengan huruf kapital pada setiap awal kata</li>
                    <li>Tanggal lahir adalah tanggal lahir pegawai. Jangan memasukkan tanggal manual, gunakan bantuan tools pengambil tanggal yang akan muncul pada saat anda memilih teks input tanggal.</li>
                    <li>Tempat Lahir adalah nama kota tempat pegawai dilahirkan</li>
                    <li>Jenis Kelamin adalah gender pegawai</li>
                    <li>Alamat adalah alamat lengkap tempat tinggal pegawai</li>
                    <li>Kode Pos adalah alamat kode pos pegawai</li>
                    <li>Telepon adalah nomor telepon pegawai yang bisa dihubungi. Format nomor telepon yang bisa diinputkan adalah (xxxx)-xxxxxxxx dan xxxxxxxxxxxx.</li>
                    <li>Foto Profil adalah foto resmi pegawai yang paling update. Pastikan ukuran foto tidak lebih dari 250KB dengan rasio 3x4.</li>
                </ul>
            </div>
        </div>
	</div>
</div>

<?php ActiveForm::end(); ?>

