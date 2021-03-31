<?php


namespace DevilSwarm\BashCommand;


use DevilSwarm\Process\LocalProcessFactory;
use DevilSwarm\Process\ProcessFactory;

class LocalCommand implements BashCommand
{
    private ProcessFactory $processFactory;

    public function __construct()
    {
        $this->processFactory = new LocalProcessFactory();
    }

    public function execute()
    {

    }

    public function getProcessFactory(): ProcessFactory
    {
        return $this->processFactory;
    }
}
