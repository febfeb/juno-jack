<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

?>
<div id="content-block">
    <div class="content-center fixed-header-margin">
        <div class="header-wrapper style-10">
            <header class="type-1">
                <div class="header-product">
                    <div class="logo-wrapper">
                        <a id="logo" href="<?= Url::to(["/"]) ?>">
                            <?php echo Html::img(["images/logo.png"]); ?>
                        </a>
                    </div>
                    <div class="product-header-message">
                        PROMO MINGGU INI : BEBAS ONGKOS KIRIM 
                    </div>
                    <div class="product-header-content">
                        <div class="line-entry">
                            <div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i></div>
                            <div class="header-top-entry increase-icon-responsive open-search-popup">
                                <div class="title"><i class="fa fa-search"></i> <span>Search</span></div>
                            </div>
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
                                    <a href="#" class="list-entry">$ USD</a>
                                    <a href="#" class="list-entry">Rp IDR</a>
                                </div>
                            </div>
                        </div>
                        <div class="middle-line"></div>
                        <div class="line-entry">
                            <?php
                            if (Yii::$app->user->isGuest) {
                                echo Html::a('<i class="fa fa-user"></i> <span>Login/Daftar Member</span>', ["member/login"], ["class"=>"header-functionality-entry"]);
                            }else{
                                echo Html::a('<i class="fa fa-check-circle"></i> <span>Tracking Pesanan</span>', ["member/tracking"], ["class"=>"header-functionality-entry"]);
                                echo Html::a('<i class="fa fa-lock"></i> <span>Keluar</span>', ["member/logout"], ["class"=>"header-functionality-entry"]);
                            }
                            echo Html::a('<i class="fa fa-shopping-cart"></i> <span>Keranjang Belanja</span>', ["site/cart"], ["class"=>"header-functionality-entry open-cart-popup"]);
                            ?>
                        </div>
                    </div>
                </div>

                <div class="close-header-layer"></div>
                <div class="navigation">
                    <div class="navigation-header responsive-menu-toggle-class">
                        <div class="title">Navigasi</div>
                        <div class="close-menu"></div>
                    </div>
                    <div class="nav-overflow">
                        <nav>
                            <?php echo $this->render("@frontend/views/layouts/menu"); ?>

                            <ul>
                                <li class="fixed-header-visible">
                                    <a class="fixed-header-square-button open-cart-popup"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="fixed-header-square-button open-search-popup"><i class="fa fa-search"></i></a>
                                </li>
                            </ul>
                            <div class="clear"></div>

                            <a href="<?= Url::to(["/"]) ?>" class="fixed-header-visible additional-header-logo">
                                <?php echo Html::img(["images/logo-white.png"]); ?>
                            </a>
                        </nav>
                        <div class="navigation-footer responsive-menu-toggle-class">
                            <div class="socials-box">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="clear"></div>
        </div>
        <?php
        $breadcrumbs = isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [];
        for($i=0;$i<count($breadcrumbs);$i++){
            $breadcrumb = $breadcrumbs[$i];
            if(is_array($breadcrumb) && $breadcrumb["url"] == NULL){
                $breadcrumb["url"] = Url::current();
            }else if(!is_array($breadcrumb)){
                $label = $breadcrumb;
                $breadcrumb = [
                    "label" => $label,
                    "url" => Url::current()
                ];
            }
            $breadcrumbs[$i] = $breadcrumb;
        }
        ?>
        <?=
        Breadcrumbs::widget([
            'links' => $breadcrumbs,
            'itemTemplate' => '{link}',
            'activeItemTemplate' => '{link}',
            'options' => ["class"=>"breadcrumb-box"],
            'tag' => "div"
        ])
        ?>

        <?= frontend\widgets\Alert::widget() ?>

        <?= $content ?>

        <?php echo $this->render("@frontend/views/layouts/footer"); ?>
    </div>
    <div class="clear"></div>
</div>