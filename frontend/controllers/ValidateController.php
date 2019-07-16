<?php

namespace frontend\controllers;

use frontend\models\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\web\Controller;
use yii\web\Response;

class ValidateController extends Controller {

    public function actionLogin() {
        $model = new LoginForm();
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost && $model->load(\Yii::$app->request->post()) ) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}