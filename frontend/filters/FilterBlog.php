<?php

namespace frontend\filters;


use frontend\models\mongo\Blog;
use yii\base\ActionFilter;
use yii\web\HttpException;

class FilterBlog extends ActionFilter {

    public function beforeAction($action) {
        $id = \Yii::$app->request->get('id');
        $model = Blog::findOne($id);
        if (!$model) {
            throw new HttpException(404, 'Unknown blog post');
        }
        return parent::beforeAction($action);
    }
    public function afterAction($action, $result) {

        return parent::afterAction($action, $result);
    }
}