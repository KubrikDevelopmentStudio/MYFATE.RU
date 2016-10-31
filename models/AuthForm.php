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
    public $userLogin;
    public $password;
    public $rememberMe;
    public $submitButton;

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