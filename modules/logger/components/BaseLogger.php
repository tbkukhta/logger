<?php


namespace app\modules\logger\components;


abstract class BaseLogger implements LoggerInterface
{
    abstract public function sendLogic(string $message): void;

    protected string $type;

    public function __construct($type)
    {
        $this->setType($type);
    }

    public function send(string $message): void
    {
        $this->sendLogic($message);
        echo "message '$message' was sent via default logger type: {$this->getType()}";
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->sendLogic($message);
        echo "message '$message' was sent via $loggerType\n";
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
