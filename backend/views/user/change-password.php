<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Ubah Password';
$this->params['breadcrumbs'][] = $this->title . ': ' . Yii::$app->user->identity->username;
?>
<br>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <h2><?= Html::encode($this->title) ?></h2>
            <div class="user-form">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'oldPassword')->passwordInput() ?>
                <span class="text-danger" id="error-password-lama">Password anda tidak cocok dengan password lama</span>
                <?= $form->field($model, 'newPassword')->passwordInput() ?>
                <?= $form->field($model, 'confirmPassword')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    #error-password-lama {
        display: none;
    }

    #error-password-baru {
        display: none;
    }

    #error-ulangi {
        display: none;
    }
</style>

<?php
/*
echo Yii::$app->controller->id.'/'.Yii::$app->controller->action->id . '<br>';
echo Yii::$app->request->baseUrl . '<br>';

echo Yii::$app->request->url . '<br>';
echo Yii::$app->controller->id . '<br>';
echo Yii::$app->controller->action->id;
*/
$this->registerJs('

    $(document).ready(function(){
        
    });

    $("#changepassword-oldpassword").change(function(){
        console.log("ai");
    });

    $("#password-lama").keyup(function(){
        $.post("'. Yii::$app->request->baseUrl . '?r=/user/check-old-password",
            { "password_lama": $("#password-lama").val() }
        ).done(function(data){
            if(data == "false"){
                $("#error-password-lama").fadeIn("fast");
                $("#password-baru").attr("disabled","disabled");
                $("#ulangi-password-baru").attr("disabled","disabled");
            }else{
                $("#error-password-lama").fadeOut("slow");
                $("#password-baru").removeAttr("disabled");
                $("#ulangi-password-baru").removeAttr("disabled");
            }
        }).fail(function(){
            alert("fail");
        });
    });

', View::POS_READY);
?>