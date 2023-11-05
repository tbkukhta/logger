<?php


namespace app\modules\logger\components;


abstract class LoggerFactory
{
    abstract public function createLogger(string $type): LoggerInterface;
}
