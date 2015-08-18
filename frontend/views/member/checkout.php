<?php
$this->title = "Checkout";

$this->params['breadcrumbs'][] = $this->title;

$carts = Yii::$app->session["cart"];
?>

<div class="content-push">
    <div class="information-blocks">
        <div class="block-title size-3"><?= $this->title ?></div>
        
        <div style="height: 30px;"></div>
        
        <div class="block-title size-6">Detail Pembelian</div>
        
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
        
        <div class="accordeon size-1">
            <div class="accordeon-title active"><span class="number">1</span>Alamat Pengiriman</div>
            <div style="display: block;" class="accordeon-entry">
                <div class="article-container style-1">
                    <div class="row">
                        <div class="col-md-6 information-entry">
                            <form id="form_alamat">
                                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                                
                                <label>Nama Lengkap<span>*</span></label>
                                <input type="text" name="nama_lengkap" class="simple-field size-1" placeholder="Nama Lengkap" value="">
                                
                                <label>Telepon<span>*</span></label>
                                <input type="text" name="telepon" class="simple-field size-1" placeholder="Telepon" value="">
                                
                                <label>Alamat Lengkap <span>*</span></label>
                                <textarea name="alamat" class="simple-field size-1" placeholder="Alamat" required></textarea>
                                
                                <label>Negara</label>
                                <div class="simple-drop-down simple-field size-1">
                                    <select name="negara">
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Malaysia">Malaysia</option>
                                    </select>
                                </div>
                                
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" class="simple-field size-1" placeholder="Kode Pos" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordeon-title"><span class="number">2</span>Ongkos Kirim</div>
            <div class="accordeon-entry">
                <div class="article-container style-1">
                    <p></p>
                </div>
            </div>
            
            <div style="height: 30px;"></div>
            <center>
                <?= \yii\helpers\Html::a("lanjutkan", ["member/sukses"], ["class"=>"button style-18", "id"=>"lanjut_btn"]) ?>
            </center>
            <div style="height: 30px;"></div>
        </div>
        
        <?php 
        $url = yii\helpers\Url::to(["member/simpan-data-pengiriman"]);
        $this->registerJs('
                
$("#lanjut_btn").click(function(){
    var url = $(this).attr("href");
    $.ajax({
        url : "'.$url.'",
        data : $("#form_alamat").serialize(),
        type : "post",
        success : function(msg){
            window.location = url;
        }
    });
    return false;
});

                '); ?>
        
        <?php
        }else{
        ?>

            <div style="text-align: center">Anda tidak memiliki barang di dalam Keranjang Belanja.</div>

        <?php
        }
        ?>
    </div>
</div>