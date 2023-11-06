<?php


namespace app\modules\logger\commands;


use app\modules\logger\models\Logger;
use app\modules\logger\components\LoggerInterface;
use yii\base\Exception;
use yii\console\Controller;
use yii\console\ExitCode;

class LoggerController extends Controller
{
    protected string $message;

    /**
     * @param string|null $message
     * @return int
     */
    public function actionLog($message = null)
    {
        $this->setMessage($message);
        $this->log();
        return ExitCode::OK;
    }

    /**
     * @param string $type
     * @param string|null $message
     * @return int
     */
    public function actionLogTo(string $type, $message = null)
    {
        $this->setMessage($message);
        $this->logTo($type);
        return ExitCode::OK;
    }

    /**
     * @param string|null $message
     * @return int
     */
    public function actionLogToAll($message = null)
    {
        $this->setMessage($message);
        $this->logToAll();
        return ExitCode::OK;
    }

    /**
     * Sends a log message to the default logger.
     */
    public function log()
    {
        $logger = $this->getLogger();
        $logger->send($this->message);
    }

    /**
     * Sends a log message to a special logger.
     * @param string $type
     */
    public function logTo(string $type)
    {
        $logger = $this->getLogger($type);
        $logger->sendByLogger($this->message, $type);
    }

    /**
     * Sends a log message to all loggers.
     */
    public function logToAll()
    {
        foreach (\Yii::$app->params['allLoggers'] as $type) {
            $this->logTo($type);
        }
    }

    /**
     * @param string|null $type
     * @return LoggerInterface
     */
    protected function getLogger($type = null): LoggerInterface
    {
        try {
            $logger = new Logger($type);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
        return $logger->getInstance();
    }

    /**
     * @param string|null $message
     */
    protected function setMessage($message)
    {
        $this->message = $message ?? \Yii::$app->params['defaultMessage'];
    }
}
