<?php

use common\models\Url;
use yii\helpers\Html;

$this->title = $kategori->nama;

// Breadcrumbs berdasarkan hirarki kategorinya
$nested_kategori = [];
while (isset($kategori->parent)) {
    $kategori = $kategori->parent;
    $nested_kategori[] = ['label' => $kategori->nama, 'url' => ["/" . $kategori->url->url]];
}
$index = count($nested_kategori);
while ($index) {
    $this->params['breadcrumbs'][] = $nested_kategori[--$index];
}
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="information-blocks">
    <div class="row">
        <div class="col-md-9 col-md-push-3 col-sm-8 col-sm-push-4">
            <div class="page-selector">
                <div class="pages-box hidden-xs">
                    <a href="#" class="square-button active">1</a>
                    <a href="#" class="square-button">2</a>
                    <a href="#" class="square-button">3</a>
                    <div class="divider">...</div>
                    <a href="#" class="square-button"><i class="fa fa-angle-right"></i></a>
                </div>
                <div class="shop-grid-controls">
                    <div class="entry">
                        <div class="inline-text">Sort by</div>
                        <div class="simple-drop-down">
                            <select>
                                <option>Alfabet (A-Z)</option>
                                <option>Harga Termural</option>
                                <option>Harga Termahal</option>
                                <option>Terbaru</option>
                            </select>
                        </div>
                        <div class="sort-button"></div>
                    </div>
                    <div class="entry">
                        <div class="view-button active grid"><i class="fa fa-th"></i></div>
                        <div class="view-button list"><i class="fa fa-list"></i></div>
                    </div>
                    <div class="entry">
                        <div class="inline-text">Show</div>
                        <div class="simple-drop-down" style="width: 75px;">
                            <select>
                                <option>12</option>
                                <option>20</option>
                                <option>30</option>
                                <option>40</option>
                                <option>all</option>
                            </select>
                        </div>
                        <div class="inline-text">per page</div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="row shop-grid grid-view">

                <?php
                foreach($barangs as $barang){
                    $thumbnail = $barang->thumbnailUtama;
                    $thumbnail2 = $barang->thumbnailAlternatif;
                    $url_barang = Url::find()->where(['jenis' => 'b', 'data_id' => $barang->id])->one();
                ?>
                <div class="col-md-3 col-sm-4 shop-grid-item">
                    <div class="product-slide-entry shift-image">
                        <div class="product-image">
                            <img src="<?= $thumbnail ?>" alt="" />
                            <img src="<?= $thumbnail2 ?>" alt="" />
                            <div class="bottom-line left-attached">
                                <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                        <?= Html::a($barang->kategori->nama, ['/'.$barang->kategori->url->url], ["class"=>"tag"]) ?>
                        <?= Html::a($barang->nama, ['/'.$url_barang->url], ["class"=>"title"]) ?>
                        <div class="rating-box">
                            <?php 
                            echo \common\components\Rating::getDiv($barang->review)
                            ?>
                            <div class="reviews-number"><?= $barang->review ?> review</div>
                        </div>
                        <div class="article-container style-1">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="price">
                            <?php if($barang->harga_promo != NULL){ ?>
                            <div class="prev"><?= common\components\Angka::toReadableHarga($barang->harga_normal) ?></div>
                            <div class="current"><?= common\components\Angka::toReadableHarga($barang->harga_promo) ?></div>
                            <?php }else{ ?>
                            <div class="current"><?= common\components\Angka::toReadableHarga($barang->harga_normal) ?></div>
                            <?php } ?>
                        </div>
                        <div class="list-buttons">
                            <a class="button style-10">Add to cart</a>
                            <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php } ?>
            </div>
            <div class="page-selector">
                <div class="description">Showing: 1-3 of 16</div>
                <div class="pages-box">
                    <a href="#" class="square-button active">1</a>
                    <a href="#" class="square-button">2</a>
                    <a href="#" class="square-button">3</a>
                    <div class="divider">...</div>
                    <a href="#" class="square-button"><i class="fa fa-angle-right"></i></a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-md-3 col-md-pull-9 col-sm-4 col-sm-pull-8 blog-sidebar">
            <div class="information-blocks categories-border-wrapper">
                <div class="block-title size-3">Categories</div>
                <div class="accordeon">
                    <div class="accordeon-entry">
                        <div class="article-container style-1">
                            <ul>
                                <?php
                                foreach ($sub_kategori as $sub) {
                                ?>
                                <li><?php echo Html::a($sub->nama, ['/'.$sub->url->url], ['class' => '']) ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by sizes</div>
                <div class="range-wrapper">
                    <div id="prices-range"></div>
                    <div class="range-price">
                        Price: 
                        <div class="min-price"><b>&pound;<span>0</span></b></div>
                        <b>-</b>
                        <div class="max-price"><b>&pound;<span>200</span></b></div>
                    </div>
                    <a class="button style-14">filter</a>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by sizes</div>
                <div class="size-selector">
                    <div class="entry active">xs</div>
                    <div class="entry">s</div>
                    <div class="entry">m</div>
                    <div class="entry">l</div>
                    <div class="entry">xl</div>
                    <div class="spacer"></div>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by brands</div>
                <div class="row">
                    <div class="col-xs-6">
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Armani
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Bershka Co
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Nelly.com
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Zigzag Inc
                        </label>  
                    </div>
                    <div class="col-xs-6">
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Armani
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Bershka Co
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Nelly.com
                        </label>
                        <label class="checkbox-entry">
                            <input type="checkbox" /> <span class="check"></span> Zigzag Inc
                        </label> 
                    </div>
                </div>
            </div>

            <div class="information-blocks">
                <div class="block-title size-2">Sort by colours</div>
                <div class="color-selector detail-info-entry">
                    <div style="background-color: #cf5d5d;" class="entry active"></div>
                    <div style="background-color: #c9459f;" class="entry"></div>
                    <div style="background-color: #689dd4;" class="entry"></div>
                    <div style="background-color: #68d4aa;" class="entry"></div>
                    <div style="background-color: #a8d468;" class="entry"></div>
                    <div style="background-color: #d4c368;" class="entry"></div>
                    <div style="background-color: #c2c2c2;" class="entry"></div>
                    <div style="background-color: #000000;" class="entry"></div>
                    <div style="background-color: #f0f0f0;" class="entry"></div>
                    <div class="spacer"></div>
                </div>
            </div>

        </div>
    </div>
</div>
