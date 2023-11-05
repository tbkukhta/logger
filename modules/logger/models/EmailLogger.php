<?php


namespace app\modules\logger\models;


use app\modules\logger\components\BaseLogger;

class EmailLogger extends BaseLogger
{
    public function sendLogic(string $message): void
    {
        // TODO: Implement sendLogic() method.
         $email = \Yii::$app->params['email'];
        // send $message to $email logic goes here
    }
}
