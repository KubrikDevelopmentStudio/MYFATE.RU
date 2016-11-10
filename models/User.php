<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Класс для работы с пользователями. В том числе с авторизацией.
 *
 * @package app\models
 */
class User extends ActiveRecord implements IdentityInterface
{
    /*Поля пользователя*/
    public $id;
    public $auth_key;
    public $password_hash;

    public $userLogin;
    public $userEmail;

    public $userPassword;

    public $dateDay;
    public $dateMonth;
    public $dateYear;

    public $agreement;
    public $checkReg;

    /*Группы пользователей*/
    const GROUP_ADMIN = '100';
    const GROUP_MODERATOR = '90';

    const GROUP_GUEST = '10';

    /*Статусы пользователей (в таблице USERS => IS_ACTIVE)*/
    const STATUS_IS_ACTIVE = 'TRUE';
    const STATUS_IS_UNACTIVE = 'FALSE';

    /**
     * Возвращает имя таблицы.
     *
     * @return string
     */
    public static function tableName() {
        return  'USERS';
    }

    public static function findByEmail($userEmail) {
        return self::find()
            ->where(['LOGIN'   => $userEmail])
            ->orWhere(['EMAIL' => $userEmail])
            ->one();
    }
    /*ХЕЛПЕРЫ ДЛЯ РЕГИСТРАЦИИ*/
    /**
     * Получаем хеш пароля.
     * @param $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    /**
     * Генерируем ключ аутентификации.
     */
    public function generateAutKey() {
        $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
    }


    public function validatePassword($password) {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    /*АУТЕНТИФИКАЦИЯ ПОЛЬЗОВАТЕЛЕЙ*/
    /**
     * Идентифицировать пользователя по ID.
     *
     * @param string|integer $id ID пользователя для поиска.
     * @return IdentityInterface|null результаты поиска.
     */
    public static function findIdentity($id)
    {
        return static::findOne([
            'ID_USER' => $id,
            'IS_ACTIVE' => self::STATUS_IS_ACTIVE
        ]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
