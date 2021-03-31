<?php


namespace DevilSwarm\BashCommand;


use Symfony\Component\Process\Process;

class InstallNetTools extends BashCommandDecorator
{
    public function execute()
    {
        $this->command->execute();

        echo "Installing net-tools...";
        $this->getProcessFactory()->createProcess('sudo apt-get install net-tools -y')->mustRun();
        echo "OK\n";
    }
}
