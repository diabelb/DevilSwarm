<?php


namespace DevilSwarm\Process;


use Symfony\Component\Process\Process;

class InstallCurl extends BashCommandDecorator
{
    public function execute()
    {
        $this->command->execute();

        echo "Installing curl...";
        Process::fromShellCommandline('sudo apt-get install curl -y')->mustRun();
        echo "OK\n";
    }
}
