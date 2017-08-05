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
        'app_css/bootstrap.min.css',
        'font-awesome/css/font-awesome.css',
        'app_css/animate.css',
        'app_css/style.css',
    ];
    public $js = [
        // Mainly scripts
        //'js/jquery-2.1.1.js',
        'app_js/bootstrap.min.js',
        'app_js/plugins/metisMenu/jquery.metisMenu.js',
        'app_js/plugins/slimscroll/jquery.slimscroll.min.js',

        // Custom and plugin javascript
        'app_js/inspinia.js',
        'app_js/plugins/pace/pace.min.js',    
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
