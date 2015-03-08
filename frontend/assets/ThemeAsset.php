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
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 2.0
 */
class ThemeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/frontend/themes/globo/assets/';
    public $css = [
        'css/style.css',
        'css/myStyle.css'

    ];
    public $js = [
        'js/media.match.min.js',
        'js/jquery.ba-outside-events.min.js',
//        'js/gomap.js',
//        'js/gmaps.js',
        'js/owl.carousel.js',
        'js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
