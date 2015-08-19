<?php

use backend\assets\AppAsset;
use common\models\User;
use common\models\LetakMenu;
use backend\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;


/* @var $this View */
/* @var $content string */

$defaultPhoto = Yii::$app->urlManager->baseUrl . "/images/logo-bulat.jpg";
$fotoUser = $defaultPhoto;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <!-- Favicon -->
        <link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

        <!--[if lt IE 9]>
                <script src="js/html5shiv.js"></script>
                <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="theme-wrapper">
            <header class="navbar" id="header-navbar">
                <div class="container">
                    <a href="index.html" id="logo" class="navbar-brand">
                        <img src="<?php echo Yii::$app->urlManager->baseUrl; ?>/images/logo.png" alt="" class="normal-logo logo-white"/>
                        <img src="<?php echo Yii::$app->urlManager->baseUrl; ?>/images/logo.png" alt="" class="normal-logo logo-black"/>
                        <img src="<?php echo Yii::$app->urlManager->baseUrl; ?>/images/logo.png" alt="" class="small-logo hidden-xs hidden-sm hidden"/>
                    </a>

                    <div class="clearfix">
                        <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-bars"></span>
                        </button>

                        <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                            <ul class="nav navbar-nav pull-left">
                                <li>
                                    <a class="btn" id="make-small-nav">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <?php if (!Yii::$app->user->isGuest) { 
                            $user = User::findOne(Yii::$app->user->identity->id);
                            ?>
                        <div class="nav-no-collapse pull-right" id="header-nav">
                            <ul class="nav navbar-nav pull-right">
                                <li class="hidden-xs">
                                    <a class="btn" style="font-weight: bold;"><?php echo $user->nama; ?></a>
                                </li>
                                <li class="dropdown profile-dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?= $fotoUser; ?>" alt="" onError="this.onError=null;this.src='<?= $defaultPhoto; ?>';"/>
                                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->username; ?></span> <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        # logout yang bukan guest
                                        $menuAtas = [
                                            ['label' => '<i class="fa fa-user"></i>Profil', 'url' => ['profile/my-profile']],
                                            ['label' => '<i class="fa fa-cog"></i>Ubah Password', 'url' => ['user/change-password']],
                                            ['label' => '<i class="fa fa-power-off"></i>Logout', 'url' => ['site/logout'], 'linkOptions' => ['data-method' => 'post']],
                                        ];
                                        foreach ($menuAtas as $menu) {
                                            echo "<li>".Html::a($menu["label"], $menu["url"])."</li>";
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="hidden-xxs">
                                    <a class="btn" href="<?= Url::to(['site/logout']) ?>">
                                        <i class="fa fa-power-off"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </header>
            <div id="page-wrapper" class="container">
                <div class="row">
                    <div id="nav-col">
                        <section id="col-left" class="col-left-nano">
                            <div id="col-left-inner" class="col-left-nano-content">
                                <div id="user-left-box" class="clearfix hidden-sm hidden-xs">
                                    <img src="<?= $fotoUser; ?>" alt="" onError="this.onError=null;this.src='<?= $defaultPhoto; ?>';"/>
                                    <div class="user-box">
                                        <span class="name">
                                            Admin
                                        </span>
                                        <span class="status">
                                            <i class="fa fa-circle"></i> Online
                                        </span>
                                    </div>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
                                    <ul class="nav nav-pills nav-stacked">
<?php       
$menuItems = [];

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => '<i class="fa fa-lock"></i> <span>Login</span>', 'url' => ['/site/login']];
} else {
    $letakMenus = LetakMenu::find()->all();
    $items = [];
    foreach ($letakMenus as $letakMenu) {
        $items[] = ['label' => $letakMenu->nama, 'url' => ['menu/index', 'lmid' => $letakMenu->id]];
    }

    $menuItems = [
        ['label' => '<i class="fa fa-home"></i> <span>Home</span>', 'url' => ['site/index']],
        ['label' => '<i class="fa fa-database"></i> <span>Master Data</span>',
            'items' => [
                ['label' => 'Barang', 'url' => ['barang/index']],
                ['label' => 'Kategori', 'url' => ['kategori/index']],
                ['label' => 'Merk', 'url' => ['merk/index']],
                ['label' => 'Toko', 'url' => ['toko/index']],
                ['label' => 'Warna', 'url' => ['warna/index']],
                ['label' => 'Halaman', 'url' => ['halaman/index']],
            ]
        ],
        ['label' => '<i class="fa fa-file-text-o"></i> <span>Pemesanan</span>', 'url' => ['pemesanan/index']],
        ['label' => '<i class="fa fa-user"></i> <span>Menu</span>',
            'items' => $items,
        ],
        /*
        ['label' => '<i class="fa fa-user"></i> <span>Pembelian</span>',
            'items' => [
                ['label' => 'Pembelian', 'url' => ['pembelian/index']],
            ]
        ],
        ['label' => '<i class="fa fa-user"></i> <span>Penjualan</span>',
            'items' => [
                ['label' => 'Penjualan', 'url' => ['penjualan/index']],
            ]
        ],
         */
    ];
}

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;

$url = $controller."/".$action;

foreach ($menuItems as $menuItem) {
    $menuada = FALSE;
    
    $sub = "";

    if(isset($menuItem["items"])){
        $li = "";
        foreach ($menuItem["items"] as $item) {
            $li .= "<li>";
            if(isset($item["url"]) && $item["url"][0]==$url){
                //ada
                $menuada = TRUE;
                $li .= Html::a($item["label"], isset($item["url"])?$item["url"]:"#", ["class"=>"active"]);
            }else{
                $li .= Html::a($item["label"], isset($item["url"])?$item["url"]:"#");
            }
            $li .= "</li>";
        }
        
        $sub .= Html::a($menuItem["label"].'<i class="fa fa-chevron-circle-right drop-icon"></i>', isset($menuItem["url"])?$menuItem["url"]:"#", ["class"=>"dropdown-toggle"]);
        
        $sub .= "<ul class='submenu'>";
        $sub .= $li;
        $sub .= "</ul>";
    }else{
        $sub .= Html::a($menuItem["label"], isset($menuItem["url"])?$menuItem["url"]:"#");
        if(isset($menuItem["url"]) && $menuItem["url"][0]==$url){
            $menuada = TRUE;
        }
    }
    
    if($menuada){
        echo "<li class='active open'>";
    }else{
        echo "<li>";
    }
    echo $sub;
    echo "</li>";
}
?>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
                                    </div>
                                </div>
                                
                                <h1><?= Html::encode($this->title) ?></h1>
                                
                                <?= Alert::widget() ?>                
                                <?= $content ?>
                                
                            </div>
                        </div>

                        <footer id="footer-bar" class="row">
                            <p id="footer-copyright" class="col-xs-12">
                                &copy; <?php echo date("Y") ?> <a href="http://visionfocus.com" target="_blank">VisionFocus</a>.
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
        
        <!--
        <div id="config-tool" class="closed">
            <a id="config-tool-cog">
                <i class="fa fa-cog"></i>
            </a>

            <div id="config-tool-options">
                <h4>Layout Options</h4>
                <ul>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-fixed-header" />
                            <label for="config-fixed-header">
                                Fixed Header
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-fixed-sidebar" />
                            <label for="config-fixed-sidebar">
                                Fixed Left Menu
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-fixed-footer" />
                            <label for="config-fixed-footer">
                                Fixed Footer
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-boxed-layout" />
                            <label for="config-boxed-layout">
                                Boxed Layout
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox-nice">
                            <input type="checkbox" id="config-rtl-layout" />
                            <label for="config-rtl-layout">
                                Right-to-Left
                            </label>
                        </div>
                    </li>
                </ul>
                <br/>
                <h4>Skin Color</h4>
                <ul id="skin-colors" class="clearfix">
                    <li>
                        <a class="skin-changer" data-skin="" data-toggle="tooltip" title="Default" style="background-color: #34495e;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-white" data-toggle="tooltip" title="White/Green" style="background-color: #2ecc71;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer blue-gradient" data-skin="theme-blue-gradient" data-toggle="tooltip" title="Gradient">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-turquoise" data-toggle="tooltip" title="Green Sea" style="background-color: #1abc9c;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-amethyst" data-toggle="tooltip" title="Amethyst" style="background-color: #9b59b6;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-blue" data-toggle="tooltip" title="Blue" style="background-color: #2980b9;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-red" data-toggle="tooltip" title="Red" style="background-color: #e74c3c;">
                        </a>
                    </li>
                    <li>
                        <a class="skin-changer" data-skin="theme-whbl" data-toggle="tooltip" title="White/Blue" style="background-color: #3498db;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
