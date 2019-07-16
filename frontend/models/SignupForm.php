<?php
namespace frontend\models;

use common\models\User;
use frontend\models\mongo\Users;
use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $re_password;
 //   public $verifyCodeTwo;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
         //   ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'unique', 'targetClass'=>'\frontend\models\mongo\Users', 'message' => 'Пользователь с таким именем уже существует.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
         //   ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['re_password', 'compare', 'compareAttribute' => 'password'],
            ['re_password', 'required'],
            ['re_password', 'string', 'min' => 6],

           // ['verifyCodeTwo', 'captcha', 'captchaAction' => \yii\helpers\Url::to(['main/captcha'])],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            're_password' => 'Повторите пароль',
            'verifyCodeTwo' => 'Verification Code',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if ($this->validate()) {
            $user = new Users();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->created_at = date('d-m-Y H:i');
            $user->updated_at = date('d-m-Y H:i');
          //  $user->validateUserPassword($user->username );
            if (!$user->validate()) {
                $msgsError = '';
                foreach(ArrayHelper::getColumn($user->getErrors(), 0) as $msgError) {
                    $msgsError .= $msgError.'<br/>';
                }
                Yii::$app->getSession()->setFlash('error', $msgsError);
            } else {
                $user->save();
                \Yii::$app->user->login($user, 0);
                \Yii::$app->session->setFlash('success', 'Пользователь зарегистрирован!');
                return true;
            }

        }

        return null;
    }
}
