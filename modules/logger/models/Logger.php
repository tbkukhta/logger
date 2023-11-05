<?php


namespace app\modules\logger\models;


use app\modules\logger\components\DbLoggerFactory;
use app\modules\logger\components\EmailLoggerFactory;
use app\modules\logger\components\FileLoggerFactory;
use app\modules\logger\components\LoggerInterface;
use yii\base\Exception;

class Logger
{
    protected LoggerInterface $logger;

    /**
     * Logger constructor.
     * @param string|null $type
     * @throws Exception
     */
    public function __construct($type = null)
    {
        if (empty($type)) $type = \Yii::$app->params['defaultLogger'];
        switch ($type) {
            case 'email':
                $factory = new EmailLoggerFactory();
                break;
            case 'db':
                $factory = new DbLoggerFactory();
                break;
            case 'file':
                $factory = new FileLoggerFactory();
                break;
            default:
                throw new Exception("Unsupported type of logger: '$type'");
        }
        $this->logger = $factory->createLogger($type);
    }

    public function getInstance(): LoggerInterface
    {
        return $this->logger;
    }
}
