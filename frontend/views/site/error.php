<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="container-404">
    <div class="title">404</div>
    <div class="description"><?= Html::encode($this->title) ?></div>
    <div class="text"><?= nl2br(Html::encode($message)) ?></div>
</div>
