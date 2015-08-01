<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

use common\models\Kategori;

/* @var $this \yii\web\View */
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
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">

        <div class="container">
            <h1>Juno Jack</h1>

            <?php
                NavBar::begin([
                    'brandLabel' => 'E-Commerce',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar',
                    ],
                ]);
                $menuItems = [
                    ['label' => 'Beranda', 'url' => ['site/index']],
                    ['label' => 'Tentang', 'url' => ['site/tentang']],
                ];
                $array_kategori = [];
                $kategoris = Kategori::find()->where(['parent_id' => '0'])->all();
                foreach ($kategoris as $kategori) {
                    $array_kategori[] = ['label' => $kategori->nama, 'url' => ['/'.$kategori->url->url]];
                }
                $menuItems[] = ['label' => 'Kategori', 'items' => $array_kategori];
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
            ?>

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; E-Commerce <?= date('Y') ?></p>
        <p class="pull-right">Created by Wahyu</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
