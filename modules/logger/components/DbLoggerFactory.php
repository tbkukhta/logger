<?php


namespace app\modules\logger\components;


use app\modules\logger\models\DbLogger;

class DbLoggerFactory extends LoggerFactory
{
    public function createLogger(string $type): LoggerInterface
    {
        return new DbLogger($type);
    }
}
