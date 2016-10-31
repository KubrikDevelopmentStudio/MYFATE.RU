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
            self::SCENARIO_LOGIN    => ['username',     'password'],
            self::SCENARIO_REGISTER => ['regUserLogin', 'regUserEmail', 'regUserPassFirst', 'regUserPassSecond', 'dateDay', 'dateMonth', 'dateYear', 'agreement'],
        ];
    }

    public function rules() {
        return [
          ['userLogin',  'required', 'message'   => 'Введите Ваш логин или E-mail!'],
          ['password',   'required', 'message'   => 'Введите Ваш пароль!'],

          ['rememberMe', 'boolean',  'trueValue'  => true,
                                     'falseValue' => false,
                                     'strict'     => false],

          ['rememberMe', 'default',  'value' => 'true'],

          ['password',  'validPsw']
        ];
    }

    public function validPsw($password) {
        //@TODO Тут валидкашка на парольку.
        return false;
    }
}