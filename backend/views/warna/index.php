<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Warna';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <p><?= Html::a('Tambah Warna', ['create'], ['class' => 'pull-right btn btn-sm btn-success']) ?></p>
        <h2><?= Html::encode($this->title) ?></h2>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'nama',
                'rgb',
                ['attribute' => 'tampilanWarna', 'format' => 'raw'],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>