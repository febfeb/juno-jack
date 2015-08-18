<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Vision Fokus » Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-blocks">
    <div class="row">
        <div class="col-sm-6 information-entry">
            <div class="login-box">
                <div class="article-container style-1">
                    <h3>Pelanggan Terdaftar</h3>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'username')->textInput(["class"=>"simple-field", "placeholder"=>"Masukkan Alamat Email Anda"]); ?>
                    <?= $form->field($model, 'password')->passwordInput(["class"=>"simple-field", "placeholder"=>"Kata Sandi"]); ?>
                    <div class="button style-10">Masuk <input type="submit" value="" /></div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-sm-6 information-entry">
            <div class="login-box">
                <div class="article-container style-1">
                    <h3>Pelanggan Baru</h3>
                    <p>Dengan membuat akun di toko kami, Anda dapat melanjutkan 
                        ke proses checkout lebih cepat, menyimpan alamat dan melihat pesanan Anda.</p>
                </div>
                <a class="button style-12">Daftar</a>
            </div>
        </div>
    </div>
</div>