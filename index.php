<?php
/**
 * Created by PhpStorm.
 * User: zyuskin_en
 * Date: 31.12.14
 * Time: 1:06
 */

include __DIR__.'/vendor/autoload.php';

use AmaxLab\GitWebHook\Hook;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('git-web-hook');
$logger->pushHandler(new StreamHandler(__DIR__ . DIRECTORY_SEPARATOR . 'log'. DIRECTORY_SEPARATOR.'hook.log', Logger::WARNING)); // or you can write logs to /var/log or somewhere else

$hook = new Hook(__DIR__, array(), $logger);
$hook->loadConfig(__DIR__.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.yml'); // you can copy config.yml.dist to config.yml and edit it
$hook->execute();
