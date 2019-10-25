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

use EasySwoole\EasySwoole\Command\CommandInterface;
use Hyperf\CommandEasyswoole\EasySwooleCommand;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class EasySwooleCommandTest extends TestCase
{
    protected function tearDown()
    {
        Mockery::close();
    }

    public function testEasySwooleCommand()
    {
        $command = Mockery::mock(CommandInterface::class);
        $command->shouldReceive('commandName')->andReturn('demo');

        $hyperfCommand = new EasySwooleCommand($command);
        $this->assertSame('demo', $hyperfCommand->getName());
    }
}
