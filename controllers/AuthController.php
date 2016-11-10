<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.10.16
 * Time: 19:39
 */

namespace app\controllers;

use app\models\LoginForm;

use app\models\RegisterForm;
use Yii;
use yii\web\Controller;

use app\models\Users;
use app\models\Passwords;

use yii\web\Cookie;
use yii\web\NotFoundHttpException;

use yii\filters\AccessControl;


class AuthController extends Controller
{

    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                 'only' => ['login', 'register'],
                 'rules' => [
                     'allow' => true,
                     'actions' => ['login', 'register'],
                     'roles' => ['?'],
                 ],
                [
                    'allow' => true,
                    'actions' => ['login', 'register'],
                    'roles' => ['@'],
                ],
            ]
        ];
    }*/

    public function actionIndex() {


        $model = new LoginForm();

        return $this->render('index', compact('model'));
    }

    public function actionLogin() {

        $model  = new LoginForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {

            $data = Yii::$app->request->getBodyParam('LoginForm');

            if($userInfo = Users::getAuth($data['userLogin'], $data['password'])) {

                /*Успешная авторизация, кладем в сессии
                информацию о пользователе в сессии и куки*/
                $session = Yii::$app->session;
                $cookie  = Yii::$app->response->cookies;

                //Открываем сессию
                $session->open();

                //Создаем хеш пароля пользователя.
                $hash_password = Passwords::generateHash($data['password']);

                /*Установка хешей пароля для СЕССИИ и КУКИ*/

                /*Сессия*/
                if(!$session->get('hash_password')) {
                    $session->set('hash_password', $hash_password);
                } else {
                    if(!Passwords::comparePassword($data['password'], $session->get('hash_password'))) {
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

                /*Установка полученных данных о пользователе
                из БД в сессию для удобного доступа. (см. таблица: USERS)*/
                $session->set('user_info', $userInfo);

                return $this->render('auth-success', compact('model'));
            } else {
                $model->addError('userLogin', 'Пользователь не найден!');
                return $this->render('auth-error', compact('model'));
            }
        } else {
            return $this->render('auth-error', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegister() {

        $model = new RegisterForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($user = $model->register()) {
                if(Yii::$app->getUser()->login($user))
                    return $this->goHome();
            } else
                return $this->render('register-error', compact('model'));
        } else
            return $this->render('register', compact('model', $model));

    }
}