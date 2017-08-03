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
class LandingAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // Bootstrap core
        'landing_css/bootstrap.min.css',            
        // Animation CSS
        'landing_css/animate.min.css',
        'font-awesome/css/font-awesome.min.css',
        'landing_css/style.css',
    ];
    public $js = [
        'landing_js/jquery-2.1.1.js',
        'landing_js/pace.min.js',
        'landing_js/bootstrap.min.js',
        'landing_js/classie.js',
        'landing_js/cbpAnimatedHeader.js',
        'landing_js/wow.min.js',
        'landing_js/inspinia.js',    
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
