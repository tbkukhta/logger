<?php


namespace app\modules\logger\components;


use app\modules\logger\models\FileLogger;

class FileLoggerFactory extends LoggerFactory
{
    public function createLogger(string $type): LoggerInterface
    {
        return new FileLogger($type);
    }
}
