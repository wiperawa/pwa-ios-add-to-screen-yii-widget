<?php

namespace wiperawa\pwa\iosAddToScreen;

use yii\web\AssetBundle;

class addToScreenAsset extends AssetBundle {

    public $css = [
        'css/ios-install-widget.css'
    ];

    public function init()
    {
        parent::init();
        $this->sourcePath = __DIR__.'/assets';
    }

}