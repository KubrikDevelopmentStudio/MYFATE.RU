<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.10.16
 * Time: 22:23
 */

namespace app\models;

use \yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    public static function tableName() {
        return 'USERS';
    }
}