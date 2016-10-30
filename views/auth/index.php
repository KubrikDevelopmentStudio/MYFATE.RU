<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	use app\assets\AuthAsset;
	AuthAsset::register($this);

    $this->title = "Авторизация";
?>
<!DOCTYPE html>
<html>
    <body>
	<div class="main-signin">
		<div class="main-signin__head">
			<a href="#"><img src="/web/images/logo.png" class="logo"></a>
			<p>Авторизация<p>
		</div>
		<div class="main-signin__middle">
			<div class="middle__form">
				<?php $form = ActiveForm::begin([
					'id' => 'login-form',
					'method' => 'post',
					'action' => ['auth/login']
				]); ?>
				<?= Html::activeInput('text',         $model, 'userLogin',    ['placeHolder' => 'Логин или E-mail']) ?>
				<?= Html::activeInput('password',     $model, 'password',     ['placeHolder' => 'Пароль'])           ?>
				<?= Html::activeInput('submit',       $model, 'submitButton', ['value'       => 'ВОЙТИ'])            ?>
				<br/>
				<label class="lbl1">
					<?= Html::activeInput('checkbox', $model, 'rememberMe',   ['class'       => 'checkReg'])         ?>
					Запомнить меня!
				</label>
				<?php ActiveForm::end() ?>
				<!--<input type="text" placeholder="Логин или E-mail">
				<input type="password" placeholder="Пароль">
				<input type="submit" value="Войти"><br/>
        <label class="lbl1"><input type="checkbox" class="checkReg" />&nbspЗапомнить меня!</label>-->
			</div>
		</div>
		<div class="main-signin__foot">
			<div class="foot">
				<input class="reg aboutPassword" type="submit" value="Забыли пароль?" />
				<input class="reg aboutReg" type="submit" value="Регистрация" />
        <!-- <label class="lbl2"><input type="checkbox" class="checkReg" />&nbspСоглашение о сайте (<span><a class="aMore" href="#">-- Подробнее --</a></span>)</label> -->
			</div>
        </div>

        </div>
          <div id="footerSlice">
            <div class="other">
              <div class="otherField"><p>Привет всем! Это пробный див. Рад всех видеть.Привет всем!</p></div>
            </div>
          </div>
        </body>
        <script type="text/javascript">
           /*$(document).ready(function(){
               setInterval(function() {
                   $('.aMore').on('mouseover', function() {
                     $('.other').css({'display':'table'});
                     $('.other').animate({'margin-top':'-138px', 'opacity':'1'}, {queue:false, duration:500});
                   });
               }, 500);
               setInterval(function() {
                   $('.aMore').on('mouseout', function() {
                     $('.other').animate({'margin-top':'20px', 'opacity':'0'}, {queue:false, duration:500});
                   })
               }, 500);
           });*/
    </script>
</html>
