<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\widgets\Alert;

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
<body <?= (Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='index'? 'style="background: url(images/books_blur.jpg) no-repeat;"':'') ?>>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => '<span class="glyphicon glyphicon-folder-open"></span> Juno-Jack',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $menuItems = [];

            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                switch (Yii::$app->user->identity->level_id) {
                    case 1:
                        $menuItems = [
                            ['label' => '<span class="glyphicon glyphicon-home"></span> Home', 'url' => ['site/index']],
                            ['label' => '<span class="glyphicon glyphicon-th"></span> Master Data',
                                'items' => [
                                    ['label' => 'Barang', 'url' => ['barang/index']],
                                    ['label' => '', 'options' => ['class' => 'divider']],
                                    ['label' => 'Kategori', 'url' => ['kategori/index']],
                                    ['label' => 'Merk', 'url' => ['merk/index']],
                                    ['label' => 'Toko', 'url' => ['toko/index']],
                                    ['label' => 'Warna', 'url' => ['warna/index']],
                                    ['label' => '', 'options' => ['class' => 'divider']],
                                    ['label' => 'Halaman', 'url' => ['halaman/index']],
                                ]
                            ],
                            ['label' => '<span class="glyphicon glyphicon-log-in"></span> Pembelian',
                                'items' => [
                                    ['label' => 'Pembelian', 'url' => ['laporan/data-dosen']],
                                ]
                            ],
                            ['label' => '<span class="glyphicon glyphicon-log-out"></span> Penjualan',
                                'items' => [
                                    ['label' => 'Penjualan', 'url' => ['laporan/data-dosen']],
                                ]
                            ],
                            ['label' => '<span class="glyphicon glyphicon-file"></span> Laporan',
                                'items' => [
                                    ['label' => 'Data Barang', 'url' => ['laporan/data-dosen']],
                                    ['label' => '', 'options' => ['class' => 'divider']],
                                    ['label' => 'Laporan Pembelian', 'url' => ['laporan/kegiatan']],
                                    ['label' => 'Laporan Penjualan', 'url' => ['laporan/sertifikasi']],
                                ]
                            ],

                        ];
                        break;

                    case 2:
                        $menuItems = [
                            ['label' => 'Home', 'url' => ['site/index']],
                            ['label' => 'Pelanggan', 'url' => ['pelanggan/index']],
                            ['label' => 'Simpanan', 'url' => ['simpanan/index']],
                            ['label' => 'Pinjaman', 'url' => ['pinjaman/index']],
                            ['label' => 'Transaksi',
                                'items' => [
                                    ['label' => 'Transaksi Simpanan', 'url' => ['transaksi-simpanan/index']],
                                    ['label' => 'Transaksi Pengambilan', 'url' => ['transaksi-pengambilan/index']],
                                    ['label' => 'Transaksi Bayar', 'url' => ['transaksi-bayar/index']],
                                ]
                            ],
                        ];
                        break;

                }

                # logout yang bukan guest
                $menuItems[] = [
                    'label' => '<span class="glyphicon glyphicon-user"></span> ' . Yii::$app->user->identity->username,
                    'items' => [
                        ['label' => 'Profil', 'url' => ['user/profil', 'id' => Yii::$app->user->identity->id]],
                        ['label' => 'Ubah Password', 'url' => ['user/change-password']],
                        ['label' => 'Logout', 'url' => ['site/logout'], 'linkOptions' => ['data-method' => 'post']],
                    ]
                ];
                $menuItems[] = ['label' => '<span class="glyphicon glyphicon-off"></span>', 'url' => ['site/logout'], 'linkOptions' => ['data-method' => 'post']];
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);
            NavBar::end();
        ?>

        <div class="page-breadcrumb">
            <div class="container">
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
            </div>
        </div>

        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; E-Commerce <?= date('Y') ?></p>
        <p class="pull-right">MAF</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
