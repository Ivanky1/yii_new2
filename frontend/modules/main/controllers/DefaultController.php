<?php

namespace app\modules\main\controllers;

use frontend\models\ContactForm;
use frontend\models\LoginForm;
use frontend\models\mongo\Users;
use frontend\models\SignupForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'register', 'contact'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'register'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['contact', 'logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionRegister() {
        $model = new SignupForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if ($model->signup()) {
                return $this->goHome();
            }
        }
        return $this->render('register', ['model' => $model]);
    }

    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $user = $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionAbout() {
        return 1;
    }

    public function actionContact() {
        $model = new ContactForm();
        //$model->scenario = 'mini_contact';

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            \Yii::$app->common->sendMail($model->email, $model->name, $model->subject, $model->body);
        }
        return $this->render('contact', ['model' => $model]);
    }


}


