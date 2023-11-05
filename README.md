Yii2 simple logger module
-
This is a console application that provides implementation of logger interface using creational design pattern — the factory method.

Requirements
-
The minimum requirement by this project template that your Web server supports PHP 7.4.

Usage
-
      yii logger/logger/log                         send default message to default logger
      yii logger/logger/log <message>               send specific <message> to default logger
      yii logger/logger/log-to <logger>             send default message to specific <logger>
      yii logger/logger/log-to <logger> <message>   send specific <message> to specific <logger>
      yii logger/logger/log-to-all                  send default message to all logers
      yii logger/logger/log-to-all <message>        send specific <message> to all logers

Configuration
-
Edit the file `config/params.php` to change default parameters:
```php
return [
    'email' => 'admin@example.com',
    'defaultMessage' => 'default message',
    'defaultLogger' => 'email',
    'allLoggers' => [
        'email',
        'db',
        'file',
    ],
];
```
Notes
-
Logging logic is not implemented.

In order to use new type of logger you should implement `LoggerInterface` by the example of provided types of logger.

