<?php


namespace DevilSwarm\Process;


use Symfony\Component\Process\Process;

class InstallDocker extends BashCommandDecorator
{
    public function execute()
    {
        $this->command->execute();

        echo "Installing docker...";
        Process::fromShellCommandline('curl -fsSL https://get.docker.com -o get-docker.sh')->mustRun();
        Process::fromShellCommandline('sudo sh get-docker.sh')->mustRun();
        Process::fromShellCommandline('sudo usermod -aG docker ubuntu')->mustRun();
        Process::fromShellCommandline('docker ps')->mustRun();
        echo "OK\n";
    }
}
