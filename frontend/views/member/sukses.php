<?php
$this->title = "Informasi";

$this->params['breadcrumbs'][] = $this->title;

$carts = Yii::$app->session["cart"];
?>

<div class="content-push">
    <div class="information-blocks">
        <div class="block-title size-3"><?= $this->title ?></div>
        <div class="company-information-box">
            <div class="image">
                <?= \yii\helpers\Html::img(["/images/ib.jpg"]) ?>
            </div>
            <div class="text">
                <div class="cell-view">
                    <div class="description">
                        Lakukan pembayaran secara transfer ataupun Internet Banking pada :
                        <br>
                        No Rekening : 148-000-000-000
                        <br>
                        a/n PT. Visi Fokus Indonesia
                        <br>
                        <br>
                        Setelah melakukan transfer, harap mengisi form konfirmasi di :
                        <br>
                        <?= \yii\helpers\Html::a("Konfirmasi", ["site/konfirmasi"], ["class"=>"button style-18"]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>