<?php


namespace DevilSwarm\BashCommand;


use Symfony\Component\Process\Process;

class GetIPAddresses extends BashCommandDecorator
{

    private array $resultIPs;

    public function __construct(array &$resultIPs, BashCommand $command)
    {
        parent::__construct($command);
        $this->resultIPs = &$resultIPs;
    }

    public function execute()
    {
        $this->command->execute();

        echo "Checking network interfaces...";
        Process::fromShellCommandline("ifconfig | grep -A 1 'RUNNING' | grep 'inet.* netmask 255.255.255.0' | grep -o 'inet [0-9.]*' | grep -o '[0-9.]*'")
            ->mustRun(function ($type, $buffer) {
                $this->resultIPs = explode("\n",trim($buffer));
            });

        echo "OK\n";
    }
}
