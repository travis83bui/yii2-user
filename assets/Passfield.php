<?php

namespace vinhphuc\user\assets;

use yii\web\AssetBundle;

class Passfield extends AssetBundle
{
    public $sourcePath = '@vinhphuc/user/assets/passfield';
    public $css = [
        'css/passfield.min.css',
    ];
    public $js = [
        'js/passfield.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
