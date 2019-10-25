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
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

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
        $command->shouldReceive('exec')->andReturn('exec');

        $hyperfCommand = new EasySwooleCommand($command);
        $this->assertSame('demo', $hyperfCommand->getName());
        // var_dump($hyperfCommand->handle(new ArgvInput(),new ConsoleOutput()));
    }
}
