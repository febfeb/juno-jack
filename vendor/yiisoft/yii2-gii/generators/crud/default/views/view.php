<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
        	<header class="main-box-header clearfix">
                <div class="filter-block pull-right">
                    <?= "<?= " ?>Html::a(<?= $generator->generateString("<i class='fa fa-pencil'></i> Edit") ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
                    <?= "<?= " ?>Html::a(<?= $generator->generateString("<i class='fa fa-trash-o'></i> Hapus") ?>, ['delete', <?= $urlParams ?>], [
                                'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?= "<?= " ?> \app\widgets\Tombol::back(); ?>
                </div>
            </header>
            <div class="main-box-body clearfix">
                <?= "<?= " ?>DetailView::widget([
                    'model' => $model,
                    'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        echo "                        '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        echo "                        '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
    }
}
?>
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
