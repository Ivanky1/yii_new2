<?php

namespace frontend\widgets;

use frontend\models\LoginForm;
use yii\bootstrap\Widget;

class Login extends  Widget {

    public function run() {
        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            $controller = \Yii::$app->controller;
            $controller->goHome();
        }
        return $this->render('login', ['model'=>$model]);
    }
}