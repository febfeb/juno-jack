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

            <div class="page-header">
                <h1>Bootstrap grid examples</h1>
                <p class="lead">Basic grid layouts to get you familiar with building within the Bootstrap grid system.</p>
            </div>

            <h3>Three equal columns</h3>
            <p>Get three equal-width columns <strong>starting at desktops and scaling to large desktops</strong>. On mobile devices, tablets and below, the columns will automatically stack.</p>
            <div class="row">
                <div class="col-md-4">.col-md-4</div>
                <div class="col-md-4">.col-md-4</div>
                <div class="col-md-4">.col-md-4</div>
            </div>

            <h3>Three unequal columns</h3>
            <p>Get three columns <strong>starting at desktops and scaling to large desktops</strong> of various widths. Remember, grid columns should add up to twelve for a single horizontal block. More than that, and columns start stacking no matter the viewport.</p>
            <div class="row">
                <div class="col-md-3">.col-md-3</div>
                <div class="col-md-6">.col-md-6</div>
                <div class="col-md-3">.col-md-3</div>
            </div>

            <h3>Two columns</h3>
            <p>Get two columns <strong>starting at desktops and scaling to large desktops</strong>.</p>
            <div class="row">
                <div class="col-md-8">.col-md-8</div>
                <div class="col-md-4">.col-md-4</div>
            </div>

            <h3>Full width, single column</h3>
            <p class="text-warning">No grid classes are necessary for full-width elements.</p>

            <hr>

            <h3>Two columns with two nested columns</h3>
            <p>Per the documentation, nesting is easy—just put a row of columns within an existing column. This gives you two columns <strong>starting at desktops and scaling to large desktops</strong>, with another two (equal widths) within the larger column.</p>
            <p>At mobile device sizes, tablets and down, these columns and their nested columns will stack.</p>
            <div class="row">
                <div class="col-md-8">
                    .col-md-8
                    <div class="row">
                        <div class="col-md-6">.col-md-6</div>
                        <div class="col-md-6">.col-md-6</div>
                    </div>
                </div>
                <div class="col-md-4">.col-md-4</div>
            </div>

            <hr>

            <h3>Mixed: mobile and desktop</h3>
            <p>The Bootstrap 3 grid system has four tiers of classes: xs (phones), sm (tablets), md (desktops), and lg (larger desktops). You can use nearly any combination of these classes to create more dynamic and flexible layouts.</p>
            <p>Each tier of classes scales up, meaning if you plan on setting the same widths for xs and sm, you only need to specify xs.</p>
            <div class="row">
                <div class="col-xs-12 col-md-8">.col-xs-12 .col-md-8</div>
                <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
                <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
                <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
            </div>
            <div class="row">
                <div class="col-xs-6">.col-xs-6</div>
                <div class="col-xs-6">.col-xs-6</div>
            </div>

            <hr>

            <h3>Mixed: mobile, tablet, and desktop</h3>
            <p></p>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-8">.col-xs-12 .col-sm-6 .col-lg-8</div>
                <div class="col-xs-6 col-lg-4">.col-xs-6 .col-lg-4</div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
                <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
                <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
            </div>

            <hr>

            <h3>Column clearing</h3>
            <p><a href="http://getbootstrap.com/css/#grid-responsive-resets">Clear floats</a> at specific breakpoints to prevent awkward wrapping with uneven content.</p>
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                    .col-xs-6 .col-sm-3
                    <br>
                    Resize your viewport or check it out on your phone for an example.
                </div>
                <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>

                <!-- Add the extra clearfix for only the required viewport -->
                <div class="clearfix visible-xs"></div>

                <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
                <div class="col-xs-6 col-sm-3">.col-xs-6 .col-sm-3</div>
            </div>

            <hr>

            <h3>Offset, push, and pull resets</h3>
            <p>Reset offsets, pushes, and pulls at specific breakpoints.</p>
            <div class="row">
                <div class="col-sm-5 col-md-6">.col-sm-5 .col-md-6</div>
                <div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-0">.col-sm-5 .col-sm-offset-2 .col-md-6 .col-md-offset-0</div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-6">.col-sm-6 .col-md-5 .col-lg-6</div>
                <div class="col-sm-6 col-md-5 col-md-offset-2 col-lg-6 col-lg-offset-0">.col-sm-6 .col-md-5 .col-md-offset-2 .col-lg-6 .col-lg-offset-0</div>
            </div>
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
