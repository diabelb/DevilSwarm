<?php


namespace DevilSwarm\Process;


class LocalProcessFactory implements ProcessFactory
{
    public function createProcess(string $command): ProcessInterface
    {
        return new LocalProcess($command);
    }
}
