<?php


namespace DevilSwarm\Process;


use Symfony\Component\Process\Process;

class LocalProcess implements ProcessInterface
{
    private string $command;
    private Process $process;

    public function __construct(string $command)
    {
        $this->command = $command;
        $this->process = Process::fromShellCommandline($command);
    }

    public function mustRun(callable $callback = null, array $env = []): ProcessInterface
    {
        $this->process->mustRun();
        return $this;
    }
}
