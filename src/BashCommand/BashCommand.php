<?php


namespace DevilSwarm\BashCommand;

use DevilSwarm\Process\ProcessFactory;

interface BashCommand
{
    public function execute();
    public function getProcessFactory(): ProcessFactory;
}
