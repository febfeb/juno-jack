<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $content string */

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        
        <!--[if IE 9]>
            <link href="css/ie9.css" rel="stylesheet" type="text/css" />
        <![endif]-->
    </head>
    <body class="style-10">
        <?php $this->beginBody() ?>

        <div id="loader-wrapper">
            <div class="bubbles">
                <div class="title">Loading...</div>
                <span></span>
                <span id="bubble2"></span>
                <span id="bubble3"></span>
            </div>
        </div>
        
        <?php echo $this->render("@frontend/views/layouts/header", ["content"=>$content]); ?>

        <?php echo $this->render("@frontend/views/layouts/cart"); ?>
        
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
