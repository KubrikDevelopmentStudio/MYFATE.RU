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
						'id'     => 'login-form',
						'method' => 'post',
						'action' => ['auth/login']
					]); ?>
					<?= Html::activeInput('text', $model, 'userLogin', ['placeHolder' => 'Логин или E-mail', 'class' => 'login-input-auth']) ?>
					<?= Html::activeInput('password', $model, 'password', ['placeHolder' => 'Пароль', 'class' => 'pass-input-auth']) ?>
					<?= Html::activeInput('submit', $model, 'loginButton', ['value' => 'ВОЙТИ', 'class' => 'submit-login-auth']) ?>
					<br/>
					<label class="lbl1">
						<?= Html::activeInput('checkbox', $model, 'rememberMe', ['class' => 'checkReg'])         ?>
						Запомнить меня!
					</label>
					<?php ActiveForm::end() ?>
				</div>
			</div>
			<!--КНОПКИ ЗАБЫЛИ ПАРОЛЬ И РЕГИСТРАЦИЯ-->
			<div class="main-signin__foot">
				<div class="foot">
					<!--ЗАБЫЛИ ПАРОЛЬ-->
					<?php $form = ActiveForm::begin([
						'method' => 'post',
						'action' => ['auth/forgot']
					]); ?>
						<?= Html::activeInput('submit', $model, 'forgotButton', ['value' => 'Забыли пароль?', 'class' => 'reg aboutPassword submit-login-auth']) ?>
					<?php ActiveForm::end() ?>
					<!--РЕГИСТРАЦИЯ-->
					<?php $form = ActiveForm::begin([
						'method' => 'post',
						'action' => ['auth/register']
					]); ?>
						<?= Html::activeInput('submit', $model, 'registerButton', ['value' => 'Регистрация', 'class' => 'reg aboutReg submit-login-auth']) ?>
					<?php ActiveForm::end() ?>

				</div>
			</div>
		</div>
	</body>
</html>
