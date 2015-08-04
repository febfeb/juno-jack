<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Vision Fokus » Beranda';
?>
<div class="row">
    <div class="col-md-3">
        <div class="sidebar-navigation">
            <div class="title">Kategori<i class="fa fa-angle-down"></i></div>
            <div class="list">
                <?php
                foreach(common\models\Kategori::find()->where(["parent_id"=>0])->all() as $kategori){
                    $url = common\models\Url::find()->where(["jenis"=>"k", "data_id"=>$kategori->id])->one();
                ?>
                <a class="entry" href="<?php echo \yii\helpers\Url::to(["/".$url->url]) ?>">
                    <span><i class="fa fa-angle-right"></i><?php echo $kategori->nama ?></span>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="clear"></div>

        <div class="information-blocks hidden-sm hidden-xs">
            <h3 class="block-title">Vendor Kami</h3>
            <div class="sidebar-logos-row">
                <?php
                foreach(common\models\Merk::find()->all() as $merk){
                    $url = common\models\Url::find()->where(["jenis"=>"m", "data_id"=>$merk->id])->one();
                ?>
                <div class="entry">
                    <a href="<?php echo \yii\helpers\Url::to(["/".$url->url]) ?>">
                        <img src="<?= \Yii::getAlias('@backend_url').'/merk/'.$merk->gambar ?>" />
                    </a>
                </div>
                <?php
                }
                ?>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>

    </div>
    <div class="col-md-9">
        <div class="information-blocks">
            <div class="row">
                <div class="col-md-12">

                    <div class="navigation-banner-swiper size-1">
                        <div class="swiper-container" data-autoplay="5000" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide active" data-val="0"> 
                                    <div class="navigation-banner-wrapper align-1" style="background-image: url(<?= \yii\helpers\Url::to(["theme/img/everything-1.jpg"]) ?>); background-color: #f5f1e2;">
                                        <div class="navigation-banner-content">
                                            <div class="cell-view">
                                                <h2 class="subtitle">Check out juicer sales out</h2>
                                                <h1 class="title">Zelmer ZJE1200G</h1>
                                                <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</div>
                                                <div class="info">
                                                    <a class="button style-1" href="#">Shop Now</a>
                                                    <a class="button style-1" href="#">Features</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-val="1"> 
                                    <div class="navigation-banner-wrapper align-2" style="background-image: url(<?= \yii\helpers\Url::to(["theme/img/everything-2.jpg"]) ?>); background-color: #e8e8e8;">
                                        <div class="navigation-banner-content">
                                            <div class="cell-view">
                                                <h2 class="subtitle">Check out tv sales out!</h2>
                                                <h1 class="title">Smart Hub 40'</h1>
                                                <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing  elit, sed do eiusmod tempor incididunt.</div>
                                                <div class="info">
                                                    <a class="button style-1" href="#">Shop Now</a>
                                                    <a class="button style-1" href="#">Features</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-val="2"> 
                                    <div class="navigation-banner-wrapper align-1" style="background-image: url(<?= \yii\helpers\Url::to(["theme/img/everything-3.jpg"]) ?>); background-color: #f6e8d8;">
                                        <div class="navigation-banner-content">
                                            <div class="cell-view">
                                                <h2 class="subtitle">Check out phones sales out</h2>
                                                <h1 class="title">Galaxy Note 5</h1>
                                                <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</div>
                                                <div class="info">
                                                    <a class="button style-1" href="#">Shop Now</a>
                                                    <a class="button style-1" href="#">Features</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="pagination"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="information-blocks">
            <div class="tabs-container">
                <div class="swiper-tabs tabs-switch">
                    <div class="title">Products</div>
                    <div class="list">
                        <a class="block-title tab-switcher active">Featured Products</a>
                        <a class="block-title tab-switcher">Popular Products</a>
                        <a class="block-title tab-switcher">New Arrivals</a>
                        <div class="clear"></div>
                    </div>
                </div>
                <div>
                    <div class="tabs-entry">
                        <div class="products-swiper">
                            <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="<?= \yii\helpers\Url::to(["theme/img/product-everything-1.jpg"]) ?>" alt="" />
                                                    <a class="top-line-a left"><i class="fa fa-retweet"></i></a>
                                                    <a class="top-line-a right"><i class="fa fa-heart"></i></a>
                                                    <div class="bottom-line">
                                                        <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-2.jpg" alt="" />
                                                    <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                    <div class="bottom-line">
                                                        <div class="right-align">
                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="left-align">
                                                            <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-3.jpg" alt="" />
                                                    <div class="bottom-line left-attached">
                                                        <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-4.jpg" alt="" />
                                                    <div class="bottom-line left-attached">
                                                        <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs-entry">
                        <div class="products-swiper">
                            <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-1.jpg" alt="" />
                                                    <a class="top-line-a left"><i class="fa fa-retweet"></i></a>
                                                    <a class="top-line-a right"><i class="fa fa-heart"></i></a>
                                                    <div class="bottom-line">
                                                        <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-3.jpg" alt="" />
                                                    <div class="bottom-line left-attached">
                                                        <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-4.jpg" alt="" />
                                                    <div class="bottom-line left-attached">
                                                        <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-2.jpg" alt="" />
                                                    <div class="bottom-line left-attached">
                                                        <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs-entry">
                        <div class="products-swiper">
                            <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-2.jpg" alt="" />
                                                    <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                    <div class="bottom-line">
                                                        <div class="right-align">
                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="left-align">
                                                            <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-3.jpg" alt="" />
                                                    <div class="bottom-line left-attached">
                                                        <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-1.jpg" alt="" />
                                                    <div class="bottom-line left-attached">
                                                        <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">
                                                    <img src="img/product-everything-4.jpg" alt="" />
                                                    <div class="bottom-line left-attached">
                                                        <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                        <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">Men clothing</a>
                                                <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                <div class="rating-box">
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                    <div class="star"><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="price">
                                                    <div class="prev">$199,99</div>
                                                    <div class="current">$119,99</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="information-blocks">
            <div class="tabs-container">
                <div class="swiper-tabs tabs-switch">
                    <a class="block-title tab-switcher active">Promoted Categories</a>
                    <div class="clear"></div>
                </div>
                <div>
                    <div class="tabs-entry">
                        <div class="products-swiper">
                            <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <img src="img/product-everything-5.jpg" alt="" />
                                                <a class="title" href="#"><b>AUTOMOBILE PARTS</b></a>
                                                <ul class="list-type-1">
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Evening dresses</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Jackets and coats</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Tops and Sweatshirts</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Blouses and shirts</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Trousers and Shorts</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <img src="img/product-everything-6.jpg" alt="" />
                                                <a class="title" href="#"><b>SPORTS &amp; RESREATION</b></a>
                                                <ul class="list-type-1">
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Evening dresses</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Jackets and coats</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Tops and Sweatshirts</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Blouses and shirts</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Trousers and Shorts</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <img src="img/product-everything-7.jpg" alt="" />
                                                <a class="title" href="#"><b>ANIMALS ACCESSORIES</b></a>
                                                <ul class="list-type-1">
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Evening dresses</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Jackets and coats</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Tops and Sweatshirts</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Blouses and shirts</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Trousers and Shorts</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide"> 
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <img src="img/product-everything-8.jpg" alt="" />
                                                <a class="title" href="#"><b>HOBBY EQUIPMENT</b></a>
                                                <ul class="list-type-1">
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Evening dresses</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Jackets and coats</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Tops and Sweatshirts</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Blouses and shirts</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Trousers and Shorts</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>

