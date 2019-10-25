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

namespace EasySwoole\EasySwoole\Command;

use EasySwoole\Utility\File;

class Utility
{
    public static function easySwooleLog()
    {
        return <<<'LOGO'
 _   _  __   __  ____    _____   ____    _____
| | | | \ \ / / |  _ \  | ____| |  _ \  |  ___|
| |_| |  \ V /  | |_) | |  _|   | |_) | | |_
|  _  |   | |   |  __/  | |___  |  _ <  |  _|
|_| |_|   |_|   |_|     |_____| |_| \_\ |_|

LOGO;
    }

    public static function displayItem($name, $value)
    {
        return "\e[32m" . str_pad($name, 30, ' ', STR_PAD_RIGHT) . "\e[34m" . $value . "\e[0m";
    }

    public static function releaseResource($source, $destination)
    {
        clearstatcache();
        $replace = true;
        if (is_file($destination)) {
            $filename = basename($destination);
            echo "{$filename} has already existed, do you want to replace it? [ Y / N (default) ] : ";
            $answer = strtolower(trim(strtoupper(fgets(STDIN))));
            if (! in_array($answer, ['y', 'yes'])) {
                $replace = false;
            }
        }
        if ($replace) {
            File::copyFile($source, $destination);
        }
    }

    public static function opCacheClear()
    {
        if (function_exists('apc_clear_cache')) {
            apc_clear_cache();
        }
        if (function_exists('opcache_reset')) {
            opcache_reset();
        }
    }
}
