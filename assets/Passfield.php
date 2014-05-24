<?php

namespace travis83bui\user\assets;

use yii\web\AssetBundle;

class Passfield extends AssetBundle
{
    public $sourcePath = '@travis83bui/user/assets/passfield';
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
