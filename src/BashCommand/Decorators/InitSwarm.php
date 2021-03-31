<?php


namespace DevilSwarm\BashCommand\Decorators;


use DevilSwarm\BashCommand\BashCommand;
use DevilSwarm\BashCommand\BashCommandDecorator;
use Symfony\Component\Process\Process;

class InitSwarm extends BashCommandDecorator
{
    private string $advertiseAddr;

    public function __construct(string $advertiseAddr, BashCommand $command)
    {
        parent::__construct($command);
        $this->advertiseAddr = $advertiseAddr;
    }

    public function execute()
    {
        $this->command->execute();

        echo "Initialising swarm...";
        Process::fromShellCommandline('sudo docker swarm init --advertise-addr '.$this->advertiseAddr)->mustRun();
        echo "OK\n";
    }
}
