<?php

use common\models\Url;
use yii\helpers\Url as Url2;

$this->title = $barang->nama;

// Breadcrumbs berdasarkan hirarki kategorinya
$kategori = $barang->kategori;
$nested_kategori = [];
$nested_kategori[] = ['label' => $kategori->nama, 'url' => ["/".$kategori->url->url]];
while (isset($kategori->parent)) {
    $kategori = $kategori->parent;
    $nested_kategori[] = ['label' => $kategori->nama, 'url' => ["/".$kategori->url->url]];
}
$index = count($nested_kategori);
while($index) {
    $this->params['breadcrumbs'][] = $nested_kategori[--$index];
}
$this->params['breadcrumbs'][] = $this->title;

$url_barang = Url::find()->where(['jenis' => 'b', 'data_id' => $barang->id])->one();

/*
Informasi produk:<hr>
Nama: <?= $barang->nama ?><br>
Kode: <?= $barang->kode ?><br>
Warna: <?= $barang->warna ?><br>
Review: <?= $barang->review ?><br>
Kelompok: <?= $barang->kelompok ?><br>
Harga Beli: <?= $barang->harga_beli ?><br>
Harga Normal: <?= $barang->harga_normal ?><br>
Harga Promo: <?= $barang->harga_promo ?><br>
Kategori: <?= $barang->kategori->nama ?><br>
Overview 1: <?= $barang->overview_1 ?><br>
Overview 2: <?= $barang->overview_2 ?><br>
*/

$reviews = [];
?>

<div class="information-blocks">
    <div class="row">
        <div class="col-sm-5 col-md-4 col-lg-5 information-entry">
            <div class="product-preview-box">
                <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($thumbnails as $thumbnail) {
                            echo '
                            <div class="swiper-slide">
                                <div class="product-zoom-image">
                                    <img src="'.\Yii::getAlias('@backend_url').'/thumbnails/'.$thumbnail->url.'" alt="" data-zoom="'.\Yii::getAlias('@backend_url').'/thumbnails/'.$thumbnail->url.'" />
                                </div>
                            </div>
                            ';
                        }
                        ?>
                    </div>
                    <div class="pagination"></div>
                    <div class="product-zoom-container">
                        <div class="move-box">
                            <img class="default-image" src="" alt="" />
                            <img class="zoomed-image" src="" alt="" />
                        </div>
                        <div class="zoom-area"></div>
                    </div>
                </div>
                <div class="swiper-hidden-edges">
                    <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                        <div class="swiper-wrapper">
                            <?php
                            $nomor = 1;
                            foreach ($thumbnails as $thumbnail) {
                                if ($nomor == 1) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                                echo '
                                <div class="swiper-slide '.$selected.'">
                                    <div class="paddings-container">
                                        <img src="'.\Yii::getAlias('@backend_url').'/thumbnails/'.$thumbnail->url.'" alt="" />
                                    </div>
                                </div>
                                ';
                            }
                            ?>
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-7 col-md-4 information-entry">
            <div class="product-detail-box">
                <h1 class="product-title"><?= $barang->nama ?></h1>
                <h3 class="product-subtitle">KODE SKU : <?= $barang->kode ?></h3>
                <div class="rating-box">
                    <?php 
                    echo \common\components\Rating::getDiv($barang->review)
                    ?>
                    <div class="rating-number "><?= $barang->review ?></div>
                </div>
                <div class="product-description detail-info-entry">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                <div class="price detail-info-entry">
                    <?php if($barang->harga_promo != NULL){ ?>
                    <div class="prev"><?= common\components\Angka::toReadableHarga($barang->harga_normal) ?></div>
                    <div class="current"><?= common\components\Angka::toReadableHarga($barang->harga_promo) ?></div>
                    <?php }else{ ?>
                    <div class="current"><?= common\components\Angka::toReadableHarga($barang->harga_normal) ?></div>
                    <?php } ?>
                </div>
                <div class="color-selector detail-info-entry">
                    <div class="detail-info-entry-title">Color</div>
                    <div class="entry active" style="background-color: #d23118;">&nbsp;</div>
                    <div class="entry" style="background-color: #2a84c9;">&nbsp;</div>
                    <div class="entry" style="background-color: #000;">&nbsp;</div>
                    <div class="entry" style="background-color: #d1d1d1;">&nbsp;</div>
                    <div class="spacer"></div>
                </div>
                <div class="quantity-selector detail-info-entry">
                    <div class="detail-info-entry-title">Jumlah</div>
                    <div class="entry number-minus">&nbsp;</div>
                    <div class="entry number">1</div>
                    <div class="entry number-plus">&nbsp;</div>
                </div>
                <div class="detail-info-entry">
                    <a class="button style-10">Tambah ke Keranjang</a>
                    <a class="button style-11"><i class="fa fa-heart"></i> Tambah ke Wishlist</a>
                    <div class="clear"></div>
                </div>
                <div class="share-box detail-info-entry">
                    <div class="title">Bagikan ke Jejaring Sosial</div>
                    <div class="socials-box">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear visible-xs visible-sm"></div>
        <div class="col-md-4 col-lg-3 information-entry product-sidebar">
            <div class="row">
                <div class="col-md-12">
                    <div class="information-blocks production-logo">
                        <div class="background">
                            <div class="logo"><img src="img/production-logo.png" alt="" /></div>
                            <a href="#">Review this producent</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="information-blocks">
                        <div class="information-entry products-list">
                            <h3 class="block-title inline-product-column-title">Featured products</h3>
                            <div class="inline-product-entry">
                                <a href="#" class="image"><img alt="" src="img/product-image-inline-1.jpg"></a>
                                <div class="content">
                                    <div class="cell-view">
                                        <a href="#" class="title">Pullover Batwing Sleeve Zigzag</a>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="inline-product-entry">
                                <a href="#" class="image"><img alt="" src="img/product-image-inline-2.jpg"></a>
                                <div class="content">
                                    <div class="cell-view">
                                        <a href="#" class="title">Pullover Batwing Sleeve Zigzag</a>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="inline-product-entry">
                                <a href="#" class="image"><img alt="" src="img/product-image-inline-3.jpg"></a>
                                <div class="content">
                                    <div class="cell-view">
                                        <a href="#" class="title">Pullover Batwing Sleeve Zigzag</a>
                                        <div class="price">
                                            <div class="prev">$199,99</div>
                                            <div class="current">$119,99</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="information-blocks">
    <div class="tabs-container style-1">
        <div class="swiper-tabs tabs-switch">
            <div class="title">Product info</div>
            <div class="list">
                <a class="tab-switcher active">Overview</a>
                <a class="tab-switcher">Review (<?= count($reviews); ?>)</a>
                <div class="clear"></div>
            </div>
        </div>
        <div>
            <div class="tabs-entry">
                <div class="article-container style-1">
                    <div class="row">
                        <div class="col-md-12 information-entry">
                            <h4>Overview</h4>
                            <?= $barang->overview_1 ?>
                            
                            <?= $barang->overview_2 ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabs-entry">
                <div class="article-container style-1">
                    <div class="row">
                        <div class="col-md-12 information-entry">
                            <h4>Review Produk</h4>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
