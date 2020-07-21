<?php

use yii\helpers\Html;

/**
 *
 * @var $this \yii\web\View
 * @var $containerOptions array
 * @var $brandImg string
 * @var $welcomeText string
 * @var $instructionText string
 *
 */

?>

<?=
Html::tag('div',
    Html::tag('div',
        Html::tag('div',
            <<<PATH
<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
PATH.
            Html::img($brandImg, ['class' => 'pwa-ios-brang-img']).
            Html::tag('div',
                $welcomeText.' '.$instructionText,
                ['class' => 'pwa-ios-instruction-div']
                )
            ,
            ['class' => 'pwa-ios-speech-bubble']
            ),
        ['class' => 'pwa-ios-install']
    ),
    array_merge(['class' => 'pwa-ios-install-container'], $containerOptions)
    )
?>

