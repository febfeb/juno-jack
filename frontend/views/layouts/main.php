<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
        
        <style>
            
        </style>
    </head>

    <body>
    <?php $this->beginBody() ?>
        <div id="menu-a" class="container">
            <div class="row">
                <div class="col-lg-6 hidden-xs hidden-sm hidden-md">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="menu-label row">
                                031-7873533
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="menu-label row">
                                Senin-Jumat 08:00 s/d 16:00
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="menu-label row">
                                febfeb.90@gmail.com
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="col-xs-3">
                        <?= Html::a("How to Buy", ["howtobuy"], ["class"=>"menu-button row"]) ?>
                    </div>
                    <div class="col-xs-3">
                        <?= Html::a("How to Buy", ["howtobuy"], ["class"=>"menu-button row"]) ?>
                    </div>
                    <div class="col-xs-3">
                        <?= Html::a("How to Buy", ["howtobuy"], ["class"=>"menu-button row"]) ?>
                    </div>
                    <div class="col-xs-3">
                        <?= Html::a("How to Buy", ["howtobuy"], ["class"=>"menu-button row"]) ?>
                    </div>
                </div>
                <div class="col-lg-1 hidden-xs hidden-sm hidden-md">
                    asdasd
                </div>
            </div>
        </div>
        
        <div id="menu-b" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-1 col-md-6 col-sm-6 col-xs-6">
                        <div class="menu-label">
                            LOGO
                        </div>
                    </div>
                    <div class="col-lg-4 hidden-xs hidden-sm hidden-md">
                        <div class="row">
                            <select class="form-control search-dropdown">
                                <option value="">Semua Produk</option>
                            </select>
                            <input type="text" class="form-control search-text">
                            <button type="submit" class="btn btn-danger search-button">Search</button>
                        </div>
                    </div>
                    <div class="col-md-7 visible-md">
                        <input type="text" class="form-control search-text-2">
                    </div>
                    <div class="col-lg-4 hidden-xs hidden-sm hidden-md">
                        Pencarian Terpopuler :
                        <br>
                        Iphone Iphone Iphone Iphone Iphone Iphone 
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <div class="cart-box">
                            My Cart
                            
                            My Profile
                        </div>
                    </div>
                    <div class="col-sm-12 visible-sm visible-xs">
                        <input type="text" class="form-control search-text-2">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div id="wowslider-container1">
                    <div class="ws_images"><ul>
                            <li><img src="<?= Yii::$app->urlManager->baseUrl."/images/slider1.jpg" ?>" alt="Creating in free how" title="Landscape" id="wows1_0"/></li>
                            <li><img src="<?= Yii::$app->urlManager->baseUrl."/images/slider2.jpg" ?>" alt="Pages vertical with" title="Sunset" id="wows1_1"/></li>
                            <li><img src="<?= Yii::$app->urlManager->baseUrl."/images/slider3.jpg" ?>" alt="Simple div tool" title="Lake" id="wows1_2"/></li>
                        </ul></div>
                    <div class="ws_bullets">
                        <div>
                            <a href="#" title="Landscape"><span>Simple with 3d examples</span></a>
                            <a href="#" title="Sunset"><span>Website scale</span></a>
                            <a href="#" title="Lake"><span>Custom best images folder</span></a>
                        </div>
                    </div>
                    <div class="ws_shadow"></div>
                </div>	
            </div>
        </div>
        
        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div> <!-- /container -->
    <?php $this->endBody() ?>
    
    <script type="text/javascript" src="http://wowslider.com/images/demo/wowslider.js"></script>
    <script>
        jQuery("#wowslider-container1").wowSlider({
            effect:"shift",
            prev:"",
            next:"",
            duration:8*100,
            delay:20*100,
            width:1200,
            height:360,
            autoPlay:true,
            autoPlayVideo:false,
            playPause:true,
            stopOnHover:false,
            loop:false,
            bullets:1,
            caption:true,
            captionEffect:"parallax",
            controls:true,
            controlsThumb:false,
            responsive:2,
            fullScreen:false,
            gestures:2,
            onBeforeStep:0,
            images:0
        });
    </script>        
</html>
<?php $this->endPage() ?>
