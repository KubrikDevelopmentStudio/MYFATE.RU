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
use app\models\Passwords;

use yii\web\Cookie;
use yii\web\NotFoundHttpException;


class AuthController extends Controller
{
    public function actionIndex() {

        $current_session = Yii::$app->session;
        if($current_session->has('hash_password')) {
            /*TODO !!!ВАЖНО!!!*/
            /*Тут запрос к модели Users, где будет тащиться инфа из БД
            по ХЕШУ пароля, который в сессии или куки. Если найдем, подтягиваем
            остальную информацию по пользователю (проверить забанен он или нет и тп).
            Потом в фоне записываем всю инфомрацию в куки и сессии*/
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

                return $this->render('auth-success', compact('model', $model));
            } else {
                $model->addError('userLogin', 'Пользователь не найден!');
                return $this->render('auth-error', compact('model', $model));
            }
        } else {
            return $this->render('auth-error', [
                'model' => $model,
            ]);
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