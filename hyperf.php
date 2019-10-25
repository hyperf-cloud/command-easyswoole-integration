<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use EasySwoole\EasySwoole\Command\CommandRunner;
use Hyperf\CommandEasyswoole\Application;

defined('IN_PHAR') or define('IN_PHAR', boolval(\Phar::running(false)));
defined('RUNNING_ROOT') or define('RUNNING_ROOT', realpath(getcwd()));
defined('EASYSWOOLE_ROOT') or define('EASYSWOOLE_ROOT', IN_PHAR ? \Phar::running() : realpath(getcwd()));

$file = EASYSWOOLE_ROOT . '/vendor/autoload.php';
if (file_exists($file)) {
    require $file;
} else {
    die("include composer autoload.php fail\n");
}

// 初始化 CommandContainer
CommandRunner::getInstance();

if (file_exists(EASYSWOOLE_ROOT . '/bootstrap.php')) {
    require_once EASYSWOOLE_ROOT . '/bootstrap.php';
}

Application::getInstance()->run();
