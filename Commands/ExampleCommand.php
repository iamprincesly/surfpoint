<?php
namespace App\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command.
 */
class ExampleCommand
{
    /**
     * Configure.
     */
    protected function configure()
    {
        parent::configure();
        $this->setName('example');
        $this->setDescription('A sample command');
    }

    /**
     * Execute command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int integer 0 on success, or an error code
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello console');

        return 0;
    }
}