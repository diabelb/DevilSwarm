<?php


namespace DevilSwarm\Command;

use DevilSwarm\Process\InstallCurl;
use DevilSwarm\Process\InstallDocker;
use DevilSwarm\Process\SetHostName;
use DevilSwarm\Process\UpdatePackages;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InitCommand extends Command
{
    /**
     * Init devilSwarm
     *
     * @var string
     */
    public const NAME = 'init';

    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::NAME)
            ->setDescription('Init DevilSwarm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $command = new InstallDocker(new InstallCurl(new SetHostName('swarm-master-1', new UpdatePackages())));
        $command->execute();

        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;
    }
}
