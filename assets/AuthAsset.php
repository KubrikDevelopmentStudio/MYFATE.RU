<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.10.16
 * Time: 18:46
 */

namespace app\assets;


use yii\web\AssetBundle;

class AuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/auth/auth-style.css',
        'css/reg/reg-style.css',
        'css/messages/msg-style.css'
    ];
    public $js = [
        'js/jquery.js',
        'js/main.js',
        'js/alert-msg.js'
    ];
    public $depends = [
        /*'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}