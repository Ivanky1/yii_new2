<?php

namespace frontend\models\mongo;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for collection "Users".
 *
 * @property \MongoId|string $_id
 *
 *
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Users extends \yii\mongodb\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    /**
     * @inheritdoc
     */
  //  public $username;
  //  public $password_hash;
  //  public $email;
 //   public $auth_key;
 //   public $step;
   // public $status;
  //  public $created_at;
   // public $updated_at;

   // public $step_return;
   // public $auth_key_return;


    public static function collectionName()
    {
        return ['mydatabase', 'Users'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'username',
            'email',
            'password_hash',
            'auth_key',
            'step',
         // 'status',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username',  'email', 'password_hash', 'auth_key',  ], 'safe'],
            ['username', 'unique',  ],
            [['step', ], 'number'],
           [['created_at', 'updated_at'], 'yii\mongodb\validators\MongoDateValidator', 'format' => 'dd-mm-yyyy H:i'],
        ];
    }

    /**
     * @inheritdoc
     */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return (string)$this->_id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }


    public function passwordHashReturn($password, $salt, $step) {
        $password_hash = $password.$salt;
        for($i=0; $i<=$step; $i++) {
            $password_hash = sha1($password_hash);
        }
        return $password_hash;
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
        $this->step = rand(5,20);
    }


    public function validateUserPassword($username, $password = '')
    {
        $user = Users::findOne([
            'username' => $username
        ]);
        if ($user && $password) {
            if ($this->passwordHashReturn($password, $user->auth_key, $user->step) == $user->password_hash) {
                return true;
            }
        }
        return false;
    }
    public function setPassword($password)
    {
        $this->generateAuthKey();
        $this->password_hash = $this->passwordHashReturn($password, $this->auth_key, $this->step);

    }

}




