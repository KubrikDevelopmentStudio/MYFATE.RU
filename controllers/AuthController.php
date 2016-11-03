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
use yii\web\Cookie;
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

            if($userInfo = Users::getAuth($data['userLogin'], $data['password'])) {
                /*Успешная авторизация, кладем в сессии
                информацию о пользователе в сессии и куки*/
                $session = Yii::$app->session;
                $cookie  = Yii::$app->response->cookies;

                //Открываем сессию
                $session->open();

                //Создаем хеш пароля пользователя.
                $hash_password = Yii::$app->getSecurity()->generatePasswordHash($data['password']);

                /*Установка хешей пароля для СЕССИИ и КУКИ*/

                /*Сессия*/
                if(!$session->get('hash_password')) {
                    $session->set('hash_password', $hash_password);
                } else {
                    if(!Yii::$app->getSecurity()->validatePassword($data['password'], $session->get('hash_password'))) {
                        throw new NotFoundHttpException("В сессия был обнаружен пароль, но он не совпал! Ошибка!");
                        die();
                    }
                }

                /*Куки*/
                if(!isset(Yii::$app->request->cookies['hash_password'])) {
                    $cookie->add(new Cookie([
                        'name' => 'hash_password',
                        'value' => $hash_password,
                    ]));
                }

                return $this->render('index', compact('model', $model));
                /*Установка полученных данных о пользователе
                из БД в сессию для удобного доступа. (см. таблица: USERS)*/
                $session->set('user_info', $userInfo);


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