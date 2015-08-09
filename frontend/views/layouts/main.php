<?php

use common\models\Kategori;
use common\models\Pengaturan;
use common\models\Url;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

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
        
        <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
        <!--[if IE 9]>
            <link href="css/ie9.css" rel="stylesheet" type="text/css" />
        <![endif]-->
    </head>
    <body class="style-2">
        <?php $this->beginBody() ?>

        <!-- LOADER -->
        <div id="loader-wrapper">
            <div class="bubbles">
                <div class="title">loading</div>
                <span></span>
                <span id="bubble2"></span>
                <span id="bubble3"></span>
            </div>
        </div>

        <div id="content-block">

            <div class="content-center fixed-header-margin">
                <!-- HEADER -->
                <div class="header-wrapper style-2">
                    <header class="type-1">
                        <div class="header-top">
                            <div class="header-top-entry">
                                <div class="title"><?php echo Html::img(["theme/img/flag-lang-2.png"]); ?>Indonesia<i class="fa fa-caret-down"></i></div>
                                <div class="list">
                                    <a href="#" class="list-entry"><?php echo Html::img(["theme/img/flag-lang-1.png"]); ?>English</a>
                                    <a href="#" class="list-entry"><?php echo Html::img(["theme/img/flag-lang-2.png"]); ?>Indonesia</a>
                                </div>
                            </div>
                            <div class="header-top-entry">
                                <div class="title"><b>Mata Uang :</b> $ USD<i class="fa fa-caret-down"></i></div>
                                <div class="list">
                                    <a href="#" class="list-entry">$ CAD</a>
                                    <a href="#" class="list-entry">&#8364; EUR</a>
                                </div>
                            </div>
                            <div class="header-top-entry hidden-xs">
                                <div class="title">
                                    <i class="fa fa-phone"></i> <b><?= Pengaturan::getPengaturan("no_telp"); ?></b>
                                </div>
                            </div>
                            <div class="socials-box">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i></div>
                            <div class="clear"></div>
                        </div>

                        <div class="header-middle">
                            <div class="logo-wrapper">
                                <a id="logo" href="<?= \yii\helpers\Url::to(["/"]) ?>">
                                    <?php echo Html::img(["images/logo.png"]); ?>
                                </a>
                            </div>


                            <div class="right-entries">
                                <?php
                                echo Html::a('<i class="fa fa-lock"></i> <span>Login</span>', ["site/login"], ["class"=>"header-functionality-entry"]);
                                echo Html::a('<i class="fa fa-check-circle"></i> <span>Tracking Pesanan</span>', ["site/tracking"], ["class"=>"header-functionality-entry"])
                                ?>
                                <!--
                                <a class="header-functionality-entry" href="#"><i class="fa fa-search"></i><span>Search</span></a>
                                <a class="header-functionality-entry" href="#"><i class="fa fa-copy"></i><span>Compare</span></a>
                                <a class="header-functionality-entry" href="#"><i class="fa fa-heart-o"></i><span>Wishlist</span></a>
                                <a class="header-functionality-entry open-cart-popup" href="#"><i class="fa fa-shopping-cart"></i><span>My Cart</span> <b>$255,99</b></a>
                                -->
                            </div>

                        </div>

                        <div class="close-header-layer"></div>
                        <div class="navigation">
                            <div class="navigation-header responsive-menu-toggle-class">
                                <div class="title">Navigation</div>
                                <div class="close-menu"></div>
                            </div>
                            <div class="nav-overflow">
                                <div class="sidebar-navigation-title">Kategori</div>
                                <div class="navigation-search-content">
                                    <div class="toggle-desktop-menu"><i class="fa fa-bars"></i><i class="fa fa-close"></i>menu</div>
                                    <div class="search-box size-1">
                                        <form>
                                            <div class="search-button">
                                                <i class="fa fa-search"></i>
                                                <input type="submit" />
                                            </div>
                                            <div class="search-drop-down">
                                                <div class="title"><span>Semua Kategori</span><i class="fa fa-angle-down"></i></div>
                                                <div class="list">
                                                    <div class="overflow">
                                                        <div class="category-entry">Semua Kategori</div>
                                                        <?php
                                                        foreach(Kategori::find()->where(["parent_id"=>0])->all() as $kategori){
                                                            $url = Url::find()->where(["jenis"=>"k", "data_id"=>$kategori->id])->one();
                                                        ?>
                                                        <div class="category-entry"><?php echo $kategori->nama ?></div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="search-field">
                                                <input type="text" value="" placeholder="Search for product" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <nav>
                                    <?php echo $this->render("@frontend/views/layouts/menu"); ?>

                                    <div class="clear"></div>

                                    <a class="fixed-header-visible additional-header-logo"><?php echo Html::img(["images/logo.png"]); ?></a>
                                </nav>
                                <div class="navigation-footer responsive-menu-toggle-class">
                                    <div class="socials-box">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="navigation-copyright">Created by <a href="#">8theme</a>. All rights reserved</div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="clear"></div>
                </div>

                <div class="content-push">
                    
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    
                    <?= Alert::widget() ?>
                    
                    <?= $content ?>
                    
                    <!-- FOOTER -->
                    <div class="footer-wrapper style-2">
                        <footer class="type-1">
                            <div class="footer-columns-entry">
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php echo Html::img(["images/logo.png"], ["class"=>"footer-logo"]); ?>
                                        <div class="footer-description"></div>
                                        <div class="footer-address"><?php echo Pengaturan::getPengaturan("alamat") ?><br/>
                                            Phone: <?php echo Pengaturan::getPengaturan("no_telp") ?><br/>
                                            Email: <a href="mailto:<?php echo Pengaturan::getPengaturan("email") ?>"><?php echo Pengaturan::getPengaturan("email") ?></a><br/>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <h3 class="column-title">Our Services</h3>
                                        <ul class="column">
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                            <li><a href="#">Custom Service</a></li>
                                            <li><a href="#">Terms &amp; Condition</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <h3 class="column-title">Our Services</h3>
                                        <ul class="column">
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                            <li><a href="#">Custom Service</a></li>
                                            <li><a href="#">Terms &amp; Condition</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <h3 class="column-title">Our Services</h3>
                                        <ul class="column">
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                            <li><a href="#">Custom Service</a></li>
                                            <li><a href="#">Terms &amp; Condition</a></li>
                                            <li><a href="#">Order History</a></li>
                                            <li><a href="#">Returns</a></li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clearfix visible-sm-block"></div>
                                    <div class="col-md-3">
                                        <h3 class="column-title">Company working hours</h3>
                                        <div class="footer-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</div>
                                        <div class="footer-description">
                                            <b>Monday-Friday:</b> 8.30 a.m. - 5.30 p.m.<br/>
                                            <b>Saturday:</b> 9.00 a.m. - 2.00 p.m.<br/>
                                            <b>Sunday:</b> Closed
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-bottom-navigation">
                                <div class="cell-view">
                                    <div class="footer-links">
                                        <a href="#">Site Map</a>
                                        <a href="#">Search</a>
                                        <a href="#">Terms</a>
                                        <a href="#">Advanced Search</a>
                                        <a href="#">Orders and Returns</a>
                                        <a href="#">Contact Us</a>
                                    </div>
                                </div>
                                <div class="cell-view">
                                    <div class="payment-methods">
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-1.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-2.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-3.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-4.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-5.png"]) ?>" alt="" /></a>
                                        <a href="#"><img src="<?= \yii\helpers\Url::to(["/theme/img/payment-method-6.png"]) ?>" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>

            </div>
            <div class="clear"></div>

        </div>

        <div class="search-box popup">
            <form>
                <div class="search-button">
                    <i class="fa fa-search"></i>
                    <input type="submit" />
                </div>
                <div class="search-drop-down">
                    <div class="title"><span>All categories</span><i class="fa fa-angle-down"></i></div>
                    <div class="list">
                        <div class="overflow">
                            <div class="category-entry">Category 1</div>
                            <div class="category-entry">Category 2</div>
                            <div class="category-entry">Category 2</div>
                            <div class="category-entry">Category 4</div>
                            <div class="category-entry">Category 5</div>
                            <div class="category-entry">Lorem</div>
                            <div class="category-entry">Ipsum</div>
                            <div class="category-entry">Dollor</div>
                            <div class="category-entry">Sit Amet</div>
                        </div>
                    </div>
                </div>
                <div class="search-field">
                    <input type="text" value="" placeholder="Search for product" />
                </div>
            </form>
        </div>

        <div class="cart-box popup">
            <div class="popup-container">
                <div class="cart-entry">
                    <a class="image"><img src="img/product-menu-1.jpg" alt="" /></a>
                    <div class="content">
                        <a class="title" href="#">Pullover Batwing Sleeve Zigzag</a>
                        <div class="quantity">Quantity: 4</div>
                        <div class="price">$990,00</div>
                    </div>
                    <div class="button-x"><i class="fa fa-close"></i></div>
                </div>
                <div class="cart-entry">
                    <a class="image"><img src="img/product-menu-1_.jpg" alt="" /></a>
                    <div class="content">
                        <a class="title" href="#">Pullover Batwing Sleeve Zigzag</a>
                        <div class="quantity">Quantity: 4</div>
                        <div class="price">$990,00</div>
                    </div>
                    <div class="button-x"><i class="fa fa-close"></i></div>
                </div>
                <div class="summary">
                    <div class="subtotal">Subtotal: $990,00</div>
                    <div class="grandtotal">Grand Total <span>$1029,79</span></div>
                </div>
                <div class="cart-buttons">
                    <div class="column">
                        <a class="button style-3">view cart</a>
                        <div class="clear"></div>
                    </div>
                    <div class="column">
                        <a class="button style-4">checkout</a>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
