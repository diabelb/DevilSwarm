<?php


namespace DevilSwarm\BashCommand\Decorators;


use DevilSwarm\BashCommand\BashCommandDecorator;
use Symfony\Component\Process\Process;

class InstallDocker extends BashCommandDecorator
{
    public function execute()
    {
        $this->command->execute();

        echo "Installing docker...";
        Process::fromShellCommandline('curl -fsSL https://get.docker.com -o get-docker.sh')->mustRun();
        Process::fromShellCommandline('sudo sh get-docker.sh')->mustRun();
        Process::fromShellCommandline('sudo usermod -aG docker $USER')->mustRun();
        Process::fromShellCommandline('exec newgrp docker')->mustRun();
        Process::fromShellCommandline('sudo docker ps')->mustRun();
        echo "OK\n";
    }
}
