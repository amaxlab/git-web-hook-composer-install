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

$options = array(
    'sendEmails'          => true,
    'sendEmailAuthor'     => true,
    'mailRecipients'      => array(),
    'allowedAuthors'      => '*',
    'allowedHosts'        => '*',
);

$logger = new Logger('git-web-hook');
$logger->pushHandler(new StreamHandler(__DIR__ . '/hook.log', Logger::WARNING));

$hook = new Hook(__DIR__, $options, $logger);

$hook
    ->addRepository('git@github.com:amaxlab/git-web-hook.git', '/var/www/my_project_folder/web')
    ->addBranch('master', array('git status', 'git reset --hard HEAD', 'git pull origin master'), '/var/www/my_project_folder/demo_subdomain') // commands executed on push to specified branch in /var/www/html/my_site/ folder
    ->addBranch('production', 'git pull origin production');

// or load from yml files
$hook->loadRepos(__DIR__.'/repos.d/');

$hook->execute();
