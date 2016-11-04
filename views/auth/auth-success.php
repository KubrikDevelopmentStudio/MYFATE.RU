﻿<?php

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
				<?= Html::activeInput('text',         $model, 'userLogin',    ['placeHolder' => 'Логин или E-mail', 'class' => 'login-input-auth']) ?>
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
		<div class='success'>Вы успешно авторизировались!</div>
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
                <?php $form = ActiveForm::begin([
                    'id'     => 'reg-form',
                    'method' => 'post',
                    'action' => ['auth/register']
                ]); ?>
                <!--Поле Логина пользователя-->
                <?= Html::activeInput('text',   $model, 'regUserLogin',    ['placeHolder' => 'Введите ваш логин', 'class' => 'loginForm1 loginForm1ForBorder']) ?>
                <br/><hr class="hr" /><br/>
                <!--Email пользователя-->
                <?= Html::activeInput('text',   $model, 'regUserEmail',    ['placeHolder' => 'Введите ваш Email', 'class' => 'loginForm1 emailOnSignin1']) ?>
                <!--Блок ввода пароля и его повторения-->
                <?= Html::activeInput('text',   $model, 'regUserPassFirst',    ['placeHolder' => 'Введите ваш пароль', 'class' => 'passForm1']) ?>
                <?= Html::activeInput('text',   $model, 'regUserPassSecond',    ['placeHolder' => 'Введите ваш пароль ещё раз', 'class' => 'passForm1']) ?>
                <br/><hr class="hr" /><br/>
                <!--Блок Даты рождения-->
                <?= Html::activeInput('text',   $model, 'dateDay',    ['placeHolder' => 'ДД', 'maxlength' => '2', 'id' => 'dD', 'class' => 'dataDay']) ?>
                <?= Html::activeInput('text',   $model, 'dateMonth',    ['placeHolder' => 'МЕСЯЦ', 'id' => 'dM','class' => 'dataMonth']) ?>
                <?= Html::activeInput('text',   $model, 'dateYear',    ['placeHolder' => 'ГОД', 'maxlength' => '4', 'id' => 'dY','class' => 'dataYear']) ?>
                <br/><br/>
                <label>
                    <?= Html::activeInput('checkBox',   $model, 'agreement',    ['class' => 'agreement']) ?>
                    Принять правила сайта
                </label>
				<label class="lbl2">
                    <?= Html::activeInput('checkbox',   $model, 'checkReg',    ['class' => 'checkReg']) ?>
                    Отправлять оповещение на почту(<span><a class="aMore" href="#">подробнее</a></span>)
                </label>

				<input type="submit" value="Зарегистрироваться" class="submitForm1">
                <?php ActiveForm::end() ?>
				<img src="/web/images/arrow.png" class="revertToAut">
			</div>
		</div>
		<div class="main-signin__foot1">
		</div>
	</div>
	</body>
</html>
