<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.10.16
 * Time: 21:24
 */

namespace app\models;

use yii\base\Model;

class AuthForm extends Model
{
    /*Элементы для формы авторизации*/
    public $userLogin;
    public $password;
    public $rememberMe;
    public $submitButton;

    /*Элементы для формы регистрации*/
    public $regUserLogin;
    public $regUserEmail;
    public $regUserPassFirst;
    public $regUserPassSecond;
    public $dateDay;
    public $dateMonth;
    public $dateYear;
    public $agreement;
    public $checkReg;

    /*Сценарии модели*/
    const SCENARIO_LOGIN    = 'login';
    const SCENARIO_REGISTER = 'register';

    /**
     * @return array
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_LOGIN    => ['userLogin',     'password'],
            self::SCENARIO_REGISTER => ['regUserLogin', 'regUserEmail', 'regUserPassFirst', 'regUserPassSecond', 'dateDay', 'dateMonth', 'dateYear', 'agreement'],
        ];
    }

    public function rules() {
        return [
          /*Поля формы АВТОРИЗАЦИИ*/
          ['userLogin',  'required', 'message'    => 'Поле Email обязательно для заполнения!'],
          ['password',   'required', 'message'    => 'Необходимо ввести пароль!!'],

          ['rememberMe', 'boolean',  'trueValue'  => true,
                                     'falseValue' => false,
                                     'strict'     => false],

          ['rememberMe', 'default',  'value'      => 'true'],

          ['password',  'validPsw'],

          /*Поля формы РЕГИСТРАЦИИ*/
          ['regUserLogin',  'required', 'message'   => 'Введите Ваш ЛОГИН!'],
          ['regUserEmail',  'required', 'message'   => 'Введите Ваш EMAIL!'],

          /*@TODO Сделать проверку на совпадение двух паролей!*/
          ['regUserPassFirst',   'required', 'message' => 'Проверьте Ваш пароль! Длина от 5 символов!'],
          ['regUserPassSecond',  'required', 'message' => 'Проверьте Ваш пароль! Длина от 5 символов!'],

          /*Блок валидации ДАТЫ РОЖДЕНИЯ*/
          ['dateDay',    'required', 'message' => 'Проверьте Ваш День рождения! Пример: 00'],
          ['dateMonth',  'required', 'message' => 'Проверьте Ваш Месяц рождения!'],
          ['dateYear',   'required', 'message' => 'Проверьте Ваш Год рождения! Пример: 2016'],

          /*Принятие соглашения!*/
          ['agreement',  'required', 'message' => 'Прочтите соглашение!'],
        ];
    }



    public function validPsw() {
        //@TODO Тут валидкашка на парольку.
        return false;
    }
}