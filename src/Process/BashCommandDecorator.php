<?php


namespace DevilSwarm\Process;

abstract class BashCommandDecorator implements BashCommand
{
    /**
     * @var BashCommand
     */
    protected BashCommand $command;

    public function __construct(BashCommand $command)
    {
        $this->command = $command;
    }

    public function getProcessFactory(): ProcessFactory
    {
        return $this->command->getProcessFactory();
    }
}
