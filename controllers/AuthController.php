<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.10.16
 * Time: 19:39
 */

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;

use app\models\AuthForm;
use app\models\Users;


class AuthController extends Controller
{
    public function actionIndex() {

        $model = new AuthForm();

        return $this->render('index', compact('model', $model));
    }

    public function actionLogin() {
        $request = Yii::$app->request;

        $model = new AuthForm();

        $model->load($request->post());

        if($model->validate()) {

            $data = $request->getBodyParam('AuthForm');

            $name       = $data['userLogin'];
            $password   = $data['password'];
            /*$rememberMe = $data['rememberMe'];*/

            $user = Users::find()
                ->where(['LOGIN' => $name])
                ->orWhere(['EMAIL' => $name])
                ->andWhere(['PASSWORD' => md5($password)])
                ->one();

            print_r($user);

        } else {
            $err = $model->errors;
            echo "Ошибка!: ";
            print_r($err);
        }

    }
}

/*$request = Yii::$app->request;
if($request->isPost) {
    $name =       $request->post('userLogin');
    $password =   $request->post('password');
    $rememberMe = $request->post('rememberMe');

    debug($rememberMe);
}*/