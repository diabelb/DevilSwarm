<?php


namespace DevilSwarm\BashCommand\Decorators;


use DevilSwarm\BashCommand\BashCommand;
use DevilSwarm\BashCommand\BashCommandDecorator;

class SetHostName extends BashCommandDecorator
{
    private string $hostname;

    public function __construct(string $hostname, BashCommand $command)
    {
        parent::__construct($command);
        $this->hostname = $hostname;
    }

    public function execute()
    {
        $this->command->execute();

        echo "Setting hostname: ".$this->hostname."...";
        $this->getProcessFactory()->createProcess("sudo hostnamectl set-hostname ".$this->hostname)->mustRun();
        echo "OK\n";
    }
}
