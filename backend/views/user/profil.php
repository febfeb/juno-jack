<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Profil: '.$model->username;
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <h2><?= Html::encode($this->title) ?></h2>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'username',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',
                'email:email',
                // 'status',
                'nama',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'telepon',
                'alamat:ntext',
                //'foto',
                //['attribute' => 'fotoProfil', 'format' => 'raw'],
                'role.role',
                'created_at',
                //'updated_at',
            ],
        ]) ?>
    </div>
</div>
