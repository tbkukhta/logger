<?php


namespace app\modules\logger\models;


use app\modules\logger\components\BaseLogger;

class FileLogger extends BaseLogger
{
    public function sendLogic(string $message): void
    {
        // TODO: Implement sendLogic() method.
        // write $message into file logic goes here
    }
}
