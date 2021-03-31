<?php


namespace DevilSwarm\Process;


interface ProcessFactory
{
    public function createProcess(string $command): ProcessInterface;
}
