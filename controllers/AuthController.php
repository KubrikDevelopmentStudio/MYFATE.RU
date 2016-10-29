<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.10.16
 * Time: 19:39
 */

namespace app\controllers;

use app\models\Users;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionIndex() {

        $fields = Users::find()->all();
        //debug($fields);

        return $this->render('index');
    }
}