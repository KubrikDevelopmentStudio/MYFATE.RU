<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 05.11.16
 * Time: 17:04
 */

namespace app\models;


use yii\base\Model;

class RegisterForm extends Model
{
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


    public function rules() {
        return [
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

    public function register() {

        $user = new User();
        /*TODO Досмотреть видео дальше, разделить эти ебучие формы!
        https://www.youtube.com/watch?v=pKq_iiAL_dA*/

    }
}