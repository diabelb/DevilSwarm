<?php


namespace DevilSwarm\BashCommand;


use Symfony\Component\Process\Process;

class InstallCurl extends BashCommandDecorator
{
    public function execute()
    {
        $this->command->execute();

        echo "Installing curl...";
        $this->getProcessFactory()->createProcess('sudo apt-get install curl -y')->mustRun();
        echo "OK\n";
    }
}