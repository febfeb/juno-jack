
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
                                    <a href="#" class="list-entry">$ USD</a>
                                    <a href="#" class="list-entry">Rp IDR</a>
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
                                if (Yii::$app->user->isGuest) {
                                    echo Html::a('<i class="fa fa-user"></i> <span>Login/Daftar Member</span>', ["site/register"], ["class"=>"header-functionality-entry"]);
                                }else{
                                    echo Html::a('<i class="fa fa-check-circle"></i> <span>Tracking Pesanan</span>', ["site/tracking"], ["class"=>"header-functionality-entry"]);
                                }
                                echo Html::a('<i class="fa fa-shopping-cart"></i> <span>Keranjang Belanja</span>', ["site/cart"], ["class"=>"header-functionality-entry open-cart-popup"]);
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
                                <div class="navigation-search-content">
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
                                <nav style="padding: 0px">
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
        