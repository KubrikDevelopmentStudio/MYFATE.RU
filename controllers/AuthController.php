<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.10.16
 * Time: 19:39
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

use app\models\AuthForm;
use app\models\Users;
use yii\web\NotFoundHttpException;


class AuthController extends Controller
{
    public function actionIndex() {

        if(Yii::$app->session->isActive && Yii::$app->session->has('password')) {
            /*Дейстия по авторизации пользователя,
            повторная авторизация аяксом к серверу тут*/
        } else {

        }

        $model = new AuthForm();

        return $this->render('index', compact('model', $model));
    }

    public function actionLogin() {

        $model  = new AuthForm(['scenario' => 'login']);

        if($model->load(Yii::$app->request->post()) && $model->validate()) {

            $data = Yii::$app->request->getBodyParam('AuthForm');

            if(Users::getAuth($data['userLogin'], $data['password'])) {
                throw new NotFoundHttpException('Успешная авторизация!');
            } else {
                throw new NotFoundHttpException('Пользователь не найден!');
            }
        } else {
            return $this->render('index', compact('model', $model));
        }
    }

    public function actionRegister() {

        $model = new AuthForm(['scenario' => 'register']);

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $data = Yii::$app->request->getBodyParam('AuthForm');

            Users::tryReg($data);

        } else {
            echo "<code>" . __FILE__ . ": ";
            print_r($model->errors);
            echo "</code>";
        }
    }
}