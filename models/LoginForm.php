<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.10.16
 * Time: 21:24
 */

namespace app\models;

use yii\base\Model;

class LoginForm extends Model
{
    /*Элементы для формы авторизации*/
    public $userLogin;
    public $password;
    public $rememberMe;
    public $submitButton;

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
        ];
    }

    public function validPsw() {
        //@TODO Тут валидкашка на парольку.
        return false;
    }
}