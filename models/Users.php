<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.10.16
 * Time: 23:11
 */

namespace app\models;

use yii\db\ActiveRecord;


class Users extends ActiveRecord
{
    /*Поле в таблице IS_ACTIVE*/
    const IS_ACTIVE_USER   = 'true';
    const IS_UNACTIVE_USER = 'false';


    /**
     * @return static[] Вытащить всех людей из базы.
     */
    public function getAllUsers() {
        return Users::findAll();
    }

    public function getUserById($id) {
        return Users::findOne($id);
    }

    public static function tableName() {
        return 'USERS';
    }
}