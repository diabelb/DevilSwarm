<?php


namespace DevilSwarm\Process;


use Symfony\Component\Process\Process;

class SetHostName extends BashCommandDecorator
{
    private string $hostname;

    public function __construct(string $hostname, BashCommand $command = null)
    {
        parent::__construct($command);
        $this->hostname = $hostname;
    }

    public function execute()
    {
        $this->command->execute();

        echo "Setting hostname: ".$this->hostname."...";
        $this->getProcessFactory()->createProcess("hostnamectl set-hostname ".$this->hostname)->mustRun();
        echo "OK\n";
    }
}
