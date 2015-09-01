<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\themes\budilayout\components;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CustomAsset extends AssetBundle
{
    public $sourcePath = '@backend/themes/budilayout/assets';
    public $css = [
        'css/font-awesome.min.css',
        'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
        //'vendor/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css',
        'vendor/nprogress/nprogress.css',
        'vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
        'vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css',
        'vendor/animate.css/animate.min.css',
        'vendor/summernote/dist/summernote.css',
        'vendor/sweetalert/lib/sweet-alert.css',
        'css/style.css',
    ];
    public $js = [
        //'vendor/requirejs/require.js'
    ];
    //public $jsOptions = ['data-main'=>'app.js'];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
