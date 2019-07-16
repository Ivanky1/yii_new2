<?php
/**
 * Created by PhpStorm.
 * User: Ena
 * Date: 09.02.16
 * Time: 12:23
 */

namespace frontend\models;

use yii\base\Model;

class TestModel extends Model {
    public function getImage() {
        return 'Image test';
    }
}