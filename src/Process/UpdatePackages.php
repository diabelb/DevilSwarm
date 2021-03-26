<?php


namespace DevilSwarm\Process;


use Symfony\Component\Process\Process;

class UpdatePackages extends BashCommandDecorator
{
    public function execute()
    {
        $this->command->execute();

        echo "Updating packages...";
        Process::fromShellCommandline('sudo apt-get update -y -qq')->run();
        echo "OK\n";
    }
}
