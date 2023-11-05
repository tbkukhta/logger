<?php


namespace app\modules\logger\components;


use app\modules\logger\models\EmailLogger;

class EmailLoggerFactory extends LoggerFactory
{
    public function createLogger(string $type): LoggerInterface
    {
        return new EmailLogger($type);
    }
}
