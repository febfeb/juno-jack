<?php

use common\components\Angka;
use common\models\Barang;
use yii\helpers\Html;
use yii\helpers\Url;
$carts = Yii::$app->session["cart"];
$total = 0;
?>
<div class="cart-box popup">
    <div class="popup-container">
        <?php 
        if(count($carts) != 0){ 
            foreach ($carts as $cart) {
                $barang = Barang::findOne($cart["barang_id"]);
                $subtotal = $barang->harga * $cart["jumlah"];
                $total += $subtotal;
                ?>
                <div class="cart-entry">
                    <?php
                    $img = Html::img($barang->thumbnailUtama);
                    echo Html::a($img, $barang->url, ["class"=>"image"]);
                    ?>
                    <div class="content">
                        <?= Html::a($barang->nama, $barang->url, ["class"=>"title"]); ?>
                        <div class="quantity">Jumlah : <?php echo $cart["jumlah"] ?></div>
                        <div class="price"><?php echo Angka::toReadableHarga($subtotal) ?></div>
                    </div>
                    <div class="button-x hapus-cart" barang_id="<?= $barang->id ?>"><i class="fa fa-close"></i></div>
                </div>
                <?php
            }
        }
        ?>
        <div class="summary">
            <div class="subtotal">Subtotal: <?= Angka::toReadableHarga($total) ?></div>
            <div class="grandtotal">Grand Total <span><?= Angka::toReadableHarga($total) ?></span></div>
        </div>
        <div class="cart-buttons">
            <div class="column">
                <?= Html::a('<i class="fa fa-shopping-cart"></i> Keranjang', ["site/cart"], ["class"=>"button style-3"]); ?>
                <div class="clear"></div>
            </div>
            <div class="column">
                <?= Html::a('<i class="fa fa-check"></i> Checkout', ["member/checkout"], ["class"=>"button style-4"]); ?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php
$url_cart = Url::to(["/site/remove-from-cart/"]);
$this->registerJs('

$(".hapus-cart").click(function(){
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

');
?>