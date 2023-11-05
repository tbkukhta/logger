<?php


namespace app\modules\logger\models;


use app\modules\logger\components\BaseLogger;

class DbLogger extends BaseLogger
{
    public function sendLogic(string $message): void
    {
        // TODO: Implement sendLogic() method.
        // record $message into db logic goes here
    }
}
