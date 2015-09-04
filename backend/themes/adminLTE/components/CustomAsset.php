<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\themes\adminLTE\components;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CustomAsset extends AssetBundle
{
    public $sourcePath = '@backend/themes/adminLTE/assets';
    public $css = [
    	'css/pace.css',
    	'css/buttons.css',
        'css/jquery-ui.min.css',
        'css/jquery.tagsinput.css',
        'css/font-awesome.css',
        'css/jquery.msg.css',
        'css/style.css',
    ];
    public $js = [
    	'js/pace.min.js',
        'js/jquery.maskMoney.js',
        'js/jquery.tagsinput.js',
        'js/jquery-ui.min.js',
        'js/jquery.newsTicker.js',
        'js/masonry.pkgd.min.js',
        'js/holder.min.js',
        'js/jquery.scrollTo.js',
        'js/jquery.parallax.js',
        'js/jquery.nav.js',
        'js/jquery.center.min.js',
        'js/jquery.msg.min.js',
        'js/app.js'
    ];
    
    public $depends = [
        
    ];
}
