<?php

namespace frontend\components;

use yii\base\Component;

class Common extends Component {

    public function sendMail($email, $name, $subject, $text) {
        \Yii::$app->mailer->compose()
            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
            ->setTo([$email => $name])
            ->setSubject($subject)
            ->setTextBody($text)
            ->send();
        return 1;
    }

}