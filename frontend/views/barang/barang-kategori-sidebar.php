<?php

use common\models\Warna;

?>
<div class="information-blocks">
    <div class="block-title size-3">Kategori</div>
    <div>
        
        <?php foreach ($sidebar_menu as $menu) { ?>
        <div class="kategori_list" style="padding: 5px 0px 5px <?= $menu["space"]*20 ?>px">
            <?= \yii\helpers\Html::a($menu["label"]."<span class='pull-right'>(".$menu["count"].")</span>", $menu["url"], []); ?>
        </div>
        <?php } ?>
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
        <!--<div style="background-color: #cf5d5d;" class="entry active"></div>-->
        <?php
        $warnas = Warna::find()->all();
        foreach($warnas as $warna) {
            echo '<div style="background-color: #'.$warna->rgb.';" class="entry"></div>';
        }
        ?>
        <div class="spacer"></div>
    </div>
</div>