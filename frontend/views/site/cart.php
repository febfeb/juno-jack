<?php
$this->title = "Keranjang Belanja";

$this->params['breadcrumbs'][] = $this->title;

$carts = Yii::$app->session["cart"];
?>

<div class="information-blocks">
    <div class="row">
        <div class="col-sm-12">
            <div class="block-title size-5"><?= $this->title ?></div>
            
            <?php if(count($carts) != 0){ ?>
            <div class="wishlist-header hidden-xs">
                <div class="title-1">Nama Produk</div>
                <div class="title-2"></div>
            </div>
            <div class="wishlist-box">
                <?php
                foreach ($carts as $cart) {
                    $barang = \common\models\Barang::findOne($cart["barang_id"]);
                ?>
                <div class="wishlist-entry">
                    <div class="column-1">
                        <div class="traditional-cart-entry">
                            <?php
                            $img = \yii\helpers\Html::img($barang->thumbnailUtama);
                            echo \yii\helpers\Html::a($img, $barang->url, ["class"=>"image"]);
                            ?>
                            <div class="content">
                                <div class="cell-view">
                                    <?php
                                    echo \yii\helpers\Html::a($barang->nama, $barang->url, ["class"=>"tag"]);
                                    echo \yii\helpers\Html::a($barang->overview_1, $barang->url, ["class"=>"title"]);
                                    ?>
                                    <div class="inline-description">Jumlah : <?= $cart["jumlah"] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column-2" style="text-align: center">
                        <a class="remove-button" barang_id="<?= $cart["barang_id"] ?>"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php
            }else{
            ?>

                <div style="text-align: center">Anda tidak memiliki barang di dalam Keranjang Belanja.</div>

            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php 
$url_cart = yii\helpers\Url::to(["/site/remove-from-cart/"]);

$js = '

$(".remove-button").click(function(){
    if(confirm("Apakah Anda yakin ingin menghapus barang ini ?")){
        $.ajax({
            url : "'.$url_cart.'",
            data : {
                barang_id : $(this).attr("barang_id")
            },
            type : "get",
            success : function(msg){
                window.location.reload();
            }
        });
    }
    return false;
});

';
$this->registerJs($js); ?>