<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.10.16
 * Time: 23:11
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Users extends ActiveRecord
{
    /*Поле в таблице IS_ACTIVE*/
    const IS_ACTIVE_USER   = 'true';
    const IS_UNACTIVE_USER = 'false';

    public static function tryReg($data) {

        $result = Yii::$app->db->createCommand()->insert('USERS', [
                        'ID_USER'           =>  "2",
                        'LOGIN'             =>  $data['regUserLogin'],
                        'PASSWORD'          =>  $data['regUserPassFirst'],
                        'EMAIL'             =>  $data['regUserPassFirst'],
                        'USER_GROUP_ID'     =>  "010",                      /*010   - группа обычных пользователей*/
                        'IS_ACTIVE'         =>  "true",                     /*true  - пользователь не отключен*/
                        'BAN_STATUS'        =>  "false",                    /*false - пользователь не забанен*/
                        'AGREEMENT_ACCEPT'  =>  $data['agreement'],
                    ])->execute();
        if($result)
            return true;
        else
            return false;
    }
    /**
     * @return static[] Вытащить всех людей из базы.
     */
    public static function getAllUsers() {

        $result = Users::find()->all();

        if(isset($result))
            return $result;
        else
            return false;
    }
    /**
     * @param $id Получить_пользователя_по_ID
     * @return array|bool|null|ActiveRecord Либо_результат_либо_FALSE
     */
    public static function getUserById($id) {

        if(!isset($id)) return false;

        $sql = "SELECT * FROM {{USERS}} WHERE [[ID_USER]] = $id";

        $result = Users::findBySql($sql)->one();

        if(isset($result))
            return $result;
        else
            return false;
    }
    /**
     * @param $email Email_пользователя
     * @param $password Пароль_пользователя
     * @return bool Найден_ли_пользователь
     */
    public static function getAuth($email, $password) {

        $sql = "SELECT * FROM {{USERS}} WHERE (([[LOGIN]]=:login OR [[EMAIL]]=:email) AND [[PASSWORD]]=:password)";

        $result = Users::findBySql($sql, [
            ':login' => $email,
            ':email' => $email,
            'password' => $password
        ])->one();

        if(isset($result)) $result = $result->toArray();

        if($result)
            return $result;
        else
            return false;
    }
    /**
     * @param $email Email_пользователя_или_Логин
     * @return array|bool|null|ActiveRecord
     */
    public static function getUserByEmail($email) {

        $sql = "SELECT * FROM {{USERS}} WHERE ([[LOGIN]]=:login OR [[EMAIL]]=:email)";

        $result = Users::findBySql($sql, [
            ':login' => $email,
            ':email' => $email
        ])->one();

        if($result)
            return $result;
        else
            return false;
    }

    public static function tableName() {
        return 'USERS';
    }
}