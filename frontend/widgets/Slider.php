<?php

namespace frontend\widgets;

use yii\bootstrap\Widget;
use yii\db\Expression;
use yii\mongodb\Query;

class Slider extends  Widget {

    public function run() {
        $query = new Query;
        $query->select(['img', 'is_active'])
            ->from('slider')
            ->where(['is_active' => '1'])
            ->limit(3)
            ->orderBy(new Expression('rand()'));
        $model = $query->all();

        return $this->render('slider', ['model' => $model]);
    }
}