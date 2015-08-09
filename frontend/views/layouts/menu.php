<?php

use common\models\Kategori;
use common\models\Url;
use yii\helpers\Html;

?>

<ul>
    <?php
    foreach(Kategori::find()->where(["parent_id"=>0])->all() as $kategori){
        $url = Url::find()->where(["jenis"=>"k", "data_id"=>$kategori->id])->one();
    ?>
    <li class="full-width">
        <a href="#" class="active"><?php echo $kategori->nama; ?></a><i class="fa fa-chevron-down"></i>
        <div class="submenu">
            <?php
            foreach(Kategori::find()->where(["parent_id"=>$kategori->id])->all() as $kategori2){
                $url2 = Url::find()->where(["jenis"=>"k", "data_id"=>$kategori2->id])->one();
            ?>
            <div class="product-column-entry">
                <div class="image">
                    <?= Html::img(["uploads/kategori/".$kategori2->gambar]) ?>
                </div>
                <div class="submenu-list-title">
                    <?= Html::a($kategori2->nama, ["/".$url2->url], []) ?>
                    <span class="toggle-list-button"></span>
                </div>
                <div class="description toggle-list-container">
                    <ul class="list-type-1">
                        <?php
                        foreach(Kategori::find()->where(["parent_id"=>$kategori2->id])->all() as $kategori3){
                            $url3 = Url::find()->where(["jenis"=>"k", "data_id"=>$kategori3->id])->one();
                            echo '<li>';
                            echo Html::a('<i class="fa fa-angle-right"></i> '.$kategori3->nama, ["/".$url3->url], []);
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </div>
                <!--<div class="hot-mark">hot</div>-->
            </div>
            <?php
            }
            ?>
        </div>
    </li>
    <?php
    }
    ?>
</ul>