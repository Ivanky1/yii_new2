<?php

namespace frontend\models\mongo;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;


/**
 * This is the model class for collection "Blog".
 *
 * @property \MongoId|string $_id
 * @property mixed $title
 * @property mixed $created
 * @property mixed $summary_text
 * @property mixed $full_text
 */
class Blog extends \yii\mongodb\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['mydatabase', 'Blog'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
            'created',
            'summary_text',
            'full_text',
            'img',
            'uid',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created' ], 'yii\mongodb\validators\MongoDateValidator', 'format' => 'dd-mm-yyyy'],
            [['img' ], 'yii\validators\ImageValidator'],
            [['title', 'summary_text', 'full_text'], 'safe'],
            [['uid'], 'safe'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $img_name = $this->imageFile->baseName.'_'.date('d-m-Y-H_i') . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs(Yii::getAlias('@app')."/web/img/blog/" .$img_name);
            return $img_name;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'title' => 'Title',
            'created' => 'Created',
            'summary_text' => 'Анонс',
            'full_text' => 'Полное описание',
            'img' => 'Загрузить',
        ];
    }

    /**
     * @return \yii\db\ActiveQueryInterface
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['_id' => 'uid']);
    }

    public function afterValidate(){
        $this->uid = Yii::$app->user->identity->id;
    }
}
