<?php

use common\models\Pengaturan;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="footer-wrapper style-2">
    <footer class="type-1">
        <div class="footer-columns-entry">
            <div class="row">
                <div class="col-md-3">
                    <?php echo Html::img(["images/logo.png"], ["class" => "footer-logo"]); ?>
                    <div class="footer-description"></div>
                    <div class="footer-address"><?php echo Pengaturan::getPengaturan("alamat") ?><br/>
                        Phone: <?php echo Pengaturan::getPengaturan("no_telp") ?><br/>
                        Email: <a href="mailto:<?php echo Pengaturan::getPengaturan("email") ?>"><?php echo Pengaturan::getPengaturan("email") ?></a><br/>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <h3 class="column-title">Our Services</h3>
                    <ul class="column">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Custom Service</a></li>
                        <li><a href="#">Terms &amp; Condition</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Returns</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <h3 class="column-title">Our Services</h3>
                    <ul class="column">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Custom Service</a></li>
                        <li><a href="#">Terms &amp; Condition</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Returns</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <h3 class="column-title">Our Services</h3>
                    <ul class="column">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Custom Service</a></li>
                        <li><a href="#">Terms &amp; Condition</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Returns</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-3">
                    <h3 class="column-title">Company working hours</h3>
                    <div class="footer-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</div>
                    <div class="footer-description">
                        <b>Monday-Friday:</b> 8.30 a.m. - 5.30 p.m.<br/>
                        <b>Saturday:</b> 9.00 a.m. - 2.00 p.m.<br/>
                        <b>Sunday:</b> Closed
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-navigation">
            <div class="cell-view">
                <div class="footer-links">
                    <a href="#">Site Map</a>
                    <a href="#">Search</a>
                    <a href="#">Terms</a>
                    <a href="#">Advanced Search</a>
                    <a href="#">Orders and Returns</a>
                    <a href="#">Contact Us</a>
                </div>
            </div>
            <div class="cell-view">
                <div class="payment-methods">
                    <a href="#"><img src="<?= Url::to(["/theme/img/payment-method-1.png"]) ?>" alt="" /></a>
                    <a href="#"><img src="<?= Url::to(["/theme/img/payment-method-2.png"]) ?>" alt="" /></a>
                    <a href="#"><img src="<?= Url::to(["/theme/img/payment-method-3.png"]) ?>" alt="" /></a>
                    <a href="#"><img src="<?= Url::to(["/theme/img/payment-method-4.png"]) ?>" alt="" /></a>
                    <a href="#"><img src="<?= Url::to(["/theme/img/payment-method-5.png"]) ?>" alt="" /></a>
                    <a href="#"><img src="<?= Url::to(["/theme/img/payment-method-6.png"]) ?>" alt="" /></a>
                </div>
            </div>
        </div>
    </footer>
</div>