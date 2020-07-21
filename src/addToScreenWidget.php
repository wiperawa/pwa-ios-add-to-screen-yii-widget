<?php

namespace wiperawa\pwa\iosAddToScreen;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class AddToScreenWidget extends Widget {

    /**
     * @var array Widget Container Options
     */
    public $containerOptions = [];

    /**
     * @var string Brand img url, should be no more than 48x48 px.
     * defaults to Yii brand img.
     */
    public $brandImg = "@iosWidgetAssetUrl/img/brand-yii.jpg";

    /**
     * @var string welcome text
     */
    public $welcomeText = 'Install @appName on your IPhone: ';

    /**
     * @var string instrruction text
     */
    public $instructionText = "push @iosShareImg and then @iosAddImg to screen 'Home'";

    /**
     * @var int in seconds, hide cookie lifetime, defaults to 1 year
     */
    public $cookieLifeTime = 31536000;

    /**
     * @var string
     */
    public $iosShareImg = "@iosWidgetAssetUrl/img/ios-share.svg";

    /**
     * @var string
     */
    public $iosAddImg = "@iosWidgetAssdetUrl/img/ios-add.svg";

    private $view = '@iosWidgetBasePath/view/ios.php';

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        $asset = addToScreenAsset::register($this->getView());

        Yii::setAlias('@iosWidgetAssetUrl', $asset->baseUrl);
        Yii::setAlias('@iosWidgetBasePath', dirname(__DIR__));

        $this->welcomeText = str_ireplace('@appName', Yii::$app->name);

        $this->instructionText = str_ireplace(
            ['@iosShareImg', '@iosAddImg'],
            [
                Html::img(Yii::getAlias($this->iosShareImg),
                    ['style' => ['width' => '24px','height' => '24px']]),
                Html::img(Yii::getAlias($this->iosAddImg),
                    ['style' => ['width' => '24px','height' => '24px']]),
            ],
            $this->instructionText
        );

    }

    /**
     * @inheritDoc
     * @return string|void
     */
    public function run()
    {
        parent::run();

        return $this->getView()->render(Yii::getAlias($this->view),[
            'containerOptions' => $this->containerOptions,
            'brandImg' => Yii::getAlias($this->brandImg),
            'welcomeText' => $this->welcomeText,
            'instructionText' => $this->instructionText
        ]);
    }
}