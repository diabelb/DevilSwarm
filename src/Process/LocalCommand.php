<?php


namespace DevilSwarm\Process;


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
