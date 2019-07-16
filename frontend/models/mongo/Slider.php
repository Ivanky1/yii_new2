<?php

namespace frontend\models\mongo;

use Yii;

/**
 * This is the model class for collection "slider".
 *
 * @property \MongoId|string $_id
 * @property mixed $title
 * @property mixed $img
 * @property mixed $link
 */
class Slider extends \yii\mongodb\ActiveRecord
{
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['mydatabase', 'slider'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
            'img',
            'link',
            'is_active',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link'], 'safe'],
            [['is_active'], 'boolean'],
            [['img' ], 'yii\validators\ImageValidator'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'title' => 'Title',
            'img' => 'Img',
            'link' => 'Link',
            'is_active' => 'Active',
        ];
    }

    public function uploadSlider()
    {
        if ($this->validate()) {
            $img_name = uniqid().'_'.date('d-m-Y-H_i') . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs(Yii::getAlias('@app')."/web/img/slider/" .$img_name);
            return $img_name;
        } else {
            return false;
        }
    }
}
