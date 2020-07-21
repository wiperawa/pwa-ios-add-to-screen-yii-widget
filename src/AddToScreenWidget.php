<?php

namespace wiperawa\pwa\IosAddToScreen;

use Yii;
use yii\base\Widget;

class AddToScreenWidget extends Widget {

    /**
     * @var array Widget Container Options
     */
    public $containerOptions = [];

    /**
     * @var string Brand img url, should not be bigger than 48x48 px.
     * defaults to Yii brand img.
     */
    public $brandImg = "@iosWidgetAssetUrl/img/brand-yii.png";

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
    public $iosAddImg = "@iosWidgetAssetUrl/img/ios-add.svg";

    /**
     * @var string view filename
     */
    private $view = '@iosWidgetBasePath/src/view/ios.php';

    /**
     * @var string cookie name
     */
    private $cookieName = "ios_add_app_dialog_closed";

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();

        $asset = AddToScreenAsset::register($this->getView());

        Yii::setAlias('@iosWidgetAssetUrl', $asset->baseUrl);

        Yii::setAlias('@iosWidgetBasePath', dirname(__DIR__));

        $this->welcomeText = str_ireplace(
            '@appName',
            Yii::$app->name,
            $this->welcomeText
        );

    }

    /**
     * @inheritDoc
     * @return string|void
     */
    public function run()
    {
        if ( !isset($_COOKIE[$this->cookieName]) ) {
            $this->registerJs();
            return $this->getView()->renderFile(Yii::getAlias($this->view), [
                'containerOptions' => $this->containerOptions,
                'brandImg' => Yii::getAlias($this->brandImg),
                'welcomeText' => $this->welcomeText,
                'instructionText' => $this->instructionText,
                'iosShareImg' => $this->iosShareImg,
                'iosAddImg' => $this->iosAddImg
            ]);
        }

        return;
    }

    private function registerJs()
    {
        $js = <<<JS
document.querySelector('.pwa-ios-close-install').addEventListener('click', function(e)
{
    let exDate = new Date();
    exDate.setSeconds(exDate.getSeconds() + {$this->cookieLifeTime});
    let cValue = '1' + "; sameSite=Lax; expires=" + exDate.toUTCString();
    document.cookie = "{$this->cookieName}=" + cValue;
    document.querySelector('.pwa-ios-install').style.display = 'none';
});
JS;

        $this->getView()->registerJs($js);
    }
}