<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/css/bootstrap.min.css',
        'theme/css/idangerous.swiper.css',
        'theme/css/font-awesome.min.css',
        'theme/css/style.css',
    ];
    public $js = [
        'theme/js/jquery-2.1.3.min.js',
        'theme/js/idangerous.swiper.min.js',
        'theme/js/global.js',
        'theme/js/jquery.mousewheel.js',
        'theme/js/jquery.jscrollpane.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
