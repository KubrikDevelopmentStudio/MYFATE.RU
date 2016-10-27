<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\models\LoginForm;

$this->title = 'Авторизация';
?>

<body> 
    <div class="main-signin"> 
        <div class="main-signin__head"> 
            <p>Авторизация<p> 
        </div> 
        <div class="main-signin__middle"> 
            <div class="middle__form"> 
                <input type="text"     placeholder="Логин"> 
                <input type="password" placeholder="Пароль"> 
                <input type="submit"   value="Войти"> 
            </div> 
        </div> 
        <div class="main-signin__foot"> 
            <div class="foot"> 
                <p>Вы еще не зарегистрированы?</p> 
                <input class="reg" type="submit" value="Регистрация" /> 
                <label><input type="checkbox" class="checkReg" />Запомнить меня!</label> 
                <label><input type="checkbox" class="checkReg" />Соглашение сайте (<span><a class="aMore" href="#">— Подробнее —</a></span>)</label> 
            </div> 
        </div> 
    </div> 
</body> 

<?php
    $form = ActiveForm::begin([
        'id' => 'authForm'
    ]);
?>


<?php ActiveForm::end(); ?>


