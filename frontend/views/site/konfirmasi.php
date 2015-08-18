<?php
$this->title = "Konfirmasi";

$this->params['breadcrumbs'][] = $this->title;

$carts = Yii::$app->session["cart"];
?>

<div class="content-push">
    <div class="information-blocks">
        <h3 class="block-title main-heading"><?= $this->title ?></h3>
        <form method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            
            <div class="row">
                <div class="col-sm-3">
                    <label>No Order <span>*</span></label>
                    <input class="simple-field" name="no_order" type="text" placeholder="No Order (Pesanan) Anda" required="" value="">
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="col-sm-4">
                    <label>Bank Pengirim</label>
                    <div class="simple-drop-down simple-field">
                        <select name="bank_pengirim" required>
                            <option>- Pilih Bank Pengirim -</option>
                            <option value="BCA">BCA</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BNI">BNI</option>
                            <option value="Lainnya">Bank Lainnya</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-sm-4">
                    <label>Bank Tujuan</label>
                    <div class="simple-drop-down simple-field">
                        <select name="bank_tujuan" required>
                            <option>- Pilih Bank Tujuan -</option>
                            <option value="BCA">BCA</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BNI">BNI</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-sm-4">
                    <label>Metode Transfer</label>
                    <div class="simple-drop-down simple-field">
                        <select name="metode_transfer" required>
                            <option>- Pilih Metode Transfer - </option>
                            <option value="ATM">ATM</option>
                            <option value="e-Banking">e-Banking</option>
                            <option value="Counter Bank">Counter Bank</option>
                            <option value="M-Banking">M-Banking (SMS Banking)</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="col-sm-12">
                    <label>No Rekening Pengirim <span>*</span></label>
                    <input class="simple-field" name="no_rekening_pengirim" type="text" placeholder="No Rekening Pengirim" required="" value="">
                    <div class="clear"></div>
                </div>
                
                <div class="col-sm-12">
                    <label>Nama Pengirim <span>*</span></label>
                    <input class="simple-field" name="nama_pengirim" type="text" placeholder="Nama Pengirim" required="" value="">
                    <div class="clear"></div>
                </div>
                
                <div class="col-sm-3">
                    <label>Tanggal Pengiriman <span>*</span></label>
                    <input class="simple-field" name="tanggal_transfer" type="text" placeholder="Contoh : 31-12-2015" required="" value="">
                    <div class="clear"></div>
                </div>
                
                <div class="col-sm-3">
                    <label>Jumlah Nominal Transfer <span>*</span></label>
                    <input class="simple-field" name="nominal_transfer" type="text" placeholder="Nominal Transfer" required="" value="">
                    <div class="clear"></div>
                </div>
                
                <div class="col-sm-12">
                    <label>Catatan Tambahan</label>
                    <textarea class="simple-field" name="catatan" placeholder="" ></textarea>
                    <div class="clear"></div>
                </div>
                
                <div class="col-sm-12">
                    <div class="button style-10">Konfirmasi<input type="submit" value=""></div>
                    <div style="height: 40px"></div>
                </div>
            </div>
        </form>
    </div>
</div>