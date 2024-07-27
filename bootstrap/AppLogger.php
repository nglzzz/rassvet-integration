<?php

declare(strict_types=1);

use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

class AppLogger
{
    private static $logger;

    public static function getLogger(): Logger
    {
        if (!self::$logger) {
            self::$logger = new Logger('app');

            $logFile = APPLICATION_PATH . '/logs/app.log';

            $handler = new RotatingFileHandler($logFile, 0, Level::Debug);

            self::$logger->pushHandler($handler);

            self::$logger->pushHandler(new StreamHandler('php://stderr', Level::Error));
        }
        return self::$logger;
    }
}
