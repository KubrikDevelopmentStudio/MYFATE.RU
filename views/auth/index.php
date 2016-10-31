<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	use app\assets\AuthAsset;
	AuthAsset::register($this);

    $this->title = "Авторизация";
?>
<!DOCTYPE html>
<html>
	<body id="bodyMainForm">
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
				<?= Html::activeInput('text',         $model, 'userLogin',    ['placeHolder' => 'Логин или E-mail', 'class' => 'login-input-auth']) ?>
				<?= Html::activeInput('password',     $model, 'password',     ['placeHolder' => 'Пароль', 'class' => 'pass-input-auth'])           ?>
				<?= Html::activeInput('submit',       $model, 'submitButton', ['value'       => 'ВОЙТИ', 'class' => 'submit-login-auth'])            ?>
				<br/>
				<label class="lbl1">
					<?= Html::activeInput('checkbox', $model, 'rememberMe',   ['class'       => 'checkReg'])         ?>
					Запомнить меня!
				</label>
				<?php ActiveForm::end() ?>
			</div>
		</div>
		<div class="main-signin__foot">
			<div class="foot">
				<input class="reg aboutPassword submit-login-auth" type="submit" value="Забыли пароль?" />
				<input class="reg aboutReg submit-login-auth" type="submit" value="Регистрация" />
        <!-- <label class="lbl2"><input type="checkbox" class="checkReg" />&nbspСоглашение о сайте (<span><a class="aMore" href="#">-- Подробнее --</a></span>)</label> -->
			</div>
        </div>

        </div>
          <div id="footerSlice">
            <div class="other">
              <div class="otherField"><p>Привет всем! Это пробный див. Рад всех видеть.Привет всем!</p></div>
            </div>
          </div>

	<!--ФОРМА РЕГИСТРАЦИИ-->
	<div class="main-signin1 hiddenMainField">
		<div class="main-signin__head1">
			<a href="#"><img src="/web/images/logo.png" class="logo"></a>
			<p>Регистрация<p>
		</div>
		<div class="main-signin__middle1">
			<div class="middle__form1">
				<input type="text" placeholder="Логин" class="loginForm1 loginForm1ForBorder"><br/><hr class="hr" /><br/>
				<input type="text" class="emailOnSignin1 loginForm1" placeholder="E-mail">
				<input type="password" placeholder="Пароль" class="passForm1">
				<input type="password" placeholder="Подтвердите пароль" class="passForm1"><br/><hr class="hr" /><br/>
				<input type="text" maxlength="2" class="dataDay" placeholder="ДД"><input type="text" maxlength="8" class="dataMonth" placeholder="МЕСЯЦ"><input type="text" maxlength="4" class="dataYear" placeholder="ГОД"><br/><br/>
				<label><input type="checkbox">&nbspПринять правила сайта</label>
				<label class="lbl2"><input type="checkbox" class="checkReg" />&nbspОтправлять оповещение на почту (<span><a class="aMore" href="#">подробнее</a></span>)</label>
				<input type="submit" value="Зарегистрироваться" class="submitForm1">
				<img src="/web/images/arrow.png" class="revertToAut">
			</div>
		</div>
		<div class="main-signin__foot1">
			<!--<img src="/web/images/arrow.png" class="revertToAut">-->
		</div>
	</div>
	</body>
</html>
