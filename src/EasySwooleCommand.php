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

namespace HyperfCloud\EasyswooleCommand;

use EasySwoole\EasySwoole\Command\CommandInterface;
use EasySwoole\EasySwoole\Core;
use Hyperf\Command\Command;
use Symfony\Component\Console\Input\InputOption;

class EasySwooleCommand extends Command
{
    /**
     * @var CommandInterface
     */
    protected $command;

    /**
     * @var bool
     */
    protected $coroutine = false;

    public function __construct(CommandInterface $command)
    {
        parent::__construct($command->commandName());
        $this->command = $command;
    }

    public function configure()
    {
        $this->addOption('args', 'a', InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, 'EasySwoole 入参', []);
    }

    public function handle()
    {
        $args = $this->input->getOption('args');

        $result = $this->command->exec($args);

        $this->output->success($result);
    }
}
