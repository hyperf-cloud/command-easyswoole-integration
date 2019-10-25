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

namespace HyperfTest\Cases;

use Hyperf\CommandEasyswoole\Application;
use HyperfTest\Stub\Demo2Command;
use HyperfTest\Stub\DemoCommand;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ApplicationTest extends TestCase
{
    public function testApplicationConstruct()
    {
        $app = new Application();

        $commands = $app->getCommands();

        $reals = [];
        foreach ($commands as $command) {
            $reals[] = $command->getName();
        }

        sort($reals);

        $this->assertEquals(['help', 'install', 'phpunit', 'reload', 'restart', 'start', 'stop'], $reals);
    }

    public function testApplicationAddFailed()
    {
        $this->expectException(\TypeError::class);

        $app = new Application();
        $app->add(new Demo2Command());
    }

    public function testApplicationAdd()
    {
        $app = new Application();
        $app->add(new DemoCommand());

        $commands = $app->getCommands();
        $reals = [];
        foreach ($commands as $command) {
            $reals[] = $command->getName();
        }

        $this->assertTrue(in_array('demo:command', $reals));
    }
}
