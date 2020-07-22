<p align="center"> <h1 align="center"> Yii2 PWA 'add app to screen' message widget for iOS</h1>


Progressive Web Apps 'Add app to screen' message widget.

<p align="center">
    <img align="center" src="https://github.com/wiperawa/pwa-ios-add-to-screen-yii-widget/blob/master/example.png?raw=true">
</p>

As you know, if you have  PWA-compatible site, android will prompt to add its icon to desktop by default, but iOS dont have this, so we have to add such message manually.
 
This widget adds message at bottom of the page only when user-agent is iOS and we are not in 'standalone' mode(app allready added to screen).

By closing this message box, widget set limited-time cookie, when this cookie active message will not be shown(see widget config for details).

## installation

   The preferred way to install this extension is through [composer](http://getcomposer.org/download/).
   
   Either run
   
   ```
   $ php composer.phar require wiperawa/pwa-ios-add-to-screen-yii-widget "dev-master"
   ```
   
   or add
   
   ```
   "wiperawa/pwa-ios-add-to-screen-yii-widget": "dev-master"
   ```
   
   to the ```require``` section of your `composer.json` file.

## usage

Here is the Widget usage example, with DEFAULT parameters, if you dont want to change it, can omit them.
```php
use wiperawa\pwa\IosAddToScreen\AddToScreenWidget;

//...

AddToScreenWidget::widget([
    'containerOptions' => [], 

    //Brand img url, should not be bigger than 48x48 px.
    'brandImg' => "@iosWidgetAssetUrl/img/brand-yii.png",

    // welcome text
    'welcomeText' => 'Install @appName on your IPhone: ',

    //instruction text
    'instructionText' => "push @iosShareImg and then @iosAddImg to screen 'Home'",

    //seconds, hide cookie lifetime, defaults to 1 year
    'cookieLifeTime' => 31536000,
    
    //iOS 'share' button img.
    'iosShareImg' => "@iosWidgetAssetUrl/img/ios-share.svg",

    //iOS 'add' button img
    'iosAddImg' => "@iosWidgetAssetUrl/img/ios-add.svg"
]);

```

in case you want to use translated mesasges, leave @appName, @iosShareImg and @iosAddImg on place, and widget will replace them automatically.
