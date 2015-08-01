<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Kontak */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Kontaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontak-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Hapus Pesan Ini', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'judul',
            'email:email',
            'pesan:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
