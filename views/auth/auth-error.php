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
				<?= Html::activeInput('text',         $model, 'userLogin',    ['placeHolder' => 'Логин или E-mail', 'class' => "login-input-auth"]) ?>
				<?= Html::activeInput('password',     $model, 'password',     ['placeHolder' => 'Пароль', 'class' => 'pass-input-auth'])            ?>
				<?= Html::activeInput('submit',       $model, 'submitButton', ['value'       => 'ВОЙТИ', 'class' => 'submit-login-auth'])           ?>
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
		<!--БЛОК ДЛЯ ВЫВОДА ОШИБОК!-->
	    <?php if($model->hasErrors()) {
	    	foreach ($model->errors as $errorInfo) {
	    		for ($i=0; $i < count($errorInfo); $i++) {
					echo "<div class='error'>Ошибка: $errorInfo[$i]</div>";
				}
			}
		} ?>
	</body>
</html>
