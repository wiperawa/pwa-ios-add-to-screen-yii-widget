<?php

namespace wiperawa\pwa\IosAddToScreen;

use yii\web\AssetBundle;

class AddToScreenAsset extends AssetBundle {


    public $css = [
        'css/ios-install-widget.css'
    ];

    public function init()
    {
        parent::init();
        $this->sourcePath = dirname(__DIR__).'/assets';
    }

}