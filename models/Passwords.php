<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 04.11.16
 * Time: 0:50
 */

namespace app\models;

use Yii;
use yii\base\Model;

class Passwords extends Model
{
    /**
     * @param $password
     * @return bool|string
     */
    public static function generateHash($password) {
        if(isset($password) && $password != '') {
            return Yii::$app->getSecurity()->generatePasswordHash($password);
        } else return false;
    }

    /**
     * @param $password
     * @param $hash
     * @return bool
     */
    public static function comparePassword($password, $hash) {
        if(isset($password) && isset($hash)) {
            return Yii::$app->getSecurity()->validatePassword($password, $hash);
        } else return false;
    }
}