<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Kontak */

$this->title = 'Hubungi Kami';
$this->params['breadcrumbs'][] = ['label' => 'Kontaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontak-create">

    <h1><?= Html::encode($this->title) ?></h1>
    Jika anda tidak memperoleh informasi yang anda butuhkan, atau anda mempunyai kritik dan saran, silakan hubungi kami dengan mengisi form di bawah ini. Terima kasih.

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
