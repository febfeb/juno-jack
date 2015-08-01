<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\widgets\Alert;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link rel="shortcut icon" href="theme/images/favicon.png">
    <!--Core CSS -->
    <link href="theme/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="theme/css/bootstrap-reset.css" rel="stylesheet">
    <link href="theme/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Datepicker -->
    <link rel="stylesheet" type="text/css" href="theme/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="theme/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="theme/js/bootstrap-datetimepicker/css/datetimepicker.css" />    

    <!--dynamic table-->
    <link href="theme/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="theme/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="theme/js/data-tables/DT_bootstrap.css" />

    <!--external css-->
    <link rel="stylesheet" type="text/css" href="theme/js/gritter/css/jquery.gritter.css" />

    <!-- Custom styles for this template -->
    <link href="theme/css/style.css" rel="stylesheet">
    <link href="theme/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.html" class="logo">
        <img src="theme/images/logo.png" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <?php if (!Yii::$app->user->isGuest) { ?>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="theme/images/avatar1_small.jpg">
                <span class="username"><?= Yii::$app->user->identity->nama ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><?= Html::a('<i class="fa fa-key"></i> Logout', ['site/logout', 'linkOptions' => ['data-method' => 'post']]) ?></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        <?php } ?>
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <?php if (!Yii::$app->user->isGuest) { ?>
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Data Master</span>
                    </a>
                    <ul class="sub">
                        <li><?= Html::a('Dosen', ['dosen/index']) ?></li>
                        <li><?= Html::a('Program Studi', ['prodi/index']) ?></li>
                        <li><?= Html::a('Kegiatan Dosen', ['kegiatan/index']) ?></li>
                        <li><?= Html::a('Sertifikasi Dosen', ['sertifikasi/index']) ?></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul class="sub">
                        <li><a href="t_kegiatan.html">Transaksi Kegiatan</a></li>
                        <li><a href="t_sertifikasi.html">Transaksi Sertifikasi</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="sub">
                        <li><a href="l_kegiatan.html">Kegiatan</a></li>
                        <li><a href="l_sertifikasi.html">Sertifikasi</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
 <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <?= Alert::widget() ?>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs-alt">
                        <?php
                        if (count($this->breadcrumbs) == 1) {
                            echo '<li><a class="current" href="#">'.$this->breadcrumbs[0].'</a></li>';
                        } else if (count($this->breadcrumbs) == 3) {
                            echo '<li><a href="'.$this->breadcrumbs[1].'">'.$this->breadcrumbs[0].'</a></li>';
                            echo '<li><a class="current" href="#">'.$this->breadcrumbs[2].'</a></li>';
                        } else if (count($this->breadcrumbs) == 5) {
                            echo '<li><a href="'.$this->breadcrumbs[1].'">'.$this->breadcrumbs[0].'</a></li>';
                            echo '<li><a class="active-trail active" href="'.$this->breadcrumbs[3].'">'.$this->breadcrumbs[2].'</a></li>';
                            echo '<li><a class="current" href="#">'.$this->breadcrumbs[4].'</a></li>';
                        } else if (count($this->breadcrumbs) == 7) {
                            echo '<li><a href="'.$this->breadcrumbs[1].'">'.$this->breadcrumbs[0].'</a></li>';
                            echo '<li><a class="active-trail active" href="'.$this->breadcrumbs[3].'">'.$this->breadcrumbs[2].'</a></li>';
                            echo '<li><a class="active-trail active" href="'.$this->breadcrumbs[5].'">'.$this->breadcrumbs[4].'</a></li>';
                            echo '<li><a class="current" href="#">'.$this->breadcrumbs[6].'</a></li>';
                        } else {
                            echo '<li><a href="'.$this->breadcrumbs[1].'">'.$this->breadcrumbs[0].'</a></li>';
                            echo '<li><a class="active-trail active" href="'.$this->breadcrumbs[3].'">'.$this->breadcrumbs[2].'</a></li>';
                            echo '<li><a class="active-trail active" href="'.$this->breadcrumbs[5].'">'.$this->breadcrumbs[4].'</a></li>';
                            echo '<li><a class="active-trail active" href="'.$this->breadcrumbs[7].'">'.$this->breadcrumbs[6].'</a></li>';
                            echo '<li><a class="current" href="#">'.$this->breadcrumbs[8].'</a></li>';
                        }
                        ?>
                    </ul>                
                    <section class="panel">
                        <header class="panel-heading">
                            <?= Html::encode($this->title) ?>
                        </header>
                        <div class="panel-body">
                            <?= $content ?>
                        </div>
                    </section>        
                </div>
            </div>
        </section>
    </section>

<!--main content end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="theme/js/jquery-1.8.3.min.js"></script>
<script src="theme/js/jquery.js"></script>
<script src="theme/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="theme/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="theme/js/jquery.scrollTo.min.js"></script>
<script src="theme/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="theme/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="theme/js/gritter/js/jquery.gritter.js"></script>

<!--Easy Pie Chart-->
<script src="theme/js/easypiechart/jquery.easypiechart.js"></script>

<!--Sparkline Chart-->
<script src="theme/js/sparkline/jquery.sparkline.js"></script>

<!--jQuery Flot Chart
<script src="theme/js/flot-chart/jquery.flot.js"></script>
<script src="theme/js/flot-chart/jquery.flot.resize.js"></script>
<script src="theme/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="theme/js/flot-chart/jquery.flot.pie.resize.js"></script>-->

<!-- datepicker -->
<script type="text/javascript" src="theme/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="theme/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="theme/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="theme/js/bootstrap-daterangepicker/daterangepicker.js"></script>

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="theme/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="theme/js/data-tables/DT_bootstrap.js"></script>
<!--common script init for all pages-->
<script src="theme/js/scripts.js"></script>
<script src="theme/js/advanced-form.js"></script>

<!--dynamic table initialization -->
<script src="theme/js/dynamic_table_init.js"></script>

<!--script for this page
<script src="theme/js/gritter.js" type="text/javascript"></script>-->


</body>
</html>
