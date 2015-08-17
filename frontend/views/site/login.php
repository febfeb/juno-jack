<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="information-blocks">
    <div class="row">
        <div class="col-sm-6 information-entry">
            <div class="login-box">
                <div class="article-container style-1">
                    <h3>Pelanggan Terdaftar</h3>
                </div>
                <form>
                    <label>Email Address</label>
                    <input class="simple-field" type="text" placeholder="Enter Email Address" value="" />
                    <label>Password</label>
                    <input class="simple-field" type="password" placeholder="Enter Password" value="" />
                    <div class="button style-10">Login Page<input type="submit" value="" /></div>
                </form>
            </div>
        </div>
        <div class="col-sm-6 information-entry">
            <div class="login-box">
                <div class="article-container style-1">
                    <h3>New Customers</h3>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                </div>
                <a class="button style-12">Register Account</a>
            </div>
        </div>
    </div>
</div>


<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
