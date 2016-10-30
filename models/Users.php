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
    public static function tableName() {
        return 'USERS';
    }
}