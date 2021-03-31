<?php


namespace DevilSwarm\Process;


interface ProcessInterface
{
    public function mustRun(callable $callback = null, array $env = []): ProcessInterface;
}
