<?php


namespace DevilSwarm\Process;


class InitialCommand implements BashCommand
{
    public function execute()
    {
        echo "Starting\n";
    }
}
