<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

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
        'theme/css/bootstrap/bootstrap.min.css',
        'theme/css/libs/font-awesome.css',
        'theme/css/libs/nanoscroller.css',
        'theme/css/compiled/theme_styles.css',
        'theme/css/libs/datepicker.css',
        'theme/css/libs/daterangepicker.css',
        'theme/css/libs/bootstrap-timepicker.css',
        'theme/css/libs/select2.css',
        //'css/site.css',
    ];
    public $js = [
        //'theme/js/demo-skin-changer.js',
        //'theme/js/jquery.js',
        //'theme/js/bootstrap.js',
        'theme/js/jquery.nanoscroller.min.js',
        'theme/js/jquery.maskedinput.min.js',
        'theme/js/bootstrap-datepicker.js',
        'theme/js/moment.min.js',
        'theme/js/daterangepicker.js',
        'theme/js/bootstrap-timepicker.min.js',
        'theme/js/select2.js',
        'theme/js/hogan.js',
        'theme/js/typeahead.min.js',
        'theme/js/jquery.pwstrength.js',
        'theme/js/scripts.js',
        'theme/js/pace.min.js',
        'theme/js/jquery.dataTables.js',
        'theme/js/dataTables.fixedHeader.js',
        'theme/js/dataTables.tableTools.js',
        'theme/js/jquery.dataTables.bootstrap.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
