<?php

use common\models\Url;
use common\models\Warna;
use yii\helpers\Html;
use common\components\Angka;
use common\components\Rating;

$this->title = $kategori->nama;

// Breadcrumbs berdasarkan hirarki kategorinya
$nested_kategori = [];
while (isset($kategori->parent)) {
    $url_kategori = Url::find()->where(['jenis' => 'k', 'data_id' => $kategori->parent->id])->one()->url;

    $kategori = $kategori->parent;
    $nested_kategori[] = ['label' => $kategori->nama, 'url' => ["/" . $url_kategori]];
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
                                <a class="bottom-line-a square add-to-cart" barang_id="<?= $barang->id ?>"><i class="fa fa-shopping-cart"></i></a>
                                <a class="bottom-line-a square add-like" barang_id="<?= $barang->id ?>"><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                        <?php
                        $url_kategori = Url::find()->where(['jenis' => 'k', 'data_id' => $barang->kategori->id])->one()->url;
                        ?>
                        <?= Html::a($barang->kategori->nama, ['/'.$url_kategori], ["class"=>"tag"]) ?>
                        <?= Html::a($barang->nama, ['/'.$url_barang->url], ["class"=>"title"]) ?>
                        <div class="rating-box">
                            <?php 
                            echo Rating::getDiv($barang->review)
                            ?>
                            <div class="reviews-number"><?= $barang->review ?> review</div>
                        </div>
                        <div class="article-container style-1">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="price">
                            <?php if($barang->harga_promo != NULL){ ?>
                            <div class="prev"><?= Angka::toReadableHarga($barang->harga_normal) ?></div>
                            <div class="current"><?= Angka::toReadableHarga($barang->harga_promo) ?></div>
                            <?php }else{ ?>
                            <div class="current"><?= Angka::toReadableHarga($barang->harga_normal) ?></div>
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
            <?php echo $this->render("@frontend/views/barang/barang-kategori-sidebar", ["sidebar_menu"=>$sidebar_menu]); ?>
        </div>
    </div>
</div>

<?php 
$url_cart = yii\helpers\Url::to(["/site/add-to-cart/"]);

$js = '

$(".add-to-cart").click(function(){
    $.ajax({
        url : "'.$url_cart.'",
        data : {
            barang_id : $(this).attr("barang_id"),
            jumlah : 1
        },
        type : "get",
        success : function(msg){
            alert("Barang telah ditambahkan ke keranjang.");
        }
    });
    return false;
});

';
$this->registerJs($js); ?>