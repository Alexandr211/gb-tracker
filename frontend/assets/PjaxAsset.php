<?php
namespace frontend\assets;

use yii\web\AssetBundle;
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 14.12.18
 * Time: 14:55
 */
class PjaxAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/pjax.js',
    ];
    public $depends = [
        '\yii\widgets\PjaxAsset',
    ];


}