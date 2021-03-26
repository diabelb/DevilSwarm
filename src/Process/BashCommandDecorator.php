<?php


namespace DevilSwarm\Process;

abstract class BashCommandDecorator implements BashCommand
{
    /**
     * @var BashCommand
     */
    protected BashCommand $command;

    public function __construct(?BashCommand $command = null)
    {
        if (isset($command)) {
            $this->command = $command;
        }
        else {
            $this->command = new InitialCommand();
        }
    }
}
