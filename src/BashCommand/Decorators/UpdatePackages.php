<?php


namespace DevilSwarm\BashCommand\Decorators;


use DevilSwarm\BashCommand\BashCommandDecorator;

class UpdatePackages extends BashCommandDecorator
{
    public function execute()
    {
        $this->command->execute();

        echo "Updating packages...";
        $this->getProcessFactory()->createProcess('sudo apt-get update -y -qq')->mustRun();
        echo "OK\n";
    }
}
